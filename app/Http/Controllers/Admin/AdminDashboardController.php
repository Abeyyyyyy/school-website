<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use App\Models\Pesan;
use App\Models\Student;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_pengumuman' => Pengumuman::count(),
            'total_student'    => Student::count(),
            'total_pesan'      => Pesan::count(),
            'pesan_belum_baca' => Pesan::where('status', 'belum_dibaca')->count(),
            'pengumuman_terbaru' => Pengumuman::latest()->take(5)->get(),
            'pesan_terbaru'     => Pesan::where('status', 'belum_dibaca')->latest()->take(5)->get(),
            'student_terbaru'   => Student::latest()->take(5)->get(),
        ];

        return view('admin.dashboard.index', compact('data'));
    }
}