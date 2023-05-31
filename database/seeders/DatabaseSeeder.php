<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Test user 1
        User::factory()->create([
            'name' => 'lars@avocado-media.nl',
            'email' => 'lars@avocado-media.nl',
            'password' => bcrypt('password')
        ]);

        // Test user 2
        User::factory()->create([
            'name' => 'sjors@avocado-media.nl',
            'email' => 'sjors@avocado-media.nl',
            'password' => bcrypt('password')
        ]);
    }
}
