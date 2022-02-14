<?php

namespace Database\Factories;

use App\Models\Cabinet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'cabinet_id' => Cabinet::factory(),
            'time_start' => $this->faker->dateTime(),
            'time_end' => $this->faker->dateTime(),
        ];
    }
}
