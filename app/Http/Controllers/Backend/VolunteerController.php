<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Volunteer\VolunteerRequest;
use App\Models\Volunteer\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    protected $volunteer;

    function __construct(Volunteer $volunteer)
    {
        $this->volunteer = $volunteer;
    }
    public function index()
    {
        $volunteer = $this->volunteer->orderBy('created_at', 'desc')->get();

        return view('backend.volunteer.index', compact('volunteer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.volunteer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VolunteerRequest $request)
    {
        if($volunteer = $this->volunteer->create($request->volunteerFillData())) {
            if($request->hasFile('image')) {
                $this->uploadFile($request, $volunteer);
            }
            return redirect()->route('volunteer.index');

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
    public function edit(Volunteer $volunteer)
    {
        return view('backend.volunteer.edit', compact('volunteer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VolunteerRequest $request, Volunteer $volunteer)
    {
        if ($volunteer->update($request->volunteerFillData())) {
            $volunteer->fill([
                'slug' => $request->title,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $volunteer);
            }
        }
        return redirect()->route('volunteer.index')->withSuccess(trans('Volunteer has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $volunteer = $this->volunteer->find($id);
        $volunteer->delete();
        return redirect()->route('volunteer.index')->withSuccess(trans('Volunteer has been deleted'));
    }

    function uploadFile(Request $request, $volunteer)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Get the uploaded file
            $file = $request->file('image');

            // Define the destination path for the file
            $path = 'uploads' . DIRECTORY_SEPARATOR . 'volunteer';  // Use DIRECTORY_SEPARATOR here

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
          if (!empty($volunteer->image)) {
            $this->__deleteImages($volunteer);
        }
            // Save the new file name in the database
            $data['image'] = $path . DIRECTORY_SEPARATOR . $fileName;
            $this->updateImage($volunteer->id, $data);
        } else {
            // Handle case where no valid image is uploaded
            return response()->json(['error' => 'No valid image uploaded'], 400);
        }
    }

    public function updateImage($volunteerId, array $data)
    {
        try {
            $volunteer = $this->volunteer->find($volunteerId);
            $volunteer = $volunteer->update($data);
            return $volunteer;
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
