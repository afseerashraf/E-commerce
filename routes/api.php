<?php

use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('user', [UserController::class, 'Login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('users', [UserController::class, 'Users']);
    Route::put('edit', [UserController::class, 'edit']);
    Route::post('logout', [UserController::class, 'logOut']);
});