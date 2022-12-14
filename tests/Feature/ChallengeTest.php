<?php

namespace Tests\Feature;

use App\Models\Challenge;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChallengeTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
        $this->user = User::where('email', 'santiago.paiz@gmail.com')->first();
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
        $response = $this->actingAs($this->user)->get('/challenge');

        $response->assertSee('Starting');
    }

    public function test_get_specific_challenges()
    {
        $challenge = $this->user->own_challenges->first();

        $response = $this->actingAs($this->user)->get('/challenge/'.$challenge['id']);

        $response->assertStatus(200);
    }

    public function test_user_create_challenge()
    {
        $challenge = new Challenge();
        $challenge->starting_date = now();
        $challenge->ending_date = now()->addDay();
        $challenge->title = 'New Title';
        $challenge->description = 'New Description';
        $challenge->owner_id = $this->user->id;

        $response = $this->actingAs($this->user)->post('/challenge', [
            'title' => $challenge->title,
            'description' => $challenge->description,
            'starting_date' => $challenge->starting_date,
            'ending_date' => $challenge->ending_date,

        ]);
        // Make sure it redirects
        $response->assertStatus(302);
        // Make sure the challenge was created in the db
        $this->assertDatabaseHas('challenges', ['title' => 'New Title']);
        // Make sure the challenge_user was correctly created
        $challenge = Challenge::where('title', 'New Title')->first();
        $this->assertDatabaseHas('challenge_user', ['user_id' => $this->user->id, 'challenge_id' => $challenge->id]);
    }

    public function test_update_challenge()
    {
        $challenge = $this->user->own_challenges->first();
        $response = $this->actingAs($this->user)->put('/challenge/'.$challenge->id, [
            'title' => 'New New title',
            'description' => $challenge->description,
            'starting_date' => $challenge->starting_date,
            'ending_date' => $challenge->ending_date,
        ]);
        $this->assertDatabaseHas('challenges', ['title' => 'New New title']);
    }

    public function test_delete_challenge()
    {
        $challenge = $this->user->own_challenges->first();
        $this->assertDatabaseHas('challenges', ['id' => $challenge->id]);

        $this->actingAs($this->user)->delete('/challenge/'.$challenge['id']);
        $this->assertDatabaseMissing('challenges', ['id' => $challenge->id]);
    }
}
