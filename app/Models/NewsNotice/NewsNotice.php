<?php

namespace App\Models\NewsNotice;

use Illuminate\Database\Eloquent\Model;

class NewsNotice extends Model
{
    protected $table = 'news_and_notices';
    protected $primaryKey = 'id';

    protected $dates = ['date'];

    protected $path ='uploads/news';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $fillable = [

        'slug',
        'title',
        'meta_description',
        'content',
        'image',
        'date',
        'type',
        'is_featured'
    ];

    /**
     * The attributes that should be typecast into boolean.
     *
     * @var array
     */

//    protected $dates = ['date'];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
    ];

    protected $appends = [
       'thumbnail_path', 'image_path'
    ];
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    function getImagePathAttribute(){
        return $this->path.'/'. $this->image;
    }

    function getThumbnailPathAttribute(){
        return $this->path.'/thumb/'. $this->image;
    }
}
