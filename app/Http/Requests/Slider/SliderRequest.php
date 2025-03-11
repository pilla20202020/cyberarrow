<?php

namespace App\Http\Requests\Slider;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        $rules = [
            'title' =>'required|string|max:255',
            'caption'=>'nullable|string|max:10000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:5120',
        ];

        return $rules;
    }

    public function sliderFillData(){


        $inputs=[
            'title' => $this->get('title'),
            'slug' => Str::slug($this->get('title')),
            'meta_description'=> $this->get('meta_description'),
            'content'   => $this->get('content'),
            'is_featured' => ($this->get('is_featured') ? $this->get('is_featured') : '') == 'on' ? '1' : '0'
        ];

        return $inputs;
    }
}
