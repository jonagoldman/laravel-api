<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\Http;

class GifTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Http::preventStrayRequests();
        Http::fake();

        // preparation
        $this->actingAs(User::factory()->create());
    }

    public function test_get_endpoint(): void
    {
        // action
        $response = $this->getJson('/api/v1/gifs/l3vR27h9mvQ7HNdgA');

        // assertion
        $response->assertStatus(200);
    }

    public function test_search_endpoint(): void
    {
        // action
        $response = $this->postJson('/api/v1/gifs/search?query=test');

        // assertion
        $response->assertStatus(200);
    }
}
