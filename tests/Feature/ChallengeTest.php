<?php

namespace Tests\Feature;

use App\Models\Challenge;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChallengeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_challenge_request()
    {
        $response = $this->get('/challenge');

        // If not logged in it should redirect
        $response->assertStatus(302);
    }

    public function test_get_all_challenges()
    {
        $challenge = Challenge::factory(2);

        $response = $this->get('/challenge');

        $response->assertStatus(200);
    }

    public function test_get_specific_challenges()
    {
        $challenge = Challenge::factory(1);

        $challenge->save();

        $response = $this->get('/challenge/1');

        $response->assertStatus(200);
    }

    public function test_user_create_challenge()
    {
        $user = User::factory()->create();
        $user = User::find($user->id);

        $response = $this->actingAs($user)->get('/challenge');

        $response->assertStatus(200);
        // $this->assertDatabaseHas('challenges', $response->challenge->id);
    }

    public function test_delete_challenge()
    {
        $challenge = Challenge::where('challenges', ['title' => 'Challenge Test'])->first();

        if ($challenge) {
            $challenge->delete();
            $this->assertTrue(true);
        }

        $this->assertDatabaseMissing('challenges', ['title' => 'Challenge Test']);
    }
}
