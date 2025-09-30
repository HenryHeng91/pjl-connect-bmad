<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Webhooks\TelegramController;

Route::post('/telegram/{secret}', TelegramController::class)->middleware('telegram.secret')->name('webhook.telegram');
