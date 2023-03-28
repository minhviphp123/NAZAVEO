<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'index']);
Route::get('/go-to-add-user', [UserController::class, 'goToAddUser']);
Route::get('/go-to-update-user/{id}', [UserController::class, 'goToUpdateUser'])->name('to.users.update');
Route::post('/add-user', [UserController::class, 'addNewUser']);
Route::post('/update/{id}', [UserController::class, 'editUser'])->name('users.edit');
Route::delete('/delete/{id}', [UserController::class, 'deleteUser'])->name('users.destroy');
