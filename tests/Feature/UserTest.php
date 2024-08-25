<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_endpoint(): void
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

    public function test_logout_endpoint(): void
    {
        // preparation
        $user = User::factory()->create();
        $this->actingAs($user);

        // action
        $response = $this->postJson('/api/v1/logout');

        // assertion
        $response->assertStatus(200);
    }

    public function test_get_user_endpoint(): void
    {
        // preparation
        $user = User::factory()->create();
        $this->actingAs($user);

        // action
        $response = $this->getJson('/api/v1/user');

        // assertion
        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ]
            ]);
    }
}
