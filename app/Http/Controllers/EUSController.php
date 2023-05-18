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

class EUSController extends Controller
{
    public function add(): string
    {
        for ($i = 1; $i < 11; $i++) {
            Phone::create([
                'name' => 'Phone ' . $i,
                'description' => 'desc ' . $i,
                'price' => 100000,
                'category_id' => 3,
            ]);
        }

        return "added!";
    }

    ////////////// vao seeder de biet cach them data va them data nao

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
        $user = User::where('name', $name)->first();

        if ($user) {
            if (Hash::check($password, $user->password)) {
                return view('home', compact('user'));
            } else {
                session()->flash('password', 'Sai password');
                return redirect()->back();
            }
        } else {
            session()->flash('name', 'User không tồn tại');
            return redirect()->back();
        }

        // authUser($name, $password);
        // return $request->all();

    }
}
