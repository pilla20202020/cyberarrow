<?php

namespace App\Http\Requests\Menu;

use App\Modules\Models\Menu\Menu;
use App\Modules\Models\Page\Page;
use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'name' => 'required'
        ];
    }

    public function subMenuFillData()
    {
        $page = Page::whereSlug($this->get('page'))->first();

        $first_sub_menu_order = $this->menu->subMenus->sortByDesc('order')->first();

            $inputs = [
                'menu_id' => $this->menu->id,
                'name' => $this->get('name') ? $this->get('name') : $page->title,
                // 'name_np' => $this->get('name_np') ? $this->get('name_np') : $page->title,
                'url' => isset($page) ? $page->slug : ($this->get('custom_url') ? $this->get('custom_url') : '#'),
                'order' => $first_sub_menu_order ? $first_sub_menu_order->order + 1 : 0,
            ];


        return $inputs;
    }

    /**
     * @return array
     */
    public function childsubMenuFillData()
    {
        $page = Page::whereSlug($this->get('page'))->first();

        $first_child_sub_menu_order = $this->subMenu->childsubMenus->sortBydesc('order')->first();

        $input = [
            'sub_menu_id' => $this->subMenu->id,
            'name' => $this->get('name') ? $this->get('name') : $page->title,
//            'name_np'           => $this->get('name_np') ? $this->get('name_np') : $page->title_np,
            'url' => isset($page) ? $page->slug : ($this->get('custom_url') ? $this->get('custom_url') : '#'),
            'order' => $first_child_sub_menu_order ? $first_child_sub_menu_order->order + 1 : 0,
            'is_published' => ($this->get('is_published') ? $this->get('is_published') : '') == 'on' ? '1' : '0',
            'is_status' => ($this->get('is_status') ? $this->get('is_status') : '') == 'on' ? '1' : '0',
            'is_featured' => ($this->get('is_featured') ? $this->get('is_featured') : '') == 'on' ? '1' : '0'
        ];

        return $input;
    }

    /**
     * @return array
     */
    public function menuFillData()
    {
        $page = Page::whereSlug($this->get('page'))->first();

        $inputs = [
            'name' => $this->get('name') ? $this->get('name') : $page->title,
//            'name_np'    => $this->get('name_np') ? $this->get('name_np') : $page->title_np,
//            'url'        => route('page.show', $page->slug) ,
            'url' => isset($page) ? $page->slug : ($this->get('custom_url') ? $this->get('custom_url') : '#'),

            'order' => count(Menu::orderBy('order', 'desc')->get()) > 0 ? Menu::orderBy('order', 'desc')->first()->order + 1 : 1,
        ];

        return $inputs;
    }
}
