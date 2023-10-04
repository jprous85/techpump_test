<?php

use Src\Cart\Infrastructure\Cart\Controllers\CartDeleteController;
use Src\Cart\Infrastructure\Cart\Controllers\CartGetController;
use Src\Cart\Infrastructure\Cart\Controllers\CartPostController;
use Src\Cart\Infrastructure\Cart\Controllers\CartPutController;

Route::get('/read', [CartGetController::class, 'read']);
Route::get('/{id}/show', [CartGetController::class, 'show']);
Route::post('/create', [CartPostController::class, 'create']);
Route::put('/{id}/update', [CartPutController::class, 'update']);
Route::delete('/{id}/delete', [CartDeleteController::class, 'delete']);