<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EUSController extends Controller
{

    public $data = [];

    public function index()
    {
        return view('home');
    }

    public function products()
    {
        $this->data['content'] = 'Products';

        return view('client.products', $this->data);
    }

    public function getAdd()
    {

        $this->data['title'] = 'Thêm sản phẩm';

        return view('client.add', $this->data);
    }

    public function postAdd(Request $request)
    {
        $token = $request->session()->token();

        // $token = csrf_token();
        dd($token);
    }

    public function putAdd(Request $request)
    {
        dd($request);
    }

    public function downloadImg(Request $request, $link)
    {
        return 1;
    }
}
