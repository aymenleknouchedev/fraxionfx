<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       

        // Create a test user for login
        User::factory()->create([
            'name' => 'fraxionfx',
            'email' => 'admin@fraxionfx.com',
            'password' => bcrypt('V9!qR2@Lx7#MZ4aP'),
        ]);
    }
}
