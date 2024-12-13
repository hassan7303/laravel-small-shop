<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('v1')->group(function () {

    /** User Routes **/
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/cart', [CartController::class, 'show']);
    Route::post('/cart/add', [CartController::class, 'add']);
    Route::post('/order/create', [OrderController::class, 'create']);

    /** Admin Routes **/
    Route::prefix('admin')->group(function () {
        Route::get('/products', [ProductController::class, 'index']);
        Route::post('/products', [ProductController::class, 'store']);
        Route::put('/products/{id}', [ProductController::class, 'update']);
        Route::delete('/products/{id}', [ProductController::class, 'destroy']);

        Route::get('/cart', [CartController::class, 'adminShow']);
        Route::delete('/cart/{id}', [CartController::class, 'removeItem']);

        Route::get('/orders', [OrderController::class, 'index']);
        Route::get('/orders/{id}', [OrderController::class, 'show']);
        Route::put('/orders/{id}', [OrderController::class, 'update']);
        Route::delete('/orders/{id}', [OrderController::class, 'destroy']);
    });
});
