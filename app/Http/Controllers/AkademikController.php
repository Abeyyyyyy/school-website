<?php

namespace App\Http\Controllers;

class AkademikController extends Controller
{
    public function kurikulum()
    {
        return view('dashboard.akademik.kurikulum');
    }

    public function jadwal()
    {
        $kelas = ['X RPL 1', 'X RPL 2', 'X TKJ 1', 'X TKJ 2', 'X DKV', 'X TOI', 'X TAV', 'X TITL', 'X TKTL',
                  'XI RPL 1', 'XI RPL 2', 'XI TKJ 1', 'XI TKJ 2', 'XI DKV', 'XI TOI', 'XI TAV', 'XI TITL', 'XI TKTL',
                  'XII RPL 1', 'XII RPL 2', 'XII TKJ 1', 'XII TKJ 2', 'XII DKV', 'XII TOI', 'XII TAV', 'XII TITL', 'XII TKTL'];

        $jadwal = [
            'Senin'  => [['jam' => '07.00-08.30', 'mapel' => 'Matematika', 'guru' => 'Bpk. Ahmad'], ['jam' => '08.30-10.00', 'mapel' => 'Bahasa Indonesia', 'guru' => 'Ibu Sari'], ['jam' => '10.15-11.45', 'mapel' => 'Pemrograman Dasar', 'guru' => 'Bpk. Deni'], ['jam' => '12.30-14.00', 'mapel' => 'Basis Data', 'guru' => 'Ibu Rina']],
            'Selasa' => [['jam' => '07.00-08.30', 'mapel' => 'Bahasa Inggris', 'guru' => 'Ibu Maya'], ['jam' => '08.30-10.00', 'mapel' => 'Fisika', 'guru' => 'Bpk. Hendra'], ['jam' => '10.15-11.45', 'mapel' => 'Pemrograman Web', 'guru' => 'Bpk. Deni'], ['jam' => '12.30-14.00', 'mapel' => 'Desain Grafis', 'guru' => 'Ibu Lina']],
            'Rabu'   => [['jam' => '07.00-08.30', 'mapel' => 'PKn', 'guru' => 'Ibu Dewi'], ['jam' => '08.30-10.00', 'mapel' => 'Sejarah', 'guru' => 'Bpk. Rudi'], ['jam' => '10.15-11.45', 'mapel' => 'Jaringan Dasar', 'guru' => 'Bpk. Fajar'], ['jam' => '12.30-14.00', 'mapel' => 'Sistem Operasi', 'guru' => 'Bpk. Fajar']],
            'Kamis'  => [['jam' => '07.00-08.30', 'mapel' => 'Agama', 'guru' => 'Ibu Fatimah'], ['jam' => '08.30-10.00', 'mapel' => 'Matematika', 'guru' => 'Bpk. Ahmad'], ['jam' => '10.15-11.45', 'mapel' => 'Pemrograman Dasar', 'guru' => 'Bpk. Deni'], ['jam' => '12.30-14.00', 'mapel' => 'Bahasa Sunda', 'guru' => 'Ibu Tuti']],
            'Jumat'  => [['jam' => '07.00-08.30', 'mapel' => 'Olahraga', 'guru' => 'Bpk. Agus'], ['jam' => '08.30-10.00', 'mapel' => 'Seni Budaya', 'guru' => 'Ibu Wati'], ['jam' => '10.15-11.30', 'mapel' => 'BK', 'guru' => 'Ibu Nani']],
        ];

        return view('dashboard.akademik.jadwal', compact('kelas', 'jadwal'));
    }

