<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Company;
use App\Models\Shipment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Mockery;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Objects\File;
use Telegram\Bot\Objects\Update;
use Tests\TestCase;

class TelegramWebhookTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_rejects_invalid_webhook_secret()
    {
        $response = $this->postJson('/webhooks/telegram/invalid-secret');

        $response->assertStatus(403);
    }

    public function test_it_processes_valid_webhook_and_creates_booking()
    {
        Storage::fake('local');
        Http::fake([
            'api.telegram.org/*' => Http::response('test file content', 200),
        ]);

        $update = new Update([
            'update_id' => 123456789,
            'message' => [
                'message_id' => 98765,
                'from' => [
                    'id' => 12345,
                    'is_bot' => false,
                    'first_name' => 'Test',
                    'last_name' => 'User',
                    'username' => 'testuser',
                ],
                'chat' => [
                    'id' => 12345,
                    'first_name' => 'Test',
                    'last_name' => 'User',
                    'username' => 'testuser',
                    'type' => 'private',
                ],
                'date' => time(),
                'document' => [
                    'file_name' => 'test.pdf',
                    'mime_type' => 'application/pdf',
                    'file_id' => 'abcdefg',
                    'file_unique_id' => 'hijklmn',
                    'file_size' => 1024,
                ],
            ],
        ]);

        $apiMock = Mockery::mock(Api::class);
        $apiMock->shouldReceive('getWebhookUpdate')->andReturn($update);
        $apiMock->shouldReceive('getFile')->with(['file_id' => 'abcdefg'])->andReturn(new File(['file_path' => 'documents/test.pdf']));

        Telegram::swap($apiMock);

        $secret = env('TELEGRAM_WEBHOOK_SECRET');
        $response = $this->postJson("/webhooks/telegram/{$secret}", $update->toArray());

        $response->assertStatus(200);

        $this->assertDatabaseHas('companies', ['telegram_user_id' => 12345]);
        $this->assertDatabaseHas('bookings', ['telegram_user_id' => 12345]);
        $this->assertDatabaseHas('shipments', ['status' => 'New']);

        $shipment = Shipment::first();
        Storage::disk('local')->assertExists($shipment->file_path);
        $this->assertEquals('test file content', Storage::disk('local')->get($shipment->file_path));
    }
}
