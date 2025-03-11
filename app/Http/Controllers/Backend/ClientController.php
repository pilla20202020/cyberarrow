<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use Illuminate\Http\Request;
use App\Models\Sector\Sector;
use App\Http\Requests\Client\ClientRequest;

class ClientController extends Controller
{
    protected $client;

    function __construct(Client $client)
    {
        $this->client = $client;
    }
    public function index()
    {
        $clients = $this->client->orderBy('created_at', 'desc')->get();

        return view('backend.client.index', compact('clients'));
    }

    public function create(Client $client)
    {
        return view('backend.client.create',compact('client'));
    }

    public function store(ClientRequest $request)
    {
        //
        if($client = $this->client->create($request->clientFillData())) {
            // dd($request->validated());
            if($request->hasFile('image')) {
                $this->uploadFile($request, $client);
            }
            return redirect()->route('client.index');

        }
    }

    public function edit(Client $client)
    {
        return view('backend.client.edit', compact('client'));
    }

    public function update(ClientRequest $request, Client $client)
    {
        if ($client->update($request->clientFillData())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $client);
            }
        }
        return redirect()->route('client.index')->withSuccess(trans('Client has been updated'));
    }

    public function destroy($id)
    {

       $client = Client::find($id);
       $client->delete();
       return redirect()->route('client.index')->withSuccess(trans('Client has been deleted'));


    }

    function uploadFile(Request $request, $client)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Get the uploaded file
            $file = $request->file('image');

            // Define the destination path for the file
            $path = 'uploads' . DIRECTORY_SEPARATOR . 'client';  // Use DIRECTORY_SEPARATOR here

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
          if (!empty($client->image)) {
            $this->__deleteImages($client); // Assuming you have logic to delete old images
        }
            // Save the new file name in the database
            $data['image'] = $path . DIRECTORY_SEPARATOR . $fileName;
            $this->updateImage($client->id, $data); // Update image record in your database
        } else {
            // Handle case where no valid image is uploaded
            return response()->json(['error' => 'No valid image uploaded'], 400);
        }
    }


    public function __deleteImages($client)
    {
        try {
                // Build the full path to the old image
                if (isset($client->image)) {
                    $imagePath = public_path($client->image);
                    // Check if the file exists before deleting
                    unlink($imagePath);  // Delete the old image
                }
        } catch (\Exception $e) {

        }
    }

    public function updateImage($clientId, array $data)
    {
        try {
            $client = Client::find($clientId);
            $client = $client->update($data);
            return $client;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
