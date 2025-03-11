<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class BlogRequest extends FormRequest
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
        $blogId = $this->route('blog') ? $this->route('blog')->id : null;
        return [
            'title' =>'required|string|max:255|unique:blogs,title,' . $blogId,
            'type' => 'required',
            'content' => 'nullable|string|max:10000',
            'short_description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:5120',
        ];
    }
    public function blogFillData()
    {
        $data = [
            'title'    => $this->get('title'),
            'slug' => Str::slug($this->get('title')),
            'type'    => $this->get('type'),
            'content'      => $this->get('content'),
            'short_description'      => $this->get('short_description'),
            'is_featured' => ($this->get('is_featured') ? $this->get('is_featured') : '') == 'on' ? '1' : '0'

        ];

        if ($this->has('publish'))
        {
            $data['is_published'] = true;
        }

        return $data;
    }
}
