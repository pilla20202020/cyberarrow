<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class StorePage extends FormRequest
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
        $pageId = $this->route('page') ? $this->route('page')->id : null;

        return [
            'title' => 'required|max:200|unique:pages,title,' . $pageId,
            'category_id' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function pageFillData()
    {
        $inputs = [
            'title' => $this->get('title'),
            'slug' => Str::slug($this->get('title')),
            'meta_description' => $this->get('meta_description'),
            'content' => $this->get('content'),
            'url' => $this->get('url'),
            'author' => $this->get('author'),
            'category_id'=> $this->get('category_id'),
            // 'view' => $this->get('view'),
            'is_published' => ($this->get('is_published') ? $this->get('is_published') : '') == 'on' ? '1' : '0',
            // 'is_featured' => ($this->get('is_featured') ? $this->get('is_featured') : '') == 'on' ? '1' : '0'
        ];

        if ($this->has('publish')) {
            $inputs['is_published'] = true;
        }

        return $inputs;
    }

}
