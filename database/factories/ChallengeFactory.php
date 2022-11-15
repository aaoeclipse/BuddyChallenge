<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Challenge>
 */
class ChallengeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'starting_date' => fake()->date(),
            'ending_date' => fake()->date(),
            'title' => fake()->name(),
            'description' => fake()->text(),
            // 'owner_id' => User::class::factory(),
        ];
    }
}
