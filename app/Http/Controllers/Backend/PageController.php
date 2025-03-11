<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\StorePage;
use App\Models\Category\Category;
use App\Models\Page\Page;
use Illuminate\Http\Request;
use Exception;
class PageController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */

    protected $page, $category;

    function __construct(Page $page, Category $category)
    {
        $this->page = $page;
        $this->category = $category;

    }
    public function index()
    {
        $pages = $this->page->orderBy('created_at', 'desc')->get();
        $categories = $this->category->get();

        return view('backend.page.index', compact('pages', 'categories'));
    }

    /**
     * @return \Illuminate\View\View
     */
    // public function resourceIndex()
    // {
    //     $pages = Page::where('view', 'Resource')->get();

    //     return view('backend.resources.index', compact('pages'));
    // }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = $this->category->get();
        return view('backend.page.create',compact('categories'));
    }

    /**
     * @param StorePage $request
     * @return mixed
     */
    public function store(StorePage $request)
    {
        if ($page = $this->page->create($request->pageFillData())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $page);
            }
            return redirect()->route('page.index');
        }
    }

    /**
     * @param Page $page
     * @return \Illuminate\View\View
     */
    public function edit(Page $page)
    {
       // $pages = $this->page->get();
        $categories = $this->category->get();
        $category_search = $page->category_id;
        return view('backend.page.edit', compact('page','categories','category_search'));
    }

    public function update(StorePage $request, Page $page)
    {
        if ($page->update($request->pageFillData())) {
            $page->fill([
                'slug' => $request->title,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $page);
            }
        }
//        DB::transaction(function () use ($request, $page)
//        {
//            $page->update($request->pageFillData());
//
//            $this->uploadRequestImage($request, $page);
//        });

        return redirect()->route('page.index')->withSuccess(trans('Page has been updated'));
    }

    public function bulkDelete(Request $request)
    {
        $pageIds = $request->input('selected_pages');
        if ($pageIds) {
            Page::whereIn('id', $pageIds)->delete();
            return redirect()->route('page.index')->withSuccess('Selected pages have been deleted successfully.');
        }

        return redirect()->route('page.index')->withError('No pages selected for deletion.');
    }


    public function destroy($id)
    {
        $page = $this->page->find($id);
        $page->delete();
        return redirect()->route('page.index')->withSuccess(trans('page has been deleted'));
    }



    function uploadFile(Request $request, $page)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Get the uploaded file
            $file = $request->file('image');

            // Define the destination path for the file
            $path = 'uploads' . DIRECTORY_SEPARATOR . 'page';  // Use DIRECTORY_SEPARATOR here

            // Create the directory if it doesn't exist
            $destinationPath = public_path($path);
            if (!file_exists($destinationPath)) {
                // Try creating the directory and log any issues
                $created = mkdir($destinationPath, 0755, true); // Creates directory with correct permissions
                if (!$created) {
                    Log::error('Failed to create directory: ' . $destinationPath);
                    return response()->json(['error' => 'Failed to create folder'], 500);
                }
            }

            // Generate a unique file name
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Move the file to the public storage folder
            $file->move($destinationPath, $fileName);

            // Delete existing image if it exists
          if (!empty($page->image)) {
            $this->__deleteImages($page); // Assuming you have logic to delete old images
        }
            // Save the new file name in the database
            $data['image'] = $path . DIRECTORY_SEPARATOR . $fileName;
            $this->updateImage($page->id, $data); // Update image record in your database
        } else {
            // Handle case where no valid image is uploaded
            return response()->json(['error' => 'No valid image uploaded'], 400);
        }
    }
    public function __deleteImages($subCat)
    {
        try {
            if (is_file($subCat->image_path))
                unlink($subCat->image_path);

            if (is_file($subCat->thumbnail_path))
                unlink($subCat->thumbnail_path);
        } catch (\Exception $e) {

        }
    }

    public function updateImage($pageId, array $data)
    {
        try {
            $page = $this->page->find($pageId);
            $page = $page->update($data);
            return $page;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
