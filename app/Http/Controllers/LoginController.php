<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login');
    }

    public function store(LoginRequest $request)
    {

        dd($request);
        // return $request->input();
    }
}
