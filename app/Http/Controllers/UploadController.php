<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{


    public function store(Request $request)
    {
        // dd($request->file());

        // $url = null;

        // if ($request->hasFile('file')) {
        //     try {
        //         $name = $request->file('file')->getClientOriginalName();
        //         $pathFull = 'uploads/' . date("Y/m/d");

        //         $request->file('file')->storeAs(
        //             'public/' . $pathFull,
        //             $name
        //         );

        //         $url = '/storage/' . $pathFull . '/' . $name;

        //         return response()->json([
        //             'error' => false,
        //             'url'   => $url
        //         ]);
        //     } catch (\Exception $error) {
        //         $url = false;
        //     }
        // }

        // return response()->json(['error' => true]);

        // $file = $request->file('file');
        // $name = $file->getClientOriginalName();
        // $pathFull = 'uploads/' . date("Y/m/d");
        // $path = $file->store('images', 'public');

        return response()->json([
            'path' => 1
        ]);

        // return 1;

        // if ($request->hasFile('file')) {

        //     $image = $request->file('file');
        //     $filename = time() . '.' . $image->getClientOriginalExtension();
        //     $destinationPath = public_path('/images');
        //     $image->move($destinationPath, $filename);

        //     $latestFile = collect(File::glob(public_path('images/*')))
        //         ->sortByDesc(function ($file) {
        //             return filemtime($file);
        //         })
        //         ->first();


        // }
    }
}
