<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([], __DIR__ . '/Auth/Auth.php');

Route::middleware('auth.jwt')->group(function () {
    Route::prefix('/users')->group(__DIR__ . '/User/User.php');
    Route::prefix('/products')->group(__DIR__ . '/Product/Product.php');
});

