<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FolderTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_create_folder()
    {
        $user = User::factory()->create();
        

        $response = $this->actingAs($user)->postJson('/api/folders', [
            'name' => 'Test Note',
            
        ]);

        $response->assertStatus(200);
    }
}
