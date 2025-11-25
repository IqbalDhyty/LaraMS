<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcement;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        // Pengumuman dari guru (user_id = 1)
        Announcement::create([
            'user_id' => 1, // Pastikan seeder User membuat guru dengan ID 1
            'title' => 'Selamat Datang di LMS!',
            'content' => 'Selamat datang di Learning Management System. Silakan cek tugas pertama Anda di menu Assignment.',
        ]);

        Announcement::create([
            'user_id' => 1,
            'title' => 'Perpanjangan Deadline',
            'content' => 'Deadline pengumpulan tugas Pemrograman Dasar diperpanjang hingga minggu depan.',
        ]);

        Announcement::create([
            'user_id' => 1,
            'title' => 'Maintenance Sistem',
            'content' => 'Aplikasi akan mengalami pemeliharaan pada hari Jumat pukul 22.00 - 23.00. Mohon tidak login selama proses berlangsung.',
        ]);
    }
}
