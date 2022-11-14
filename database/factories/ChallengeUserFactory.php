<?php

namespace Database\Factories;

use App\Models\Challenge;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChallengeUser>
 */
class ChallengeUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::class::factory(),
            'challenge_id' => Challenge::class::factory(),
            'points' => fake()->randomDigit(),
            'accepted' => fake()->boolean(),
        ];
    }
}
