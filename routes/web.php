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
Route::get('/', [App\Http\Controllers\AuthController::class, 'login']);
Route::get('client', [App\Http\Controllers\ClientController::class, 'index']);
Route::get('shop', [App\Http\Controllers\ClientController::class, 'shop']);
Route::get('cart', [App\Http\Controllers\ClientController::class, 'cart']);
Route::get('checkout', [App\Http\Controllers\ClientController::class, 'checkout']);
