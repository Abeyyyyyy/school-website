<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengumuman;

class DashboardController extends Controller
{

    public function kontakStore(Request $request)
    {
        $request->validate([
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        $student = Auth::guard('student')->user();

        Pesan::create([
            'nama' => $student->nama_lengkap,
            'email' => $student->email,
            'subjek' => $request->subjek,
            'pesan' => $request->pesan,
            'student_id' => $student->id,
        ]);

        return back()->with('success', 'Pesan berhasil dikirim! Admin akan segera merespons.');
    }
    public function index()
    {
        $student = Auth::guard('student')->user();

        $pengumumanTerbaru = Pengumuman::where('status', 'aktif')
            ->latest('tanggal')
            ->take(3)
            ->get();

        return view('dashboard.index', compact('student', 'pengumumanTerbaru'));
    }

    public function profil()
    {
        $student = Auth::guard('student')->user();
        return view('dashboard.profil', compact('student'));
    }

    public function pengumuman()
    {
        $pengumuman = Pengumuman::where('status', 'aktif')
            ->latest('tanggal')
            ->get();

        return view('dashboard.pengumuman', compact('pengumuman'));
    }

    public function kesiswaan()
    {
        return view('dashboard.kesiswaan');
    }

    public function ppdb()
    {
        return view('dashboard.ppdb');
    }

    public function bobotNilai()
    {
        return view('dashboard.ppdb-bobot-nilai');
    }

    public function elearning()
    {
        return view('dashboard.elearning');
    }

    public function layanan()
    {
        $layanan = [
            ['nama' => 'Surat Keterangan Aktif', 'icon' => '📄', 'desc' => 'Permohonan surat keterangan masih aktif sebagai siswa SMKN 4 Bandung.', 'waktu' => '1-2 hari kerja'],
            ['nama' => 'Legalisir Dokumen', 'icon' => '✅', 'desc' => 'Legalisir ijazah, rapor, dan dokumen resmi lainnya oleh pihak sekolah.', 'waktu' => '2-3 hari kerja'],
            ['nama' => 'Beasiswa', 'icon' => '🎓', 'desc' => 'Informasi dan pendaftaran beasiswa KIP, Pemkot Bandung, dan beasiswa lainnya.', 'waktu' => 'Sesuai periode'],
            ['nama' => 'Konseling Siswa', 'icon' => '💬', 'desc' => 'Layanan bimbingan konseling untuk permasalahan akademik dan pribadi siswa.', 'waktu' => 'Setiap hari'],
            ['nama' => 'Perpustakaan Digital', 'icon' => '📚', 'desc' => 'Akses buku digital, modul, dan referensi pembelajaran secara online.', 'waktu' => '24 jam'],
            ['nama' => 'UKS (Unit Kesehatan Sekolah)', 'icon' => '🏥', 'desc' => 'Layanan kesehatan dasar dan pertolongan pertama bagi siswa.', 'waktu' => 'Jam sekolah'],
        ];

        return view('dashboard.layanan', compact('layanan'));
    }

    public function kontak()
    {
        return view('dashboard.kontak');
    }
}