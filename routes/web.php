<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use  App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});
Route::controller(userController::class)->prefix('user')->name('user.')->group(function(){
    Route::view('registerform', 'user.register')->name('viewRegister');
    Route::post('refister', 'register')->name('register');
    Route::view('loginform', 'user.login')->name('viewLogin');
    Route::post('login', 'login')->name('login');
    Route::get('logout', 'logout')->name('logout');
});

Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function(){
    Route::view('register', 'admin.register')->name('viewRegister');
    Route::post('refister', 'register')->name('register');
    Route::view('loginform', 'user.login')->name('viewLogin');
    Route::post('login', 'login')->name('login');
    //Route::middleware('auth:admin')->group(function(){
        Route::get('profile', 'profile')->name('profile');
        Route::get('logout/{id}', 'logout')->name('logout');
    //});
   
});

Route::controller(ProductController::class)->group(function () {
    Route::get('home', 'home')->name('products.home');
    Route::resource('products', ProductController::class);
});

Route::controller(OrderController::class)->prefix('order')->name('order.')->group(function(){
    Route::get('order', 'store')->name('store');
    Route::get('show/{id}', 'showOrders')->name('show');
});
