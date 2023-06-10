<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EUSController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProductController;
use  App\Http\Controllers\UserPageController;

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
// Route::post('/logout', [EUSController::class, 'logout'])->name('logout');
Route::get('/logout', [EUSController::class, 'logout'])->name('logout');
// Route::get('/addSeeders', [EUSController::class, 'add']);
Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/detail-groupProduct/{id}', [MainController::class, 'getDetailProductGroupById'])->name('detail-groupProduct');

Route::middleware(['auth'])->group(function () {
    Route::get('admin', [MainController::class, 'getAdmin'])->name('get-admin');
    Route::prefix('menu')->group(function () {
        Route::get('/add', [MenuController::class, 'create'])->name('add-menu');
        Route::post('/add', [MenuController::class, 'store'])->name('store-menu');
        Route::get('/list', [MenuController::class, 'showList'])->name('show-list');
        Route::get('/getAllMenu', [MenuController::class, 'getAllMenu'])->name('get-all-menu');
        Route::get('/edit/{id}', [MenuController::class, 'getEdit'])->name('edit-menu');
        Route::post('/edit/{id}', [MenuController::class, 'edit'])->name('post-edit-menu');
        Route::get('/destroy', [MenuController::class, 'destroy'])->name('destroy-menu');
    });

    Route::prefix('product')->group(function () {
        Route::get('/add', [ProductController::class, 'create'])->name('add-product');
        Route::post('/get-img', [ProductController::class, 'getImg'])->name('get-img');
        Route::post('/add', [ProductController::class, 'store'])->name('store-product');
        Route::get('/list', [ProductController::class, 'show'])->name('list-product');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit-product');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('update-product');
        Route::get('/destroy/{id}', [ProductController::class, 'destroy'])->name('destroy-product');
    });


    // Route::post('/upload/services', [UploadController::class, 'store'])->name('upload-thumb');
});

Route::prefix('user')->group(function () {
    Route::get('/', [UserPageController::class, 'index'])->name('get-main-page');
    Route::get('/product-detail/{id}', [UserPageController::class, 'getProdById'])->name('get-prod-detail');
    Route::post('/add-to-cart', [UserPageController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/view-cart', [UserPageController::class, 'viewCart'])->name('view-cart');
    Route::post('/order', [UserPageController::class, 'order'])->name('order');

    Route::get('/groupProduct/{id}', [UserPageController::class, 'getGroupProd'])->name('group-product');
});

Route::get('/send-mail', [UserPageController::class, 'sendMail']);
Route::get('/test-toast', [UserPageController::class, 'showToast']);
Route::get('/toast', [UserPageController::class, 'toast'])->name('show-toast');


Route::get('/get-prods/{id}', [UserPageController::class, 'AJAX'])->name('test-ajax');
