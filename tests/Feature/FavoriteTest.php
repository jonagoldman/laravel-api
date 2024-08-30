<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class FavoriteTest extends TestCase
{
    use RefreshDatabase;

    public function test_favorites_schema(): void
    {
        $this->assertTrue(
            Schema::hasColumns('favorites', [
                'id',
                'gif_id',
                'user_id',
                'alias',
            ]),
            1
        );
    }

    public function test_favorites_endpoint(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // action
        $response = $this->postJson('/api/v1/user/favorites', [
            'gif_id' => 'l3vR27h9mvQ7HNdgA',
            'alias' => 'my favorite',
        ]);

        // assertion
        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'gif_id' => 'l3vR27h9mvQ7HNdgA',
                    'user_id' => $user->id,
                    'alias' => 'my favorite',
                ]
            ]);
    }
}
