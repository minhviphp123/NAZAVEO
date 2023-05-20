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
    //         Phone::create([
    //             'name' => 'Phone ' . $i,
    //             'description' => 'desc ' . $i,
    //             'price' => 100000,
    //             'category_id' => 3,
    //         ]);
    //     }

    //     return "added!";
    // }

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

    public function login(Request $request)
    {

        Session::put('previousURL', url()->previous());
        $previousUrl = Session::get('previousURL');



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

        if (Auth::attempt($credentials)) {
            $name = $request->input('name');
            $user = User::where('name', $name)->first();

            // $request->session()->regenerate();

            $id = Auth::id();
            $user = Auth::user();
            session()->put('user', $user);

            if (Str::contains($previousUrl, 'detail-groupProduct')) {
                // Do something if the current URL contains "detail"
                return redirect()->back();
            }
            // return Redirect::route('getUser', ['id' => $id]);
            return redirect()->route('getUser', ['id' => $id]);
        } else {
            session()->flash('error', 'info!');
            return redirect()->back();
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
