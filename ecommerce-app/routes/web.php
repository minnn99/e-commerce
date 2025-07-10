<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/itemlist', [ProductController::class, 'index'])->name('products.index');
Route::get('/item', [ProductController::class, 'show'])->name('item'); // 暫定的なルート
Route::get('/item/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('user.auth');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add')->middleware('user.auth');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove')->middleware('user.auth');

// Purchase completion page (requires user authentication)
Route::get('/paymentcomplete', function () {
    return view('paymentcomplete');
})->name('payment.complete')->middleware('user.auth');

// User Authentication Routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/registration', [UserController::class, 'showRegistrationForm'])->name('user.registration');
Route::post('/registration/confirm', [UserController::class, 'showRegistrationConfirm'])->name('user.registration.confirm');
Route::post('/registration/register', [UserController::class, 'register'])->name('user.register');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

// Registration completion page
Route::get('/registrationconfirm', function () {
    return redirect()->route('user.registration');
});
Route::get('/registrationcomplete', function () {
    return view('registrationcomplete');
})->name('registration.complete');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    
    // All admin routes except login require authentication
    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        
        // 商品管理機能
        Route::get('/itemedit/{id?}', [AdminController::class, 'itemEdit'])->name('admin.item.edit');
        Route::post('/itemedit', [AdminController::class, 'itemStore'])->name('admin.item.store');
        Route::put('/itemedit/{id}', [AdminController::class, 'itemUpdate'])->name('admin.item.update');
        Route::delete('/item/{id}', [AdminController::class, 'itemDelete'])->name('admin.item.delete');
        
        // ユーザー管理機能
        Route::get('/useredit/{id?}', [AdminController::class, 'userEdit'])->name('admin.user.edit');
        Route::post('/useredit', [AdminController::class, 'userStore'])->name('admin.user.store');
        Route::put('/useredit/{id}', [AdminController::class, 'userUpdate'])->name('admin.user.update');
        Route::delete('/user/{id}', [AdminController::class, 'userDelete'])->name('admin.user.delete');
    });
});
