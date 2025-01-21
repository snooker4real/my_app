<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'posts');

Route::resource('posts', PostController::class);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
});

