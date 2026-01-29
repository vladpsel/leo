<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::post('login', [\App\Http\Controllers\SecurityController::class, 'login'])->name('login');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });
});
//Route::post('auth', [\App\Http\Controllers\SecurityController::class, 'auth'])->name('auth');
