<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{


    public function store(Request $request)
    {

        return response()->json([
            'path' => 1
        ]);
    }
}
