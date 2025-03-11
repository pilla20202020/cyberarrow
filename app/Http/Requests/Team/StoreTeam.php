<?php

namespace App\Http\Requests\Team;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Team\Team;

class StoreTeam extends FormRequest
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
            'title' => $this->get('title'),
            'position' => $this->get('position'),
            'content' => $this->get('content'),
            'email' => $this->get('email'),
            'facebook' => $this->get('facebook'),
            'rank' => $this->get('rank'),
            'is_published' => ($this->get('is_published') ? $this->get('is_published') : '') == 'on' ? '1' : '0',
            'is_featured' => ($this->get('is_featured') ? $this->get('is_featured') : '') == 'on' ? '1' : '0',
            'order' => isset(Team::orderBy('order', 'desc')->first()->order) ? Team::orderBy('order', 'desc')->first()->order + 1 : 0,
        ];

        return $data;
    }


}
