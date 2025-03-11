<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\NewsRequest;
use App\Models\NewsNotice\NewsNotice;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $news;

    function __construct(NewsNotice $news)
    {
        $this->news = $news;
    }
    public function index()
    {
        $news = $this->news->orderBy('created_at', 'desc')->get();

        return view('backend.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        if($news = $this->news->create($request->newsFillData())) {
            if($request->hasFile('image')) {
                $this->uploadFile($request, $news);
            }
            return redirect()->route('news.index');

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
    public function edit(NewsNotice $news)
    {
        return view('backend.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, NewsNotice $news)
    {
        if ($news->update($request->newsFillData())) {
            $news->fill([
                'slug' => $request->title,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $news);
            }
        }
        return redirect()->route('news.index')->withSuccess(trans('news has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = $this->news->find($id);
        $news->delete();
        return redirect()->route('news.index')->withSuccess(trans('News has been deleted'));
    }

    function uploadFile(Request $request, $slider)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Get the uploaded file
            $file = $request->file('image');

            // Define the destination path for the file
            $path = 'uploads' . DIRECTORY_SEPARATOR . 'news';  // Use DIRECTORY_SEPARATOR here

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
          if (!empty($slider->image)) {
            $this->__deleteImages($slider);
        }
            // Save the new file name in the database
            $data['image'] = $path . DIRECTORY_SEPARATOR . $fileName;
            $this->updateImage($slider->id, $data);
        } else {
            // Handle case where no valid image is uploaded
            return response()->json(['error' => 'No valid image uploaded'], 400);
        }
    }

    public function updateImage($newsId, array $data)
    {
        try {
            $news = $this->news->find($newsId);
            $news = $news->update($data);
            return $news;
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
