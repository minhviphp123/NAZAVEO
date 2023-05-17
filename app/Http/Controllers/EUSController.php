<?php

namespace App\Http\Controllers;

use App\Http\Requests\authRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response as AccessResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Mix;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Json;

class EUSController extends Controller
{

    public $data = [];
    private $users;
    public function __construct()
    {
        // 
    }

    public function getLogin(): View
    {
        return view('auth.login');
    }

    public function login(authRequest $request)
    {

        $validator = Validator::make($request->all(), $request->rules(), $request->messages());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $name = $request->input('name');
        $password = $request->input('password');

        // if (Auth::attempt(['name' => $name, 'password' => $password])) {
        //     return 'succeed';
        // } else {
        //     return 'failed';
        // }
        $user = User::where('name', $name)->first();

        if ($user && Hash::check($password, $user->password)) {
            // User login successful
            return 1;
        } else {
            // User login failed
            return 0;
        }
        // return $request->all();
    }
}
