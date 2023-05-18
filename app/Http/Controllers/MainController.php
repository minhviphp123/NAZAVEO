<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class MainController extends Controller
{
    public function home()
    {

        $categories = Category::all();

        return view('home', compact('categories'));
    }
}
