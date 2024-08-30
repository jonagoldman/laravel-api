<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_success(): void
    {
        // preparation
        $user = User::factory()->create();

        // action
        $response = $this->postJson('/api/v1/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        // assertion
        $response->assertStatus(200)
            ->assertJson([
                'type' => 'bearer',
                'user_id' => $user->id,
            ]);
    }

    public function test_login_error(): void
    {
        // preparation
        $user = User::factory()->create();

        // action
        $response = $this->postJson('/api/v1/login', [
            'email' => $user->email,
            'password' => 'wrong',
        ]);

        // assertion
        $response->assertStatus(422)
            ->assertJson([
                'message' => 'The provided credentials are incorrect.',
            ]);
    }

    public function test_logout_success(): void
    {
        // preparation
        $user = User::factory()->create();
        $this->actingAs($user);

        // action
        $response = $this->postJson('/api/v1/logout');

        // assertion
        $response->assertStatus(200);
    }

    public function test_logout_error(): void
    {
        // action
        $response = $this->postJson('/api/v1/logout');

        // assertion
        $response->assertStatus(401);
    }
}
