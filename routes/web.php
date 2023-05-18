<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EUSController;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/login', [EUSController::class, 'getLogin']);
Route::post('/login', [EUSController::class, 'login'])->name('login');

// Route::get('/addSeeders', [EUSController::class, 'add']);

Route::get('/', [MainController::class, 'home']);
