<?php

namespace App\Models\Event;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{


    protected $dates = ['event_date'];

    protected $path ='uploads/event';


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
        'event_date',
        'type',
        'is_featured',
        'is_published'
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

    /**
     * @param $query
     * @param bool $type
     * @return mixed
     */
    public function scopePublished($query, $type = true)
    {
        return $query->where('is_published', $type);
    }

    /**
     * @param $query
     * @param bool $type
     * @return mixed
     */
    public function scopeFeatured($query, $type = true)
    {
        return $query->where('is_featured', $type);
    }

    function getImagePathAttribute(){
        return $this->path.'/'. $this->image;
    }

    function getThumbnailPathAttribute(){
        return $this->path.'/thumb/'. $this->image;
    }

}
