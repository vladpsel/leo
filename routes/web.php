<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PageController::class, 'home'])->name('home');
Route::post('login', [\App\Http\Controllers\SecurityController::class, 'login'])->name('login');
Route::get('logout', [\App\Http\Controllers\SecurityController::class, 'logout'])->name('logout');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('servers', [PageController::class, 'servers'])->name('servers');
});
