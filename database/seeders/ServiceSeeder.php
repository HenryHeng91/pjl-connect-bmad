<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Carrier;
use App\Models\CarrierServiceCost;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a few carriers
        $carrier1 = Carrier::factory()->create(['name' => 'Carrier A']);
        $carrier2 = Carrier::factory()->create(['name' => 'Carrier B']);

        // Create a few services
        $service1 = Service::create([
            'name' => 'Standard Delivery',
            'description' => 'Standard delivery service',
            'price' => 10.00,
        ]);

        $service2 = Service::create([
            'name' => 'Express Delivery',
            'description' => 'Express delivery service',
            'price' => 20.00,
        ]);

        // Create carrier service costs
        CarrierServiceCost::create([
            'service_id' => $service1->id,
            'carrier_id' => $carrier1->id,
            'cost' => 5.00,
        ]);

        CarrierServiceCost::create([
            'service_id' => $service1->id,
            'carrier_id' => $carrier2->id,
            'cost' => 6.00,
        ]);

        CarrierServiceCost::create([
            'service_id' => $service2->id,
            'carrier_id' => $carrier1->id,
            'cost' => 12.00,
        ]);
    }
}
