<?php

use App\Http\Controllers\Api\v1\ServerApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    // Servers
    Route::prefix('server')->group(function () {
        Route::get('/', [ServerApiController::class, 'index']);
        Route::post('/', [ServerApiController::class, 'store']);
    });

});
