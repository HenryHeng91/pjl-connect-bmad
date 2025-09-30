<?php

namespace Database\Factories;

use App\Models\Carrier;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarrierServiceCost>
 */
class CarrierServiceCostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_id' => Service::factory(),
            'carrier_id' => Carrier::factory(),
            'cost' => $this->faker->randomFloat(2, 5, 50),
        ];
    }
}
