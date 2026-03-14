<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Auth::guard('student')->user();
        return view('dashboard.index', compact('student'));
    }

    public function profil()
    {
        $student = Auth::guard('student')->user();
        return view('dashboard.profil', compact('student'));
    }

    public function pengumuman()
    {
        $pengumuman = [
            ['judul' => 'Peringatan Hari Pendidikan Nasional 2025', 'kategori' => 'Acara', 'tanggal' => '02 Mei 2025', 'isi' => 'SMKN 4 Bandung akan mengadakan upacara dan pentas seni dalam rangka Hari Pendidikan Nasional.', 'icon' => '🎉'],
            ['judul' => 'Juara 1 LKS Provinsi Jawa Barat 2025', 'kategori' => 'Prestasi', 'tanggal' => '15 April 2025', 'isi' => 'Siswa jurusan RPL berhasil meraih Juara 1 pada Lomba Kompetensi Siswa tingkat Provinsi Jawa Barat.', 'icon' => '🏆'],
            ['judul' => 'Jadwal UAS Semester Genap 2024/2025', 'kategori' => 'Akademik', 'tanggal' => '10 April 2025', 'isi' => 'UAS Semester Genap akan dilaksanakan pada tanggal 2-13 Juni 2025. Siswa diharap mempersiapkan diri.', 'icon' => '📝'],
            ['judul' => 'Kunjungan Industri Jurusan TKJ', 'kategori' => 'Kegiatan', 'tanggal' => '05 April 2025', 'isi' => 'Siswa kelas XI TKJ melaksanakan kunjungan industri ke PT. Telkom Indonesia Bandung.', 'icon' => '🏭'],
            ['judul' => 'Penerimaan Siswa Baru Tahun Ajaran 2025/2026', 'kategori' => 'PPDB', 'tanggal' => '01 Maret 2025', 'isi' => 'PPDB SMKN 4 Bandung resmi dibuka. Pendaftaran dapat dilakukan melalui ppdb.jabarprov.go.id.', 'icon' => '📋'],
            ['judul' => 'Turnamen Basket Antar Kelas 2025', 'kategori' => 'Olahraga', 'tanggal' => '20 Februari 2025', 'isi' => 'Turnamen basket tahunan antar kelas akan segera dimulai. Daftarkan tim kelas kamu sekarang!', 'icon' => '🏀'],
        ];

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