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
            'name' => 'Aymen Leknouche',
            'email' => 'aymenleknouche.dv@gmail.com',
            'password' => bcrypt('annexedrrh//5rm'),
        ]);
    }
}
