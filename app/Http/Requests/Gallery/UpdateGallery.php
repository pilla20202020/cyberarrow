<?php

namespace App\Http\Requests\Gallery;

use Illuminate\Foundation\Http\FormRequest;


class UpdateGallery extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'             => 'required|max:200',
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $inputs = [
            'name'             => $this->get('name'),
            'meta_description' => $this->get('meta_description'),
            'album_id'               => $this->get('album_id'),
            'is_published' => ($this->get('is_published') ? $this->get('is_published') : '') == 'on' ? '1' : '0',
            'is_status' => ($this->get('is_status') ? $this->get('is_status') : '') == 'on' ? '1' : '0',
            'is_featured' => ($this->get('is_featured') ? $this->get('is_featured') : '') == 'on' ? '1' : '0'
        ];

        if ($this->has('publish'))
        {
            $inputs['is_published'] = true;
        }

        return $inputs;
    }
}

