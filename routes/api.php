<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    // Servers
    Route::prefix('servers')->group(function () {
        Route::post('/', 'ServerApiController@store');
    });

});