    public function ekstrakulikuler()
    {
        $ekskul = [
            ['nama' => 'Pramuka', 'icon' => '⛺', 'kategori' => 'Wajib', 'coach' => 'Bpk. Agus Salim', 'jadwal' => 'Jumat, 14.00-16.00', 'tempat' => 'Lapangan Utama', 'desc' => 'Kegiatan kepramukaan yang membentuk karakter, kemandirian, dan jiwa kepemimpinan siswa melalui berbagai kegiatan outdoor dan sosial.'],
            ['nama' => 'PMR', 'icon' => '🏥', 'kategori' => 'Wajib', 'coach' => 'Ibu Siti Rahayu', 'jadwal' => 'Sabtu, 08.00-10.00', 'tempat' => 'Ruang UKS', 'desc' => 'Palang Merah Remaja melatih siswa dalam pertolongan pertama, donor darah, dan kegiatan sosial kemanusiaan.'],
            ['nama' => 'ORBIT (IT Club)', 'icon' => '🖥️', 'kategori' => 'Pilihan', 'coach' => 'Bpk. Deni Kusuma', 'jadwal' => 'Rabu, 15.00-17.00', 'tempat' => 'Lab Komputer 1', 'desc' => 'Organization of Basic Information Technology, wadah pengembangan kemampuan IT siswa melalui proyek nyata dan kompetisi.'],
            ['nama' => 'Karate (OPAT)', 'icon' => '🥋', 'kategori' => 'Pilihan', 'coach' => 'Bpk. Reza Pratama', 'jadwal' => 'Selasa & Kamis, 15.30-17.30', 'tempat' => 'Aula Sekolah', 'desc' => 'Opat Karate Club aktif mengikuti berbagai kejuaraan dari tingkat daerah hingga nasional dengan prestasi membanggakan.'],
            ['nama' => 'Paskibra', 'icon' => '🚩', 'kategori' => 'Pilihan', 'coach' => 'Bpk. Yusuf Hidayat', 'jadwal' => 'Senin & Kamis, 15.00-17.00', 'tempat' => 'Lapangan Upacara', 'desc' => 'Pasukan pengibar bendera yang melatih kedisiplinan, kekompakan, dan rasa nasionalisme yang tinggi.'],
            ['nama' => 'Basket', 'icon' => '🏀', 'kategori' => 'Pilihan', 'coach' => 'Bpk. Andri Setiawan', 'jadwal' => 'Selasa & Jumat, 15.00-17.00', 'tempat' => 'Lapangan Basket', 'desc' => 'Tim basket sekolah yang kompetitif dan rutin mengikuti turnamen antar sekolah di Kota Bandung.'],
            ['nama' => 'Futsal', 'icon' => '⚽', 'kategori' => 'Pilihan', 'coach' => 'Bpk. Hendra Wijaya', 'jadwal' => 'Rabu & Sabtu, 15.00-17.00', 'tempat' => 'Lapangan Futsal', 'desc' => 'Tim futsal yang mengedepankan semangat kolaborasi, sportivitas, dan kerja sama tim yang solid.'],
            ['nama' => 'English Club', 'icon' => '🗣️', 'kategori' => 'Pilihan', 'coach' => 'Ibu Maya Putri', 'jadwal' => 'Kamis, 14.00-16.00', 'tempat' => 'Ruang Kelas 204', 'desc' => 'Meningkatkan kemampuan bahasa Inggris siswa melalui diskusi, debat, story telling, dan public speaking.'],
            ['nama' => 'Robotika', 'icon' => '🤖', 'kategori' => 'Pilihan', 'coach' => 'Bpk. Fajar Nugraha', 'jadwal' => 'Senin & Rabu, 15.00-17.30', 'tempat' => 'Lab Elektronika', 'desc' => 'Merancang, merakit, dan memprogram robot untuk kompetisi robotika tingkat nasional dan internasional.'],
        ];

        return view('dashboard.akademik.ekstrakulikuler', compact('ekskul'));
    }

    public function infoUjian()
    {
        $ujian = [
            ['judul' => 'Ujian Akhir Semester (UAS) Genap 2024/2025', 'tanggal' => '2 - 13 Juni 2025', 'status' => 'Akan Datang', 'sumber' => 'Kemdikbud', 'desc' => 'UAS Semester Genap Tahun Ajaran 2024/2025. Siswa diharap mempersiapkan diri dengan belajar materi semester genap.'],
            ['judul' => 'Ujian Kompetensi Keahlian (UKK)', 'tanggal' => '17 - 28 Maret 2025', 'status' => 'Berlangsung', 'sumber' => 'BSNP', 'desc' => 'Ujian Kompetensi Keahlian untuk siswa kelas XII sebagai syarat kelulusan dari program keahlian masing-masing.'],
            ['judul' => 'Asesmen Nasional Berbasis Komputer (ANBK)', 'tanggal' => '20 - 23 Oktober 2025', 'status' => 'Akan Datang', 'sumber' => 'Kemdikbud', 'desc' => 'ANBK untuk kelas XI sebagai pengganti UN. Mengukur literasi, numerasi, dan survei karakter siswa.'],
            ['judul' => 'Ujian Tengah Semester (UTS) Genap', 'tanggal' => '10 - 15 Maret 2025', 'status' => 'Selesai', 'sumber' => 'Internal Sekolah', 'desc' => 'UTS Semester Genap Tahun Ajaran 2024/2025 telah selesai dilaksanakan dengan baik.'],
        ];

        return view('dashboard.akademik.info-ujian', compact('ujian'));
    }

    public function mataPelajaran()
    {
        $mapel = [
            'X' => [
                'Umum' => ['Pendidikan Agama & Budi Pekerti', 'PPKn', 'Bahasa Indonesia', 'Matematika', 'Sejarah Indonesia', 'Bahasa Inggris', 'Seni Budaya', 'Pendidikan Jasmani', 'Bahasa Sunda', 'BK'],
                'Kejuruan' => ['Simulasi & Komunikasi Digital', 'Fisika', 'Kimia', 'Pemrograman Dasar', 'Sistem Komputer'],
            ],
            'XI' => [
                'Umum' => ['Pendidikan Agama & Budi Pekerti', 'PPKn', 'Bahasa Indonesia', 'Matematika', 'Bahasa Inggris', 'Pendidikan Jasmani', 'Bahasa Sunda', 'BK'],
                'Kejuruan' => ['Pemrograman Berorientasi Objek', 'Basis Data', 'Pemrograman Web', 'Jaringan Dasar', 'Desain Grafis', 'Kerja Proyek'],
            ],
            'XII' => [
                'Umum' => ['Pendidikan Agama & Budi Pekerti', 'PPKn', 'Bahasa Indonesia', 'Matematika', 'Bahasa Inggris', 'Pendidikan Jasmani', 'BK'],
                'Kejuruan' => ['Pemrograman Mobile', 'Keamanan Jaringan', 'Administrasi Server', 'Produk Kreatif & Kewirausahaan', 'Praktik Kerja Lapangan (PKL)'],
            ],
        ];

        return view('dashboard.akademik.mata-pelajaran', compact('mapel'));
    }
}