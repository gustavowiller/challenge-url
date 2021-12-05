<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_status_screen_can_be_rendered()
    {
        $user = User::factory()->create();
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->assertAuthenticated();

        $response = $this->get('/status/create');
        $response->assertStatus(200);
    }

    public function test_dont_allow_unauthenticated_open_create_status()
    {
        $response = $this->get('/status/create');
        $response->assertRedirect('/login');
    }
}
