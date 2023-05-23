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
use Illuminate\Support\Facades\DB;
use App\Models\Keyboard;
use App\Models\Mouse;
use App\Models\Category;
use App\Models\Phone;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class EUSController extends Controller
{
    // public function add(): string
    // {
    //     for ($i = 1; $i < 11; $i++) {
    //         User::create([
    //             'name' => 'User ' . $i,
    //             'email' => 'email ' . $i . '@gmail.com',
    //             'password' => bcrypt('password'),
    //         ]);
    //     }

    //     return "added!";
    // }

    ////////////// vao seeder de biet cach them data va them data nao

    public $data = [];
    public function __construct()
    {
        // 
    }

    public function getLogin(): View
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {


        // dd($previousUrl);


        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'password' => 'required|min:4',
        ]);

        if ($validator->fails()) {
            // Dữ liệu không hợp lệ
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only(
            'name',
            'password'
        );

        // return $credentials;

        if (Auth::attempt($credentials)) {

            return 1;
        } else {
            // session()->flash('error', 'info!');
            // return redirect()->back();
            return 0;
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
