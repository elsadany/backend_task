<?php

namespace Tests\Feature;

use App\Models\Folder;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NoteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_create_note()
    {
        $user = User::factory()->create();
        $folder = $user->folders()->create(['name' => fake()->name()]);

        $response = $this->actingAs($user)->postJson('/api/notes', [
            'folder_id' => $folder->id,
            'name' => 'Test Note',
            'type' => 'text',
            'content' => 'This is a test note.',
            'is_shared' => false,
        ]);

        $response->assertStatus(200);
    }
    public function test_unauthenticated_user_cannot_create_note()
    {
        $response = $this->postJson('/api/notes', [
            'folder_id' => 1,
            'name' => 'Test Note',
            'type' => 'text',
            'content' => 'This is a test note.',
            'is_shared' => false,
        ]);

        $response->assertStatus(401);
    }
}
