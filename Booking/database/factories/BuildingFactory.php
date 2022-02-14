<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class BuildingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->buildingNumber(),
            'address' => $this->faker->address(),
            'lon' => $this->faker->longitude(),
            'lat' => $this->faker->latitude(),
            'city_id' => City::factory(),

        ];
    }
}
