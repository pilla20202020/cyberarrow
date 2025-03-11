<?php

namespace App\Http\Requests\Album;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlbum extends FormRequest
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
            'name'             => 'required|max:200',
//            'name_np'             => 'required|max:200',
//            'description'      => 'required',
//            'description_np'      => 'required',
//            'cover_image'      => 'max:2048'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $inputs = [
            'name'              => $this->get('name'),
            'name_np'              => $this->get('name_np'),
//            'description'       => $this->get('description'),
//            'description_np'       => $this->get('description_np'),
//            'cover_image'       => $this->get('image'),
            'is_published' => ($this->get('is_published') ? $this->get('is_published') : '') == 'on' ? '1' : '0',
            'is_notice' => ($this->get('is_notice') ? $this->get('is_notice') : '') == 'on' ? '1' : '0',
            'is_featured' => ($this->get('is_featured') ? $this->get('is_featured') : '') == 'on' ? '1' : '0'
        ];

        if ($this->has('publish'))
        {
            $inputs['is_published'] = true;
        }

        return $inputs;
    }
}
