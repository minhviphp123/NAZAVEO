<?php

use App\Http\Controllers\Admin\Users\MainController;
use App\Http\Controllers\EUSController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [EUSController::class, 'getSignUp'])->name('add-user');
Route::post('/add-user', [EUSController::class, 'postSignUp'])->name('post-user');
Route::get('/log-in', [EUSController::class, 'getLogIn'])->name('log-in');
Route::post('/log-in', [EUSController::class, 'postLogin'])->name('post-login');
