<?php

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

Route::get('/g', function () {
    return view('welcome');
});

    Auth::routes();
Route::get('login', [App\Http\Controllers\AuthController::class, 'login']);
Route::get('/', [App\Http\Controllers\ClientController::class, 'index']);
Route::get('shop', [App\Http\Controllers\ClientController::class, 'shop']);
Route::get('cart', [App\Http\Controllers\ClientController::class, 'cart']);
Route::get('checkout', [App\Http\Controllers\ClientController::class, 'checkout']);
Route::post('storeCart', [App\Http\Controllers\ClientController::class, 'storeCart'])->name('storeCart');
Route::get('productDetail/{id}', [App\Http\Controllers\ClientController::class, 'productDetail']);
Route::get('cartRemove/{id}', [App\Http\Controllers\ClientController::class, 'removeItem']);
Route::post('placeOrder', [App\Http\Controllers\OrderController::class, 'placeOrder']);
//admin routes
Route::get('admin', [App\Http\Controllers\AdminController::class, 'index']);
Route::get('stock', [App\Http\Controllers\AdminController::class, 'stock']);
Route::get('addStock', [App\Http\Controllers\AdminController::class, 'addStock']);
Route::get('editStock/{id}', [App\Http\Controllers\AdminController::class, 'editStock']);
Route::post('eStock', [App\Http\Controllers\AdminController::class, 'eStock'])->name('eStock');
Route::post('storeStock', [App\Http\Controllers\AdminController::class, 'storeStock'])->name('storeStock');
Route::post('deleteStock', [App\Http\Controllers\AdminController::class, 'deleteStock']);
