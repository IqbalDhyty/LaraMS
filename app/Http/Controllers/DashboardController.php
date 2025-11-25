<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Announcement;
use App\Models\Assigment;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'teacher') {

            $submissions = Task::with(['user', 'assigment'])->latest()->get();

            return view('dashboard.teacher', ['submissions' => $submissions]);
        } else {
            // Murid perlu melihat Pengumuman terbaru
            $announcements = Announcement::latest()->get();
            
            // Murid perlu melihat daftar Tugas (Assigment) yang tersedia
            // Menggunakan 'with' untuk eager loading (optimasi query)
            $assignments = Assigment::latest()->get();

            // Kita juga perlu tahu tugas mana yang SUDAH dikerjakan oleh murid ini
            // Agar di tampilan bisa dibedakan mana yang "Belum" dan "Sudah"
            $myTasks = Task::where('user_id', $user->id)->pluck('assigment_id')->toArray();

            return view('dashboard.student', [
                'announcements' => $announcements,
                'assignments' => $assignments,
                'submitted_assignment_ids' => $myTasks
            ]);
        }
    }
}
