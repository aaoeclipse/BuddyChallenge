<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Workout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WorkoutTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
        $this->user = User::where('email', 'santiago.paiz@gmail.com')->first();
    }

    public function test_get_all_workouts()
    {
        $response = $this->actingAs($this->user)->get('/workout');

        $response->assertSee('id');
    }

    public function test_get_specific_workout()
    {
        $workout = $this->user->workouts->first();

        $response = $this->actingAs($this->user)->get('/workout/'.$workout['id']);

        $response->assertStatus(200);
    }

    public function test_user_create_workout()
    {
        $workout = new Workout();

        $workout->owner_id = $this->user->id;
        $workout->name = 'new Workout';
        $workout->num_set = 3;
        $workout->repetitions = 10;
        $workout->type = 'strength';

        $response = $this->actingAs($this->user)->post('/workout', [
            'name' => $workout->name,
            'num_set' => $workout->num_set,
            'repetitions' => $workout->repetitions,
            'type' => $workout->type,
            'owner_id' => $workout->owner_id,
        ]);
        // Check status code success
        $response->assertStatus(302);
        // Make sure the workout was created in the db
        $this->assertDatabaseHas('workouts', [
            'owner_id' => $workout->owner_id,
            'name' => $workout->name,
            'num_set' => $workout->num_set,
        ]);
    }

    public function test_update_workout()
    {
        $workout = $this->user->workouts->first();
        $response = $this->actingAs($this->user)->put('/workout/'.$workout->id, [
            'name' => 'new name!!',
            'num_set' => $workout->num_set,
            'repetitions' => $workout->repetitions,
            'type' => $workout->type,
        ]);
        $this->assertDatabaseHas('workouts', [
            'id' => $workout->id,
            'name' => 'new name!!',
        ]);
    }

    public function test_delete_challenge()
    {
        $workout = $this->user->workouts->first();
        $this->assertDatabaseHas('workouts', ['id' => $workout->id]);

        $this->actingAs($this->user)->delete('/workout/'.$workout['id']);
        $this->assertDatabaseMissing('workouts', ['id' => $workout->id]);
    }
}
