<?php

use App\Http\Controllers\HomeController;
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
    route::get('/sign-in', [HomeController::class, 'UserLogout'])->name('sign-in');
    route::get('/sign-up', [HomeController::class, 'UserLogout'])->name('sign-up');
    route::get('/logout', [HomeController::class, 'UserLogout'])->name('logout');
    Route::get('/update-password', [HomeController::class, 'UpdatePassword']);

    // Search
    Route::get('/search-a-product', [HomeController::class, 'SearchProduct']);

    // Pages
    Route::prefix('pages')->group(function () {
        route::get('/', [HomeController::class, 'index']);
        route::get('/my-account', [HomeController::class, 'UserAccount'])->name('user.account');
        Route::get('/shop', [HomeController::class, 'ShopPage'])->name('user.shop');
        Route::get('/product_details/{id}', [HomeController::class, 'ProductDetails']);
        Route::get('/contact', [HomeController::class, 'ContactPage'])->name('user.contact');
    });

    // Cart Routes
    Route::prefix('cart')->group(function () {
        Route::get('/', [HomeController::class, 'cartPage'])->name('user.cart');
        Route::post('/add/{id}', [HomeController::class, 'addToCart'])->name('cart.add');
        Route::get('/remove/{id}', [HomeController::class, 'removeProductFromCart'])->name('cart.remove');
        Route::get('/clear', [HomeController::class, 'clearCart'])->name('cart.clear');
    });

    // Order
    Route::prefix('orders')->group(function () {
        Route::get('/', [HomeController::class, 'userOrders'])->name('user.orders');
        Route::get('/{id}', [HomeController::class, 'orderReceived'])->name('order.received');
        Route::get('/cancel/{id}', [HomeController::class, 'cancelOrder'])->name('order.cancel');
        Route::get('/checkout', [HomeController::class, 'checkout'])->name('user.checkout');
    });

    /** Admin Routes **/
    Route::prefix('admin')->group(function () {
        // Products
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index']);
            Route::post('/', [ProductController::class, 'store']);
            Route::put('/{id}', [ProductController::class, 'update']);
            Route::delete('/{id}', [ProductController::class, 'destroy']);
        });
        // Orders
        Route::prefix('orders')->group(function () {
            Route::get('/', [OrderController::class, 'index']);
            Route::get('/{id}', [OrderController::class, 'show']);
            Route::put('/{id}', [OrderController::class, 'update']);
            Route::delete('/{id}', [OrderController::class, 'destroy']);
        });
    });
});
