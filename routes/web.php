<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'homepage')->name('home');

Route::get('/test', [TestController::class, 'test'])->name('test');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
