<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

function hello(): string
{
    return "Hello World!";
}

function authUser($name, $password)
{
    $user = User::where('name', $name)->first();

    if ($user) {
        if (Hash::check($password, $user->password)) {
            return view('home', compact('users'));
        } else {
            session()->flash('password', 'Sai password');
            return redirect()->back();
        }
    } else {
        session()->flash('name', 'User không tồn tại');
        return redirect()->back();
    }
}
