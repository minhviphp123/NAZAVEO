<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EUSController extends Controller
{
    public function index()
    {
        $myphone = [
            "name" => "ip7pls",
            "year" => "2016"
        ];
        return view('home', [
            'myphone' => $myphone
        ]);
    }

    public function detail($id)
    {
        $myphone = [
            "name" => "ip7pls",
            "year" => "2016"
        ];
        return view('product', [
            'product' => $myphone[$id] ?? 'unknown product'
        ]);
    }

    public function about()
    {
        $name = 'minh';
        return view('about', compact('name'));
    }
}
