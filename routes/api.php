<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('orders')->group(function () {
    Route::post('/',    [OrderController::class, 'store']);
    Route::get('/',     [OrderController::class, 'index']);
    Route::get('/{id}', [OrderController::class, 'show']);
});