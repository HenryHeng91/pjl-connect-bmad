<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\TelegramLoginController;
use App\Http\Controllers\CarrierController;
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

Route::middleware(['auth', 'manager'])->group(function () {
    Route::resource('carriers', CarrierController::class)->only([
        'index',
        'store',
        'update',
        'destroy',
    ]);
});
