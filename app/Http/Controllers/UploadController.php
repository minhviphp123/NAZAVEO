<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UploadController extends Controller
{


    public function store()
    {

        return response()->json([
            'path' => 1
        ]);
    }
}
