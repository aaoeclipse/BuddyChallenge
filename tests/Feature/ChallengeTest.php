<?php

namespace Tests\Feature;

use App\Models\Challenge;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChallengeTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

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
        $user = User::where('email', 'santiago.paiz@gmail.com')->first();

        $response = $this->actingAs($user)->get('/challenge');

        $response->assertSee('Starting');
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

        $response = $this->actingAs($user)->post('/challenge', ['name' => 'Sally']);

        $response->assertStatus(201);
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
