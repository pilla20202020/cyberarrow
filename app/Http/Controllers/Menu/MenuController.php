<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\MenuRequest;
use App\Models\Menu\ChildSubMenu;
use App\Models\Menu\Menu;
use App\Models\Menu\SubMenu;
use App\Models\Page\Page;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menu;

    /**
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $menus = Menu::with('subMenus')->orderBy('order')->get();

        $model1 = Page::published()->primary(false)->get();

        $pages = collect($model1);
        return view('menu.index', compact('menus', 'pages'));
    }

//    public function indexnp()
//    {
//        $menus = Menu::with('subMenus')->orderBy('order')->get();
//
//        $pages = Page::published()->primary(false)->pluck('title', 'id');
//
//        return view('menu.indexnp', compact('menus', 'pages'));
//    }

    /**
     * @param StoreMenu $request
     * @return mixed
     */
    public function store(MenuRequest $request)
    {
        $menu = Menu::create($request->menuFillData());

        return back()->withSuccess(trans('messages.create_success', ['entity' => 'Menu']))->with('collapse_in', $menu->id);
    }

    /**
     * @param StoreMenu $request
     * @param Menu $menu
     * @return mixed
     */
    public function storeSubMenu(MenuRequest $request, Menu $menu)
    {
        SubMenu::create($request->subMenuFillData());

        return back()->withSuccess(trans('messages.create_success', ['entity' => 'Sub Menu']))->with('collapse_in', $menu->id);
    }

    /**
     * @param StoreMenu $request
     * @param Menu $menu
     * @return mixed
     */
    public function storeChildSubMenu(MenuRequest $request, SubMenu $subMenu)
    {
        ChildSubMenu::create($request-> childsubMenuFillData($subMenu));

        return back()->withSuccess(trans('message.create_success', ['entity' => 'Child Sub Menu']))->with('collapse_in', $subMenu->id);
    }


    /**
     * @param Request $request
     * @return mixed
     */

    public function edit(Menu $menu)
    {
        return view('menu.edit',compact('menu'));
    }

    public function editSubMenu(Menu $menu, SubMenu $subMenu)
    {
        return view('menu.editsub',compact('menu','subMenu'));
    }

    public function editChildSubMenu(Menu $menu, SubMenu $subMenu, ChildSubMenu $childSubMenu)
    {
        return view('menu.editchildsub',compact('menu','subMenu','childSubMenu'));
    }
    public function update(Request $request)
    {
        foreach ($request->get('order') as $order => $menuId)
        {
            $menu = Menu::find($menuId);

            $menu->update(['order' => $order]);
        }

        if ($request->has('sub_menu_order'))
        {
            foreach ($request->get('sub_menu_order') as $menuId => $subMenuOrder)
            {
                foreach ($subMenuOrder as $order => $subMenuId)
                {
                    $subMenu = SubMenu::find($subMenuId);

                    $subMenu->update(['order' => $order]);
                }
            }
        }

        if ($request->has('child_sub_menu_order'))
        {
            foreach ($request->get('child_sub_menu_order') as $subMenuOrder => $childsubMenuOrder )
            {
                foreach ($childsubMenuOrder as $order => $childsubMenuId)
                {
                    $childsubMenu = ChildSubMenu::find($childsubMenuId);

                    $childsubMenu->update(['order' => $order]);
                }
            }
        }

        return back()->withSuccess(trans('messages.update_success', ['entity' => 'Menu Order']));
    }

    /**
     * @param Menu $menu
     * @return \Illuminate\View\View
     */

    public function updateMenu(Request $request, $id)
    {
        $menu = Menu::find($id);
        if ($menu->update($request->all())) {
            $name = $request->name;
            $name = explode(" ",$name);
            $slug = implode("-", $name);
            $slug = strtolower($slug);
            $menu->fill([
                'slug' => $slug,
            ])->save();
            return redirect()->route('menu.index')->withSuccess(trans('Menu has been updated'));
        }
    }

    public function updateSubMenu(Request $request, $id)
    {
        $subMenu = SubMenu::find($id);
        if($subMenu->update($request->all())){
            $name = $request->name;
            $name = explode(" ",$name);
            $slug = implode("-",$name);
            $slug = strtolower($slug);
            $subMenu->fill([
                'slug' => $slug,
            ])->save();
            return redirect()->route('menu.index')->withSuccess(trans('Menu has been updated'));

        }
    }

    public function updateChildSubMenu(Request $request, $id)
    {
        $childSubMenu = ChildSubMenu::find($id);
        if($childSubMenu->update($request->all())){
            $name = $request->name;
            $name = explode(" ",$name);
            $slug = implode("-",$name);
            $slug = strtolower($slug);
            $childSubMenu->fill([
                'slug' => $slug,
            ])->save();
            return redirect()->route('menu.index')->withSuccess(trans('Menu has been updated'));

        }
    }

    public function subMenuModal(Menu $menu)
    {
        $model1 = Page::published()->primary(false)->get();


        $model3 = Menu::get();

        $collect = collect($model1);


        $pages = $collect->merge($model3);

        return view('menu.partials.subMenuModal', compact('menu', 'pages'));
    }

    /**
     * @param Menu $menu
     * @return \Illuminate\View\View
     */
    public function childsubMenuModal(SubMenu $subMenu)
    {

        $model1 = Page::published()->primary(false)->get();


        $model3 = Menu::get();

        $collect = collect($model1);


        $pages = $collect->merge($model3);

        return view('menu.partials.childsubMenuModal', compact('subMenu', 'pages'));
    }

    /**
     * @param Menu $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Menu $menu)
    {
        if ($menu->delete())
        {
            return response()->json([
                'Result' => 'OK',
                'Menu'   => true
            ]);
        }

        return response()->json([
            'Result' => 'Error'
        ], 500);
    }

    /**
     * @param Menu $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroySubMenu(Menu $menu, SubMenu $subMenu)
    {
        if ($subMenu->delete())
        {
            return response()->json([
                'Result' => 'OK',
                'Menu'   => false,
                'SubMenu' => true
            ]);
        }

        return response()->json([
            'Result' => 'Error'
        ], 500);
    }

    /**
     * @param Menu $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyChildSubMenu(Menu $menu, SubMenu $subMenu,ChildSubMenu $childSubMenu)
    {
        if ($childSubMenu->delete())
        {
            return response()->json([
                'Result' => 'OK',
                'SubMenu'   => false,
                'Menu'   => false,
                'ChildSubMenu' => true
            ]);
        }

        return response()->json([
            'Result'    => 'Error'
        ], 500);
    }
}
