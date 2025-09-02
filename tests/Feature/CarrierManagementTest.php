<?php

namespace Tests\Feature;

use App\Models\Carrier;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CarrierManagementTest extends TestCase
{
    use RefreshDatabase;

    private function manager(): User
    {
        return User::factory()->create(['role' => 'Manager']);
    }

    public function test_only_manager_can_access_carriers_index(): void
    {
        $manager = $this->manager();
        $response = $this->actingAs($manager)->get('/carriers');
        $response->assertStatus(200);

        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/carriers');
        $response->assertStatus(403);
    }

    public function test_manager_can_create_carrier(): void
    {
        $manager = $this->manager();
        $response = $this->actingAs($manager)->post('/carriers', [
            'company_name' => 'Acme Logistics',
            'contact_person' => 'John Doe',
            'phone_number' => '123456789',
            'email' => 'carrier@example.com',
            'cost_details' => 'Details',
        ]);
        $response->assertRedirect('/carriers');
        $this->assertDatabaseHas('carriers', ['company_name' => 'Acme Logistics']);
    }

    public function test_manager_can_update_carrier(): void
    {
        $manager = $this->manager();
        $carrier = Carrier::create(['company_name' => 'Old', 'contact_person' => null]);
        $response = $this->actingAs($manager)->put("/carriers/{$carrier->id}", [
            'company_name' => 'New Name',
        ]);
        $response->assertRedirect('/carriers');
        $this->assertDatabaseHas('carriers', ['id' => $carrier->id, 'company_name' => 'New Name']);
    }

    public function test_manager_can_delete_carrier(): void
    {
        $manager = $this->manager();
        $carrier = Carrier::create(['company_name' => 'Temp', 'contact_person' => null]);
        $response = $this->actingAs($manager)->delete("/carriers/{$carrier->id}");
        $response->assertRedirect('/carriers');
        $this->assertDatabaseMissing('carriers', ['id' => $carrier->id]);
    }
}
