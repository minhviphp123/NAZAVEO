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
}
