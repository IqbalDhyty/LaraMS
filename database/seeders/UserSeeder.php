<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Guru / Admin default
        User::create([
            'name' => 'Admin Guru',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'teacher',
        ]);

        // 10 murid
        User::factory()->count(10)->create([
            'role' => 'student',
        ]);
    }
}
