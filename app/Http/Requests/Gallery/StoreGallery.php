<?php

namespace App\Http\Requests\Gallery;

use Illuminate\Foundation\Http\FormRequest;

class StoreGallery extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'album_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:5120',
        ];
    }

    public function galleryFillData()
    {
        $data = [
            'album_id'               => $this->get('album_id'),
            // 'title'                  => $this->get('title'),
            // 'meta_description'      => $this->get('meta_description'),
            'is_published' => ($this->get('is_published') ? $this->get('is_published') : '') == 'on' ? '1' : '0',
            'is_featured' => ($this->get('is_featured') ? $this->get('is_featured') : '') == 'on' ? '1' : '0'
        ];

        if ($this->has('publish'))
        {
            $data['is_published'] = true;
        }

        return $data;
    }
}
