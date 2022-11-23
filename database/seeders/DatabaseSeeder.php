<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Challenge;
use App\Models\ChallengeUser;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $posts = Challenge::factory()
            ->count(3)
            ->for(User::factory()->state([
                'name' => 'Santiago Paiz',
                'email' => 'santiago.paiz@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$XFuN.Xu71tK4fDhzwWoIT.tO71JaoawXcSXe5VyO6KAvigzAsEMRi',
                'remember_token' => null,
            ]), 'owner')
            ->create();

        User::factory()->state([
            'name' => 'Santiago Paiz',
            'email' => 'santiago.paiz+2@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$XFuN.Xu71tK4fDhzwWoIT.tO71JaoawXcSXe5VyO6KAvigzAsEMRi',
            'remember_token' => null,
        ])->create();
        $user = User::where(['email' => 'santiago.paiz@gmail.com'])->first();

        ChallengeUser::factory()->state([
            'user_id' => $user->id,
            'challenge_id' => $posts->first()->id,
        ])->create();
        ChallengeUser::factory()->state([
            'user_id' => $user->id,
            'challenge_id' => $posts->get(1)->id,
        ])->create();
        ChallengeUser::factory()->state([
            'user_id' => $user->id,
            'challenge_id' => $posts->get(2)->id,
        ])->create();

        ChallengeUser::factory(10)->create();

        Workout::factory()->state([
            'owner_id' => $user->id,
        ])->create();
        Workout::factory()->state([
            'owner_id' => $user->id,
        ])->create();
        Workout::factory()->state([
            'owner_id' => $user->id,
        ])->create();
    }
}
