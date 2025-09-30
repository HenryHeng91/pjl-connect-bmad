<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Service;
use App\Models\Carrier;
use App\Models\CarrierServiceCost;

class ServiceManagementTest extends TestCase
{
    use RefreshDatabase;

    private $manager;
    private $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->manager = User::factory()->create(['role' => 'Manager']);
        $this->user = User::factory()->create(['role' => 'User']);
    }

    public function test_non_manager_cannot_access_services_index()
    {
        $response = $this->actingAs($this->user)->get('/services');
        $response->assertStatus(403);
    }

    public function test_manager_can_access_services_index()
    {
        Service::factory()->create(['name' => 'Test Service']);

        $response = $this->actingAs($this->manager)->get('/services');

        $response->assertStatus(200);
        $response->assertInertia(fn ($assert) => $assert
            ->component('Services/Index')
            ->has('services', 1)
            ->where('services.0.name', 'Test Service')
        );
    }

    public function test_manager_can_create_service()
    {
        $carrier = Carrier::factory()->create();
        $serviceData = [
            'name' => 'New Service',
            'description' => 'A new service',
            'price' => 100,
            'carrier_costs' => [
                ['carrier_id' => $carrier->id, 'cost' => 50]
            ]
        ];

        $response = $this->actingAs($this->manager)->post('/services', $serviceData);

        $response->assertRedirect('/services');
        $this->assertDatabaseHas('services', ['name' => 'New Service']);
        $this->assertDatabaseHas('carrier_service_costs', ['cost' => 50]);
    }

    public function test_manager_can_update_service()
    {
        $service = Service::factory()->create();
        $carrier = Carrier::factory()->create();
        $carrierCost = CarrierServiceCost::factory()->create([
            'service_id' => $service->id,
            'carrier_id' => $carrier->id,
            'cost' => 50
        ]);

        $updateData = [
            'name' => 'Updated Service Name',
            'description' => $service->description,
            'price' => 150,
            'carrier_costs' => [
                ['carrier_id' => $carrier->id, 'cost' => 75]
            ]
        ];

        $response = $this->actingAs($this->manager)->put('/services/' . $service->id, $updateData);

        $response->assertRedirect('/services');
        $this->assertDatabaseHas('services', ['id' => $service->id, 'name' => 'Updated Service Name', 'price' => 150]);
        $this->assertDatabaseHas('carrier_service_costs', ['service_id' => $service->id, 'cost' => 75]);
    }

    public function test_manager_can_delete_service()
    {
        $service = Service::factory()->create();

        $response = $this->actingAs($this->manager)->delete('/services/' . $service->id);

        $response->assertRedirect('/services');
        $this->assertDatabaseMissing('services', ['id' => $service->id]);
    }
}
