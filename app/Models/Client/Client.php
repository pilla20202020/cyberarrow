<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sector\Sector;


class Client extends Model
{
    protected $path ='uploads/client';
    protected $fillable = [
        'title',
        'image',
        'is_featured'
    ];

    /**
     * The attributes that should be typecast into boolean.
     *
     * @var array
     */

//    protected $dates = ['date'];

    protected $appends = [
       'thumbnail_path', 'image_path'
    ];

    function getImagePathAttribute(){
        return $this->path.'/'. $this->image;
    }

    function getThumbnailPathAttribute(){
        return $this->path.'/thumb/'. $this->image;
    }
}
