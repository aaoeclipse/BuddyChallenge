<?php

namespace Tests\Feature;

use App\Models\Routine;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoutineTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    private $workout;

    private $challenge;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
        $this->user = User::where('email', 'santiago.paiz@gmail.com')->first();
        $this->challenge = $this->user->own_challenges->first();
        $this->workout = $this->user->workouts->first();
    }

    public function test_user_create_routine()
    {
        $routine = new Routine();

        $routine->workout_id = $this->workout->id;
        $routine->challenge_id = $this->challenge->id;
        $routine->day_of_week = 1;

        $response = $this->actingAs($this->user)->post('/routine', [
            'workout_id' => $routine->workout_id,
            'challenge_id' => $routine->challenge_id,
            'day_of_week' => $routine->day_of_week,

        ]);
        // Make sure it redirects
        $response->assertStatus(302);
        // Make sure the routine was created in the db
        $this->assertDatabaseHas('routines', [
            'workout_id' => $routine->workout_id,
            'user_id' => $this->user->id,
            'challenge_id' => $routine->challenge_id,
            'day_of_week' => $routine->day_of_week,
        ]);
    }

    public function test_get_all_routines()
    {
        $response = $this->actingAs($this->user)->get('/routine/');

        $response->assertSee('id');
    }

    public function test_get_specific_routines()
    {
        $routine = new Routine();
        $routine->user_id = $this->user->id;
        $routine->workout_id = $this->workout->id;
        $routine->challenge_id = $this->challenge->id;
        $routine->day_of_week = 1;
        $routine->save();

        $routine = $this->user->routines->first();

        $response = $this->actingAs($this->user)->get('/routine/'.$routine['id']);

        $response->assertStatus(200);
    }

    public function test_update_routine()
    {
        $routine = new Routine();
        $routine->user_id = $this->user->id;
        $routine->workout_id = $this->workout->id;
        $routine->challenge_id = $this->challenge->id;
        $routine->day_of_week = 1;
        $routine->save();

        $routine = $this->user->routines->first();
        $response = $this->actingAs($this->user)->put('/routine/'.$routine->id, [
            'day_of_week' => 2,
        ]);
        $this->assertDatabaseHas('routines', [
            'user_id' => $routine->user_id,
            'workout_id' => $routine->workout_id,
            'challenge_id' => $routine->challenge_id,
            'day_of_week' => 2,
        ]);
    }

    public function test_delete_routine()
    {
        $routine = new Routine();
        $routine->user_id = $this->user->id;
        $routine->workout_id = $this->workout->id;
        $routine->challenge_id = $this->challenge->id;
        $routine->day_of_week = 1;
        $routine->save();

        $routine = $this->user->routines->first();
        $this->assertDatabaseHas('routines', ['id' => $routine->id]);

        $this->actingAs($this->user)->delete('/routine/'.$routine['id']);
        $this->assertDatabaseMissing('routines', ['id' => $routine->id]);
    }
}
