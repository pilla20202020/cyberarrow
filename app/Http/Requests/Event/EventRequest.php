<?php

namespace App\Http\Requests\Event;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
        $eventId = $this->route('event') ? $this->route('event')->id : null;
        $rules = [
            'title' => 'required|string|max:255|unique:events,title,' . $eventId,
            'type' => 'required',
            'content' => 'nullable|string|max:10000',
            'meta_description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:5120',
        ];

        return $rules;
    }

    public function eventFillData(){


        $inputs=[
            'title' => $this->get('title'),
            'slug' => Str::slug($this->get('title')),
            'meta_description'=> $this->get('meta_description'),
            'content'   => $this->get('content'),
            'event_date' => $this->get('event_date'),
            'type' => $this->get('type'),
            // 'is_published' => ($this->get('is_published') ? $this->get('is_published') : '') == 'on' ? '1' : '0',
            // 'is_status' => ($this->get('is_status') ? $this->get('is_status') : '') == 'on' ? '1' : '0',
            'is_featured' => ($this->get('is_featured') ? $this->get('is_featured') : '') == 'on' ? '1' : '0'

        ];

        if ($this->has('publish')) {
            $inputs['is_published'] = 1;
        }

        return $inputs;
    }
}
