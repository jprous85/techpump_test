<?php

use Src\Product\Infrastructure\Controllers\ProductDeleteController;
use Src\Product\Infrastructure\Controllers\ProductGetController;
use Src\Product\Infrastructure\Controllers\ProductPostController;
use Src\Product\Infrastructure\Controllers\ProductPutController;

Route::get('/read', [ProductGetController::class, 'read']);
Route::get('/{id}/show', [ProductGetController::class, 'show']);
Route::post('/create', [ProductPostController::class, 'create']);
Route::put('/{id}/update', [ProductPutController::class, 'update']);
Route::delete('/{id}/delete', [ProductDeleteController::class, 'delete']);
