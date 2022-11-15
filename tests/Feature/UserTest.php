<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_form()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_it_stores_new_user()
    {
        $response = $this->post('/register', [
            'name' => 'Rick Sanchez',
            'email' => 'ricksanchez@gmail.com',
            'password' => 'pass123!This',
            'password_confirmation' => 'pass123!This',
        ]);

        $response->assertRedirect('/home');
    }

    public function test_delete_user()
    {
        $user = User::where('name', 'Rick Sanchez')->first();

        if ($user) {
            $user->delete();
            $this->assertTrue(true);
        }

        $this->assertDatabaseMissing('users', ['name' => 'Rick Sanchez']);
    }
}
