<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use  App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('home');
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
    Route::view('loginform', 'admin.login')->name('viewLogin');
    Route::post('login', 'login')->name('login');
    Route::middleware('auth:admin')->group(function(){
        Route::get('profile', 'profile')->name('profile');
        Route::get('logout/{id}', 'logout')->name('logout');
    });
   
});

Route::controller(ProductController::class)->group(function () {
    Route::middleware('auth')->name('products.')->group(function(){
        Route::get('home', 'home')->name('home')->middleware('auth');
        Route::get('/orders/{user}/{product}', 'showOrder')->name('showOrder')->middleware('auth');
        Route::get('cart/{id}', 'productCart')->name('cart');
        Route::post('remove/{id}', 'cartRemove')->name('cartRemove');
    });
   

    Route::resource('products', ProductController::class)->middleware('auth:admin');

});

Route::controller(OrderController::class)->prefix('order')->name('order.')->group(function(){
    Route::get('orders', 'orders')->name('orders')->middleware('auth:admin');
    Route::post('order', 'store')->name('store');
    Route::post('remove/{id}',  'removeOrder')->name('remove');

    Route::get('show/{id}', 'showOrders')->name('show')->middleware('auth');

});


Route::get('session', function(){
    $name = Session::put('name', 'afseer');
    Session::push('age', 24);

    if(session()->has('age'))
    {
        dd(Session::get('age'));
        
    }
    return 'no name';
});