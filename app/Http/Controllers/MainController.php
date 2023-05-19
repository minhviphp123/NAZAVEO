<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Phone;
use App\Models\Mouse;
use App\Models\Keyboard;

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
        // $categories = $this->categories;

        return view('home');
    }

    public function getUser($id)
    {
        $userId = $id;
        $categories = $this->categories;
        $allProducts = $this->allProducts;

        if ($userId) {

            $user = User::find($userId);

            return view('home', compact('user', 'categories', 'allProducts'));
        }
    }

    public function getDetailPhoneById($id)
    {
        $selectedPhone = Phone::find($id);

        return $selectedPhone;
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
}
