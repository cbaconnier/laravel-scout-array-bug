<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class ScoutSearchTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_it_returns_john_doe(): void
    {
        User::factory()->create([
            'name' => 'John Doe',
        ]);

        $response = $this->get('/working');

        $response->assertStatus(200);

        $response->assertSee('John Doe');
    }

    /**
     * A basic test example.
     */
    public function test_it_returns_john_doe_when_using_callback(): void
    {
        User::factory()->create([
            'name' => 'John Doe',
        ]);
        $response = $this->get('/not-working');

        $response->assertStatus(200);

        $response->assertSee('John Doe');
    }
}
