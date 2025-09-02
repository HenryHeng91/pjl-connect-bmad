<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TelegramLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_login_page_is_displayed(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_a_user_can_login_with_valid_telegram_data(): void
    {
        $data = [
            'id' => 12345,
            'first_name' => 'Test',
            'last_name' => 'User',
            'username' => 'testuser',
            'photo_url' => 'https://t.me/i/userpic/320/testuser.jpg',
            'auth_date' => time(),
        ];

        $data['hash'] = $this->calculateTelegramHash($data);

        $response = $this->get('/login/telegram/callback?' . http_build_query($data));

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['telegram_id' => 12345]);
    }

    public function test_it_returns_an_error_with_invalid_hash(): void
    {
        $data = [
            'id' => 12345,
            'first_name' => 'Test',
            'last_name' => 'User',
            'username' => 'testuser',
            'photo_url' => 'https://t.me/i/userpic/320/testuser.jpg',
            'auth_date' => time(),
            'hash' => 'invalid_hash',
        ];

        $response = $this->get('/login/telegram/callback?' . http_build_query($data));

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('telegram');
        $this->assertGuest();
    }

    public function test_it_returns_an_error_if_user_denies_access(): void
    {
        $response = $this->get('/login/telegram/callback?error=access_denied');

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('telegram');
        $this->assertGuest();
    }

    private function calculateTelegramHash(array $data): string
    {
        $data_check_arr = [];
        foreach ($data as $key => $value) {
            $data_check_arr[] = $key . '=' . $value;
        }
        sort($data_check_arr);
        $data_check_string = implode('\n', $data_check_arr);

        $secret_key = hash('sha256', config('services.telegram-bot-api.token'), true);

        return hash_hmac('sha256', $data_check_string, $secret_key);
    }
}
