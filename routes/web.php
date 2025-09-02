<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\TelegramLoginController;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [TelegramLoginController::class, 'showLoginPage'])->name('login');
Route::get('/login/telegram/callback', [TelegramLoginController::class, 'handleTelegramCallback']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
