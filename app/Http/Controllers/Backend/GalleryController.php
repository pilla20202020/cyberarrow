<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery\Gallery;
use App\Models\Album\Album;
use App\Http\Requests\Gallery\StoreGallery;
use App\Http\Requests\Gallery\UpdateGallery;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    protected $gallery, $album;

    function __construct(Gallery $gallery, Album $album)
    {
        $this->gallery = $gallery;
        $this->album = $album;

    }

    public function index()
    {

        $gallery = $this->gallery->orderBy('created_at', 'desc')->get();
        return view('backend.gallery.index', compact('gallery'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {

        // $albums = $this->album->get();
        $albums = $this->album->get();
        return view('backend.gallery.create',compact('albums'));
    }

    /**
     * @param StoreGallery $request
     * @return mixed
     */
    public function store(StoreGallery $request)
    {
        //dd($request->all());
        if ($gallery = $this->gallery->create($request->galleryFillData())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $gallery);
            }
        }

        return redirect()->route('gallery.index')->withSuccess(trans('New Gallery has been created'));
    }

    /**
     * @param Gallery $gallery
     * @return \Illuminate\View\View
     */
    public function edit( $id)
    {
        $gallery = $this->gallery->find($id);
        $albums = $this->album->get();
        $album_search = $gallery->album_id;
        return view('backend.gallery.edit', compact('gallery','album_search','albums'));
    }

    public function update(StoreGallery $request, Gallery $gallery)
    {
        if ($gallery->update($request->galleryFillData())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $gallery);
            }
        }

        return redirect()->route('gallery.index')->withSuccess(trans('Gallery has been updated'));
    }

    public function destroy($id)
    {
        $gallery = $this->gallery->find($id);
        $gallery->delete();
        return redirect()->route('gallery.index')->withSuccess(trans('Gallery has been deleted'));
    }
    function uploadFile(Request $request, $gallery)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Get the uploaded file
            $file = $request->file('image');

            // Define the destination path for the file
            $path = 'uploads' . DIRECTORY_SEPARATOR . 'gallery';  // Use DIRECTORY_SEPARATOR here

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
          if (!empty($gallery->image)) {
            $this->__deleteImages($gallery);
        }
            // Save the new file name in the database
            $data['image'] = $path . DIRECTORY_SEPARATOR . $fileName;
            $this->updateImage($gallery->id, $data);
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

    public function updateImage($galleryId, array $data)
    {
        try {
            $gallery = $this->gallery->find($galleryId);
            $gallery = $gallery->update($data);
            return $gallery;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}

