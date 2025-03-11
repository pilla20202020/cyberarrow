<?php

namespace App\Http\Requests\Testimonial;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
class TestimonialRequest extends FormRequest
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
        $testimonialId = $this->route('testimonial') ? $this->route('testimonial')->id : null;

        return [
            'title' => 'required|max:200|unique:pages,title,' . $testimonialId,
            'office' => 'nullable|string|max:50',
            'category_id' => 'required',
            'position' => 'nullable|string|max:50',
            'content' => 'nullable|string|max:10000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:5120',
        ];
    }

    public function testimonialFillData()
    {
        $data = [
            'title'    => $this->get('title'),
            'slug' => Str::slug($this->get('title')),
            'content'      => $this->get('content'),
            'office'      => $this->get('office'),
            'position' => $this->get('position'),
            'author' => $this->get('author'),
            'category_id'=> $this->get('category_id'),
            'is_featured' => ($this->get('is_featured') ? $this->get('is_featured') : '') == 'on' ? '1' : '0'
        ];

        if ($this->has('publish'))
        {
            $data['is_published'] = true;
        }

        return $data;
    }
}

