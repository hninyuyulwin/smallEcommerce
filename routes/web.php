<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('logout', function () {
    Session::forget('user');
    return redirect('login');
})->name('logout');

Route::get('register', function () {
    return view('register');
});
Route::post('register', [UserController::class, 'register'])->name('register');

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/', [ProductController::class, 'index'])->name('product');
Route::get('detail/{id}', [ProductController::class, 'detail'])->name('product-detail');
Route::get('search', [ProductController::class, 'index'])->name('search');

Route::post('addtoCart', [ProductController::class, 'addtoCart'])->name('addtoCart');
Route::get('cartList', [ProductController::class, 'cartList'])->name('cartList');
Route::get('productDel/{id}', [ProductController::class, 'productDel'])->name('productDel');
Route::get('orderNow', [ProductController::class, 'orderNow'])->name('orderNow');
Route::post('orderPlace', [ProductController::class, 'orderPlace'])->name('orderPlace');
Route::get('myOrder', [ProductController::class, 'myOrder'])->name('myOrder');
