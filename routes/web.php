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


Route::get('/login', [EUSController::class, 'getLogin']);
Route::post('/login', [EUSController::class, 'login'])->name('login');







// Route::get('/san-pham', [EUSController::class, 'products']);


// Route::get('/them-san-pham', [EUSController::class, 'getAdd']);
// Route::post('/them-san-pham', [EUSController::class, 'postAdd']);

// Route::prefix('users')->name('users.')->group(function () {
//     Route::get('/', [EUSController::class, 'getUsers'])->name('index');
//     Route::get('/add', [EUSController::class, 'getAddUsers'])->name('addUsers');
//     Route::post('/post', [EUSController::class, 'postAddUsers'])->name('postUsers');
//     Route::get('/edit/{id}', [EUSController::class, 'getEditUsers'])->name('getEditUsers');
//     Route::post('/edit/{id}', [EUSController::class, 'postEditUsers'])->name('postEditUsers');
//     Route::get('/delete/{id}', [EUSController::class, 'deleteUser'])->name('destroy');
// });

// Route::get('/getlogin', [EUSController::class, 'getLogin'])->name('get-login');
// Route::post('/login', [EUSController::class, 'login'])->name('login');
