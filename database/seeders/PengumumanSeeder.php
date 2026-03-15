<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['icon' => '🎉', 'judul' => 'Peringatan Hari Pendidikan Nasional 2025',      'kategori' => 'Acara',    'tanggal' => '2025-05-02', 'isi' => 'SMKN 4 Bandung akan mengadakan upacara dan pentas seni dalam rangka Hari Pendidikan Nasional.'],
            ['icon' => '🏆', 'judul' => 'Juara 1 LKS Provinsi Jawa Barat 2025',          'kategori' => 'Prestasi', 'tanggal' => '2025-04-15', 'isi' => 'Siswa jurusan RPL berhasil meraih Juara 1 pada Lomba Kompetensi Siswa tingkat Provinsi Jawa Barat.'],
            ['icon' => '📝', 'judul' => 'Jadwal UAS Semester Genap 2024/2025',            'kategori' => 'Akademik', 'tanggal' => '2025-04-10', 'isi' => 'UAS Semester Genap akan dilaksanakan pada tanggal 2-13 Juni 2025. Siswa diharap mempersiapkan diri.'],
            ['icon' => '🏭', 'judul' => 'Kunjungan Industri Jurusan TKJ',                 'kategori' => 'Kegiatan', 'tanggal' => '2025-04-05', 'isi' => 'Siswa kelas XI TKJ melaksanakan kunjungan industri ke PT. Telkom Indonesia Bandung.'],
            ['icon' => '📋', 'judul' => 'Penerimaan Siswa Baru Tahun Ajaran 2025/2026',  'kategori' => 'PPDB',     'tanggal' => '2025-03-01', 'isi' => 'PPDB SMKN 4 Bandung resmi dibuka. Pendaftaran dapat dilakukan melalui ppdb.jabarprov.go.id.'],
            ['icon' => '⚽', 'judul' => 'Turnamen Basket Antar Kelas 2025',               'kategori' => 'Olahraga', 'tanggal' => '2025-02-20', 'isi' => 'Turnamen basket tahunan antar kelas akan segera dimulai. Daftarkan tim kelas kamu sekarang!'],
        ];

        foreach ($data as $item) {
            Pengumuman::create([
                ...$item,
                'status'   => 'aktif',
                'admin_id' => 1,
            ]);
        }
    }
}