<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EUSController;
use App\Http\Controllers\PostsController;
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

Route::get('/', [
    EUSController::class,
    'index'
]);

Route::get('/about', [
    EUSController::class,
    'about'
]);

// Route::get('/{id}', [
//     EUSController::class,
//     'detail'
// ])->where('id', '[0-9a-zA-Z]+');

Route::get('/posts', [PostsController::class, 'index']);
