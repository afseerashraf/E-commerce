<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;


Route::get('/', function () {
    return view('welcome');
});
Route::controller(userController::class)->prefix('user')->name('user.')->group(function(){
    Route::view('registerform', 'user.register')->name('viewRegister');
    Route::post('refister', 'register')->name('register');
    Route::view('loginform', 'user.login')->name('viewLogin');
    Route::post('login', 'login')->name('login');
});

Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function(){
    Route::view('register', 'admin.register')->name('viewRegister');
    Route::post('refister', 'register')->name('register');
    Route::view('loginform', 'user.login')->name('viewLogin');
    Route::post('login', 'login')->name('login');
    Route::get('logout/{id}', 'logout')->name('logout');
});

Route::resource('products', ProductController::class);

