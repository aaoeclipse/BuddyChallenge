<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Challenge;
use App\Models\ChallengeUser;
use App\Models\User;
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
        // User::factory()->make([
        //     'name' => 'Santiago Paiz',
        //     'email' => 'santiago.paiz@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$XFuN.Xu71tK4fDhzwWoIT.tO71JaoawXcSXe5VyO6KAvigzAsEMRi',
        //     'remember_token' => null,
        // ])->save();
        // User::factory()->make(
        //     [
        // 'name' => 'Santiago Paiz',
        // 'email' => 'santiago.paiz@gmail.com',
        // 'email_verified_at' => now(),
        // 'password' => '$2y$10$XFuN.Xu71tK4fDhzwWoIT.tO71JaoawXcSXe5VyO6KAvigzAsEMRi',
        // 'remember_token' => null,
        //     ]
        // )->has(Challenge::factory()->count(3), 'own_challenges');

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
        // ChallengeUser::factory(10)->create();
    }
}
