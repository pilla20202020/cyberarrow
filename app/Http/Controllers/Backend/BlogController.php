<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogRequest;
use App\Models\Blog\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blog;

    function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }
    public function index()
    {
        $blog = $this->blog->orderBy('created_at', 'desc')->get();

        return view('backend.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        if($blog = $this->blog->create($request->blogFillData())) {
            if($request->hasFile('image')) {
                $this->uploadFile($request, $blog);
            }
            return redirect()->route('blog.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('backend.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        if ($blog->update($request->blogFillData())) {
            $blog->fill([
                'slug' => $request->title,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $blog);
            }
        }
        return redirect()->route('blog.index')->withSuccess(trans('blog has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = $this->blog->find($id);
        $blog->delete();
        return redirect()->route('blog.index')->withSuccess(trans('blog has been deleted'));
    }

    function uploadFile(Request $request, $blog)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Get the uploaded file
            $file = $request->file('image');

            // Define the destination path for the file
            $path = 'uploads' . DIRECTORY_SEPARATOR . 'blog';  // Use DIRECTORY_SEPARATOR here

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
          if (!empty($blog->image)) {
            $this->__deleteImages($blog);
        }
            // Save the new file name in the database
            $data['image'] = $path . DIRECTORY_SEPARATOR . $fileName;
            $this->updateImage($blog->id, $data);
        } else {
            // Handle case where no valid image is uploaded
            return response()->json(['error' => 'No valid image uploaded'], 400);
        }
    }

    public function updateImage($blogId, array $data)
    {
        try {
            $blog = $this->blog->find($blogId);
            $blog = $blog->update($data);
            return $blog;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
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
}
