<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        $clientId = $this->route('client') ? $this->route('client')->id : null;
        $rules = [
            'title' =>'required|string|max:255|unique:clients,title,' . $clientId,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:5120',
        ];

        return $rules;
    }

    public function clientFillData(){


        $inputs=[
            'title' => $this->get('title'),
            'is_featured' => ($this->get('is_featured') ? $this->get('is_featured') : '') == 'on' ? '1' : '0'
        ];

        return $inputs;
    }
}
