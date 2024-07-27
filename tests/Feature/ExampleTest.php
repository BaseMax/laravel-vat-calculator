<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_home_page_redirect_to(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302)->assertRedirect('/login');
    }

    public function test_login(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);

        $response = $this->get('/login/');

        $response->assertStatus(200);
    }

    public function test_dashboard_without_token(): void
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(302)->assertRedirect('/login');
    }

    public function test_login_with_random_user(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('password'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'.rand(1000, 9999),
        ]);

        $response->assertStatus(302)->assertRedirect('/');

        $response = $this->get('/dashboard');

        $response->assertStatus(302)->assertRedirect('/login');
    }

    public function test_login_with_a_user(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('password'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(302)->assertRedirect('/dashboard');

        $this->assertAuthenticatedAs($user);

        $response = $this->get('/users');
        $response->assertStatus(200);

        $response = $this->get('/requests');
        $response->assertStatus(200);

        $response = $this->get('/profile');
        $response->assertStatus(200);

        $response = $this->post('/logout');
        $response->assertStatus(302)->assertRedirect('/');

        $response = $this->get('/profile');
        $response->assertStatus(302)->assertRedirect('/login');
    }
}
