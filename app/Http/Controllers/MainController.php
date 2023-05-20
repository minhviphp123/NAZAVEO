<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Phone;
use App\Models\Mouse;
use App\Models\Keyboard;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    private $categories;
    private $allProducts;

    public function __construct()
    {
        $this->categories = Category::all();
        $phones = Phone::all()->toArray();
        $mice = Mouse::all()->toArray();
        $keyboards = Keyboard::all()->toArray();
        $this->allProducts = array_merge($phones, $mice, $keyboards);
    }

    public function home()
    {
        $categories = $this->categories;

        session()->put('categories', $categories);
        session()->put('n', 1);
        // session()->put('nums', session()->get('n'));

        if (Auth::check()) {
            $user = Auth::user();
            $personalPage =  'Trang cá nhân';
        }

        return view('home', ['categories' => $categories, 'user' => $user ?? null, 'personalPage' => $personalPage ?? null]);
    }

    public function getUser($id)
    {
        $userId = $id;
        $categories = $this->categories;
        $allProducts = $this->allProducts;

        if ($userId && $userId == Auth::id()) {

            $user = User::find($userId);

            return view('home', compact('user', 'categories', 'allProducts'));
        }

        return back();
    }

    public function getDetailPhoneById($id)
    {
        $selectedPhone = Phone::find($id);

        // return $selectedPhone;
        $user = session()->get('user');
        $categories = session()->get('categories');

        return view('productItem', compact('selectedPhone', 'user', 'categories'));
    }

    public function getDetailMouseById($id)
    {
        $selectedMouse = Mouse::find($id);

        return $selectedMouse;
    }

    public function getDetailKeyboardById($id)
    {
        $selectedKeyboard = Keyboard::find($id);

        return $selectedKeyboard;
    }

    public function getDetailProductGroupById($id)
    {
        // $selectedGroupProduct =;
        switch ($id) {
            case 1:
                $selectedGroupProduct = Phone::all();
                break;

            case 2:
                $selectedGroupProduct = Mouse::all();

            default:
                $selectedGroupProduct = Keyboard::all();
                break;
        }

        // $selectedGroupProduct = 
        return view('groupProductDetail', compact('selectedGroupProduct'));
    }

    public function addNum()
    {
        $n = session()->get('n');

        $n++;
        // return $n;
        session()->put('n', $n);

        return session()->get('n');

        return redirect()->back();
    }
}
