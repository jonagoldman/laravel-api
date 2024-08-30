<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_schema(): void
    {
        $this->assertTrue(
            Schema::hasColumns('users', [
                'id',
                'name',
                'email',
                'password',
                'remember_token',
                'email_verified_at',
            ]),
            1
        );
    }

    public function test_user_endpoint(): void
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
