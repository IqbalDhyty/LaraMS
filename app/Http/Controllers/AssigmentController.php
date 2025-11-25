<?php

namespace App\Http\Controllers;

use App\Models\Assigment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Announcement;

class AssigmentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        // Memastikan title dan content terisi sebelum diproses
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            
        ]);

        // 2. Simpan ke Database
        // Kita menggunakan method create() dari Model Announcement
        Announcement::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => Auth::id(), // Mengambil ID guru yang sedang login otomatis
        ]);

        // 3. Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Pengumuman berhasil dibuat!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect()->back()->with('success', 'Pengumuman berhasil dihapus!');
    }

    public function edit() {
        
    }
}
