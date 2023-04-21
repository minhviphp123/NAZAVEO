<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\CheckSignAndLogin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Policies\PostPolicy;

class EUSController extends Controller
{
    protected $postPolicy;

    public function __construct(PostPolicy $postPolicy)
    {
        $this->postPolicy = $postPolicy;
    }

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

        return redirect()->route('add-user')->with('success', 'Sign Up Succeed !');
    }

    public function getLogIn()
    {
        return view('admin.user.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('name', 'password');
        // if (Auth::attempt($credentials)) {
        //     if (Gate::allows('isAdmin')) {
        //         return "Hello Admin " . $credentials["name"];
        //     }
        //     return "Hello User " . $credentials["name"];
        // } else {
        //     return to_route('log-in')->with('danger', 'error login !');
        // }

        if (Auth::attempt($credentials)) {
            $users = User::where('name', $credentials['name'])->first();

            if ($this->postPolicy->checkRole($users->role)) {
                // return "Hello " . $credentials['name'];
                return "Hello " . $users->role;
            } else {
                abort(403);
            }
        } else {
            return to_route('log-in')->with('danger', 'error login !');
        }

        // return "Hello Admin " . $credentials['name'];
    }
}
