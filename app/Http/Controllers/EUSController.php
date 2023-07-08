<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;


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

    public function login(Request $request)
    {

        Session::put('previousURL', url()->previous());

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'password' => 'required|min:4',
        ]);

        if ($validator->fails()) {
            // Dữ liệu không hợp lệ
            flash('Du lieu khong hop le')->error();
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only(
            'name',
            'password'
        );

        if (Auth::attempt($credentials)) {
            session()->put('admin-name', $credentials['name']);
            flash('Dang nhap thanh cong!')->success();

            return redirect()->route('get-admin');
        } else {
            return redirect()->back()->with('error', 'dang nhap that bai');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
