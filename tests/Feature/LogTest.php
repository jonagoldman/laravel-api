<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;

class LogTest extends TestCase
{
    use RefreshDatabase;

    public function test_favorites_schema(): void
    {
        $this->assertTrue(
            Schema::hasColumns('logs', [
                'id',
                'user_id',
                'ip',
                'url',
                'method',
                'request',
                'response',
            ]),
            1
        );
    }
}
