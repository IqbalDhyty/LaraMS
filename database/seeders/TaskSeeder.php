<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        // Task student id = 2 untuk assignment id = 1
        Task::create([
            'user_id' => 2, // student
            'assigment_id' => 1, // perhatikan: "assigment_id" bukan "assignment_id"
            'file_path' => 'uploads/tasks/task1_budi.pdf',
            'score' => 85,
        ]);

        // Task student id = 3 untuk assignment id = 1
        Task::create([
            'user_id' => 3,
            'assigment_id' => 1,
            'file_path' => 'uploads/tasks/task1_rizky.pdf',
            'score' => 90,
        ]);

        // Task student id = 4 untuk assignment id = 2
        Task::create([
            'user_id' => 4,
            'assigment_id' => 2,
            'file_path' => 'uploads/tasks/task2_lina.pdf',
            'score' => 88,
        ]);
    }
}
