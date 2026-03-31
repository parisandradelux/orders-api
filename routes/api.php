<?php

use App\Http\Controllers\ApiOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('orders')->group(function () {
    Route::post('/',    [ApiOrderController::class, 'store']);
    Route::get('/',     [ApiOrderController::class, 'index']);
    Route::get('/{id}', [ApiOrderController::class, 'show']);
});