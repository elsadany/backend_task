<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(User::all() as $user){
 
            $user->notes()->create([
                'folder_id' => $user->folders()->first()->id,
                'user_id' => $user->id,
                'name' => fake()->name(),
                'type' => 'text',
                'content' => fake()->paragraph,
                'is_shared' => rand(0, 1)
            ]);
        }
    }
}
