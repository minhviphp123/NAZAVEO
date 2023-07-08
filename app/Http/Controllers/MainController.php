<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    private $categories;
    private $allProducts;

    public function __construct()
    {
    }

    public function home()
    {
        $categories = $this->categories;

        session()->put('categories', $categories);
        session()->put('n', 1);

        if (Auth::check()) {
            $user = Auth::user();
            $personalPage =  'Trang cá nhân';
        }

        return view('home', ['categories' => $categories, 'user' => $user ?? null, 'personalPage' => $personalPage ?? null]);
    }


    public function getAdmin()
    {
        return view('admin', [
            'title' => 'ADMIN',
            'adminName' => session()->get('admin-name')
        ]);
    }
}
