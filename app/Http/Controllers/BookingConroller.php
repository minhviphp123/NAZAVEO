<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingConroller extends Controller
{
    public function getHome()
    {
        return "Hello from Booking System!";
    }
}
