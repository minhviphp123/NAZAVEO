<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\CheckSignAndLogin;
use App\Models\User;

class EUSController extends Controller
{
    public function getSignUp()
    {
        return view('admin.user.signup-add');
    }

    public function postSignUp(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        $user = new User;

        $userInfo = [
            'name' => $request->input('name'),
            'password' => $request->input('password'),
            'role' => $request->input('role'),
        ];

        if ($user->isExistName($userInfo['name'])) {
            return redirect()->route('add-user')->with('warning', 'username existed!');
        }

        $user->createUser($userInfo);

        return redirect()->route('add-user')->with('success', 'Your profile has been updated successfully!');
    }
}
