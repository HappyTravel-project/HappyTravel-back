<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_id' => User::all()->random()->id,
            'title' => $this->faker->sentence(),
            'location' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph(5),

        ];
    }
}
