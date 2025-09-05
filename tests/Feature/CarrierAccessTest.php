<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Carrier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia;

class CarrierAccessTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Ensure migrations are run for tests
        $this->artisan('migrate');
    }

    public function test_non_manager_cannot_access_carriers_index(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $response = $this->actingAs($user)->get('/carriers');
        $response->assertStatus(403); // Forbidden
    }

    public function test_manager_can_access_carriers_index(): void
    {
        $user = User::factory()->create(['role' => 'manager']);
        $response = $this->actingAs($user)->get('/carriers');
        $response->assertStatus(200); // OK
    }

    public function test_guest_cannot_access_carriers_index(): void
    {
        $response = $this->get('/carriers');
        $response->assertRedirect('/login'); // Redirect to login
    }

    public function test_manager_can_view_carriers_list(): void
    {
        $user = User::factory()->create(['role' => 'manager']);
        $carriers = Carrier::factory()->count(3)->create();

        $response = $this->actingAs($user)->get('/carriers');

        $response->assertInertia(fn (AssertableInertia $page) => $page
            ->component('Carriers/Index')
            ->has('carriers', 3)
            ->has('carriers.0', fn ($page) => $page
                ->where('company_name', $carriers->first()->company_name)
                ->etc()
            )
        );
    }
}
