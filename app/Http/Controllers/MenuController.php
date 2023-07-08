<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFormRequest;
use Exception;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function create()
    {
        $parentMenu = Menu::where('parent_id', 0)->get();
        $menu = Menu::all();

        return view('addMenu', [
            'title' => 'ADD MENU',
            'adminName' => session()->get('admin-name'),
            'parentMenu' => $parentMenu,
            'menu' => $menu
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        try {
            Menu::create([
                'name' => (string)$request->input('dm-name'),
                'parent_id' => (int)$request->input('parent_id'),
                'desc' => (string)$request->input('desc'),
            ]);

            session()->flash('success', 'tao danh muc thanh cong');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->back();
    }

    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }

    public function getAllMenu()
    {
        return Menu::all();
    }

    public function showList()
    {
        return view('listMenu', [
            'title' => 'LIST MENU',
            'adminName' => session()->get('admin-name'),
            'menus' => $this->getAllMenu()
        ]);
    }

    public function destroy(Request $request)
    {
        $menuID = $request->input('id');
        $menu = Menu::where('id', $menuID)->first();

        if ($menu) {
            Menu::where('id', $menuID)->orWhere('parent_id', $menuID)->delete();
            return response()->json([
                "error" => false
            ]);
        }

        return 'not exist';
    }

    public function getEdit($menuID)
    {
        $menu = Menu::where('id', $menuID)->first();
        $parentMenu = Menu::where('parent_id', 0)->get();

        return view('editMenu', [
            'menu' => $menu,   'title' => 'EDIT MENU',
            'adminName' => session()->get('admin-name'),
            'parentMenu' => $parentMenu,
        ]);
    }
    public function edit(Request $request, $menuID)
    {
        $menu = Menu::findOrFail($menuID);
        if ($menu) {
            $menu->name = $request->input('dm-name');
            $menu->parent_id = $request->input('parent_id');
            $menu->desc = $request->input('desc');
        }

        $menu->save();

        return redirect()->route('show-list');
    }
}
