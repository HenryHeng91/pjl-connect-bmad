<?php

namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;
use App\Services\BookingService;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function __invoke(BookingService $bookingService)
    {
        $update = Telegram::getWebhookUpdate();

        $bookingService->createBookingFromTelegram($update);

        return response()->json(['status' => 'ok']);
    }
}
