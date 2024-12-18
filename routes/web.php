<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
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


Route::prefix('v1')->group(function () {

    /** Public Routes (User) **/

    // Home
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Products
    Route::get('/products', [HomeController::class, 'products'])->name('products.index');
    Route::get('/products/{id}', [HomeController::class, 'productDetails'])->name('products.show');

    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    
    // Login & Register
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    
    // Contact
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    
    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'processOrder'])->name('checkout.process');

    /** Admin Routes **/
    // Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {    
    Route::prefix('admin')->group(function () {    

        // Admin Dashboard
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
        // Products Management
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.products.index');
            Route::get('/form-create', [ProductController::class, 'formCreate'])->name('admin.products.create');
            Route::post('/', [ProductController::class, 'store'])->name('admin.products.store');
            Route::get('/form-edit/{id}', [ProductController::class, 'formEdit'])->name('admin.products.formEdit');
            Route::put('/{id}', [ProductController::class, 'update'])->name('admin.products.update');
            Route::delete('/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
        });
    
        // Order Management
        Route::prefix('orders')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('admin.orders.index');
            Route::get('/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
            Route::put('/{id}', [OrderController::class, 'update'])->name('admin.orders.update');
            Route::delete('/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
        });
    
        // User Management
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
            Route::get('/{id}', [UserController::class, 'show'])->name('admin.users.show');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
        });
    });
});
