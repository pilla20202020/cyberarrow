<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider\Slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\Slider\SliderRequest;
use Illuminate\Support\Facades\Log;
use Exception;
class SliderController extends Controller
{

    protected $slider;

    function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    public function index()
    {


        $slides = $this->slider->orderBy('created_at', 'desc')->get();

        return view('backend.slider.index', compact('slides'));
    }

    public function create(Slider $slider)
    {
        return view('backend.slider.create',compact('slider'));
    }

    public function store(SliderRequest $request)
    {
        //
        if($slider = $this->slider->create($request->sliderFillData())) {
            // dd($request->validated());
            if($request->hasFile('image')) {
                $this->uploadFile($request, $slider);
            }
            return redirect()->route('slider.index');

        }
    }

    public function edit(Slider $slider)
    {
        return view('backend.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {

        if ($slider->update($request->all())) {
            $slider->fill([
                'slug' => $request->title,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $slider);
            }
        }

        return redirect()->route('slider.index')->withSuccess(trans('Slider has been updated'));
    }

    public function destroy($id)
    {

       $slider = Slider::find($id);
       $slider->delete();
       return redirect()->route('slider.index')->withSuccess(trans('Slider has been deleted'));


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
            $path = 'uploads' . DIRECTORY_SEPARATOR . 'slider';  // Use DIRECTORY_SEPARATOR here

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
            $this->__deleteImages($slider); // Assuming you have logic to delete old images
        }
            // Save the new file name in the database
            $data['image'] = $path . DIRECTORY_SEPARATOR . $fileName;
            $this->updateImage($slider->id, $data); // Update image record in your database
        } else {
            // Handle case where no valid image is uploaded
            return response()->json(['error' => 'No valid image uploaded'], 400);
        }
    }


    public function __deleteImages($slider)
    {
        try {
                // Build the full path to the old image
                if (isset($slider->image)) {
                    $imagePath = public_path($slider->image);
                    // Check if the file exists before deleting
                    unlink($imagePath);  // Delete the old image
                }
        } catch (\Exception $e) {

        }
    }

    public function updateImage($sliderId, array $data)
    {
        try {
            $slider = Slider::find($sliderId);
            $slider = $slider->update($data);
            return $slider;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
