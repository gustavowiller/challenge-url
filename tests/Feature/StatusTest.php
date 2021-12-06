<?php

namespace Tests\Feature;

use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_status_screen_can_be_rendered()
    {
        $this->authenticate_user();

        $response = $this->get('/status/create');
        $response->assertStatus(200);
    }

    public function test_dont_allow_unauthenticated_open_create_status()
    {
        $response = $this->get('/status/create');
        $response->assertRedirect('/login');
    }

    public function test_a_status_view_can_be_rendered()
    {
        $view = $this->withViewErrors([])->view('status.create');

        $view->assertSee('Novo Status');
        $view->assertSee('Url');
        $view->assertSee('Salvar');
    }

    public function test_post_create_status()
    {
        $this->authenticate_user();

        $status = [
            "url" => "http://www.google.com"
        ];

        $this->assertSame(0, Status::count());
        $response = $this->post('/status', $status);

        $this->assertSame(1, Status::count());
        $response->assertRedirect('/status');
    }

    public function test_post_create_status_with_invalid_url()
    {
        $this->authenticate_user();

        $status = [
            "url" => "asdf"
        ];

        $response = $this->post('/status', $status);
        $response->assertRedirect('/');
    }

    public function test_get_all_status()
    {
        $this->authenticate_user();

        $response = $this->get('/status');
        $response->assertOk();
    }

    protected function authenticate_user()
    {
        $user = User::factory()->create();
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->assertAuthenticated();
    }
}
