<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Company;
use App\Models\Shipment;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Objects\Update;

class BookingService
{
    public function createBookingFromTelegram(Update $update): Booking
    {
        $telegramUser = $update->getMessage()->getFrom();
        $document = $update->getMessage()->getDocument();

        // Create a company for the user if it doesn't exist
        $company = Company::firstOrCreate(
            ['telegram_user_id' => $telegramUser->getId()],
            ['company_name' => $telegramUser->getFirstName() . ' ' . $telegramUser->getLastName()]
        );

        // Create a new booking
        $booking = Booking::create([
            'booking_reference' => 'B' . time(), // Simple unique reference
            'company_id' => $company->id,
            'status' => 'New',
            'booking_date' => now(),
            'telegram_user_id' => $telegramUser->getId(),
        ]);

        // Create a new shipment
        $shipment = Shipment::create([
            'booking_id' => $booking->id,
            'status' => 'New',
            'transport_mode' => 'Land', // Default to Land, can be changed later
        ]);

        // Store the file
        $file = Telegram::getFile(['file_id' => $document->getFileId()]);
        $fileUrl = 'https://api.telegram.org/file/bot' . env('PJL_BOOKING_TELEGRAM_BOT_TOKEN') . '/' . $file->getFilePath();
        $fileContents = Http::get($fileUrl)->body();
        $fileName = $document->getFileName();
        $path = 'bookings/' . $booking->id . '/' . $fileName;
        Storage::disk('local')->put($path, $fileContents);

        // Associate the file with the shipment
        $shipment->update(['file_path' => $path]);

        return $booking;
    }
}
