<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Testimonial\TestimonialRequest;
use App\Models\Category\Category;
use App\Models\Testimonial\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    protected $testimonial, $category;

    function __construct(Testimonial $testimonial, Category $category)
    {
        $this->testimonial = $testimonial;
        $this->category = $category;
    }
    public function index()
    {
        $testimonial = $this->testimonial->orderBy('created_at', 'desc')->get();
        $categories = $this->category->get();

        return view('backend.testimonial.index', compact('testimonial', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->get();
        return view('backend.testimonial.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        if($testimonial = $this->testimonial->create($request->testimonialFillData())) {
            if($request->hasFile('image')) {
                $this->uploadFile($request, $testimonial);
            }
            return redirect()->route('testimonial.index');

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
    public function edit(Testimonial $testimonial)
    {
        $categories = $this->category->get();
        $category_search = $testimonial->category_id;
        return view('backend.testimonial.edit', compact('testimonial','categories','category_search'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request, testimonial $testimonial)
    {
        if ($testimonial->update($request->testimonialFillData())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $testimonial);
            }
        }
        return redirect()->route('testimonial.index')->withSuccess(trans('Testimonial has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = $this->testimonial->find($id);
        $testimonial->delete();
        return redirect()->route('testimonial.index')->withSuccess(trans('Testimonial has been deleted'));
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
            $path = 'uploads' . DIRECTORY_SEPARATOR . 'testimonial';  // Use DIRECTORY_SEPARATOR here

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

    public function updateImage($testimonialId, array $data)
    {
        try {
            $testimonial = $this->testimonial->find($testimonialId);
            $testimonial = $testimonial->update($data);
            return $testimonial;
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
