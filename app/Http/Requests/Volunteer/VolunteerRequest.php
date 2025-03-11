<?php

namespace App\Http\Requests\Volunteer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
class VolunteerRequest extends FormRequest
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
        $volunteerId = $this->route('volunteer') ? $this->route('volunteer')->id : null;
        return [
            'title' => 'required|string|max:50|unique:volunteers,title,' . $volunteerId,
            'position' => 'nullable|string|max:50',
            'content' => 'nullable|string|max:10000',
            'meta_description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:5120',
        ];
    }

    public function volunteerFillData()
    {
        $data = [
            'title'    => $this->get('title'),
            'slug' => Str::slug($this->get('title')),
            'content'      => $this->get('content'),
            'meta_description'      => $this->get('meta_description'),
            'position' => $this->get('position'),
            'is_featured' => ($this->get('is_featured') ? $this->get('is_featured') : '') == 'on' ? '1' : '0'
        ];

        if ($this->has('publish'))
        {
            $data['is_published'] = true;
        }

        return $data;
    }
}

