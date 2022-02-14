<?php

namespace Database\Factories;

use App\Models\Building;
use Illuminate\Database\Eloquent\Factories\Factory;

class CabinetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number_cabinet' => $this->faker->buildingNumber(),
            'description' => $this->faker->title(),
            'status' => $this->faker->boolean(),
            'building_id' => Building::factory()
        ];
    }
}
