<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assigment;

class AssignmentSeeder extends Seeder
{
    public function run(): void
    {
        Assigment::create([
            'user_id' => 1, // teacher
            'title' => 'Tugas 1 - Pengantar Pemrograman',
            'description' => 'Buat program sederhana mengenai loop dan kondisi.',
            'file_path' => null,
        ]);

        Assigment::create([
            'user_id' => 1,
            'title' => 'Tugas 2 - Basis Data',
            'description' => 'Membuat ERD dan migration Laravel.',
            'file_path' => null,
        ]);
    }
}
