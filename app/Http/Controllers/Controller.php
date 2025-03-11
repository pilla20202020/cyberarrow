<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $uploadPath = '/uploads';

    public function uploadRequestImage($request, $instance)
    {
//        dd($request->hasFile('image'));
        if ($request->hasFile('image'))
        {
            $imageDetails = [
                'name' => Str::slug(date('His') . ' ' . $request->image->getClientOriginalName()),
                'size' => $request->image->getSize(),
                'path' => request()->image->store(config('paths.image.' . class_basename($instance)), 'public')
            ];

            if ($instance->image)
            {
                $instance->image->deleteImage();
                $instance->image->update($imageDetails);
            }
            else
            {
                $instance->image()->create($imageDetails);
            }
        }

        else
        {
            if (!empty($request->removeimage))
            {
                $instance->image->delete();
            }
        }

        return false;
    }


    public function uploadFromAjax(UploadedFile $file, $uploadPath, $width = 320, $height = 320, $nohash = false)
    {

        try {
            // Ensure the directory exists
            $destination = storage_path('app/public/' . $uploadPath);
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            // Validate file
            if (!$file->isValid()) {
                throw new \Exception('Invalid file upload.');
            }

            // Determine the new file name
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->extension();
            $newFileName = $nohash
                ? $fileName
                : sprintf("%s.%s", sha1($fileName . time()), $fileExtension);

            // Move file to the destination
            $image = $file->move($destination, $newFileName);

            // Create thumbnail if it's an image
            if (substr($file->getClientMimeType(), 0, 5) === 'image') {
                $this->createThumb($image, $width, $height);
            }

            return $image->getFilename();
        } catch (\Exception $e) {
            Log::error('Image upload failed: ' . $e->getMessage());
            return false; // Or handle exception as needed
        }
    }

    public function createThumb(File $image, $width = 320, $height = 320)
    {
        try{
            $img = Image::make($image->getPathname());
            $img->fit($width, $height);
            $path = sprintf('%s/thumb/%s', $image->getPath(), $image->getFilename());
            $directory = sprintf('%s/thumb', $image->getPath());
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }
            return $img->save($path);
        }catch (\Exception $e){
            return '';
        }

    }

}

