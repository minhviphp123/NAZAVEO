<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\DB;


class ImageController extends Controller
{
    public function index()
    {
        return view('formUploadIMG');
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        // ]);

        $image_path = $request->file('image')->store('image', 'public');

        $data = Image::create([
            'image' => $image_path,
        ]);

        session()->flash('success', 'Image Upload successfully');

        return redirect()->route('image.index');
    }

    public function show()
    {

        $imgs = DB::table('images')->get();
        return view('imgs', compact('imgs'));
    }
}
