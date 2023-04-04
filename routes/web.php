<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EUSController;

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


Route::get('/', [EUSController::class, 'index']);
Route::get('/san-pham', [EUSController::class, 'products']);
Route::get('/them-san-pham', [EUSController::class, 'getAdd']);
Route::post('/them-san-pham', [EUSController::class, 'postAdd']);
Route::get('/download/img', [EUSController::class, 'downloadImg'])->name('download-img');
