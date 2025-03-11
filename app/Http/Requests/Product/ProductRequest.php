<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'required'
        ];
    }

    public function data()
    {
        $data = [
            'title'    => $this->get('title'),
            'category_id'  => $this->get('category_id'),
            'description'  => $this->get('description'),
            'price'  => $this->get('price'),
            'is_featured' => ($this->get('is_featured') ? $this->get('is_featured') : '') == 'on' ? '1' : '0',
            // 'is_popular' => ($this->get('is_popular') ? $this->get('is_popular') : '') == 'on' ? '1' : '0',
            'status' => ($this->get('status') ? $this->get('status') : '') == 'on' ? '1' : '0',
            'signature' => ($this->get('signature') ? $this->get('signature') : '') == 'on' ? '1' : '0',
            'chef' => ($this->get('chef') ? $this->get('chef') : '') == 'on' ? '1' : '0',
            'award' => ($this->get('award') ? $this->get('award') : '') == 'on' ? '1' : '0',
        ];

        return $data;
    }
}
