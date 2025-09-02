<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Inertia\Inertia;

class TelegramLoginController extends Controller
{
    public function showLoginPage()
    {
        return Inertia::render('Auth/Login');
    }

    public function handleTelegramCallback(Request $request)
    {
        if ($request->has('error')) {
            return redirect()->route('login')->withErrors(['telegram' => 'Authentication failed. Please try again.']);
        }

        $data = $request->all();

        if (!$this->isValidTelegramHash($data)) {
            return redirect()->route('login')->withErrors(['telegram' => 'Invalid authentication data.']);
        }

        $user = User::updateOrCreate(
            ['telegram_id' => $data['id']],
            [
                'name' => $data['first_name'] . (isset($data['last_name']) ? ' ' . $data['last_name'] : ''),
                'username' => $data['username'] ?? null,
            ]
        );

        Auth::login($user);

        return redirect('/dashboard');
    }

    private function isValidTelegramHash(array $data): bool
    {
        $hash = $data['hash'];
        unset($data['hash']);

        $data_check_arr = [];
        foreach ($data as $key => $value) {
            $data_check_arr[] = $key . '=' . $value;
        }
        sort($data_check_arr);
        $data_check_string = implode('\n', $data_check_arr);

        $secret_key = hash('sha256', config('services.telegram-bot-api.token'), true);
        $calculated_hash = hash_hmac('sha256', $data_check_string, $secret_key);

        return $calculated_hash === $hash;
    }
}
