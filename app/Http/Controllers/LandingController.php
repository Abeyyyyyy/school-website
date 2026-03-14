<?php

namespace App\Http\Controllers;

class LandingController extends Controller
{
    public function home()
    {
        return view('landing.home');
    }

    public function jurusan()
    {
        $jurusan = [
            ['kode' => 'RPL',  'nama' => 'Rekayasa Perangkat Lunak',      'icon' => '💻', 'desc' => 'Mempelajari pembuatan aplikasi, sistem perangkat lunak, dan animasi.'],
            ['kode' => 'TKJ',  'nama' => 'Teknik Komputer & Jaringan',    'icon' => '🌐', 'desc' => 'Mempelajari hardware komputer, jaringan lokal, dan internet.'],
            ['kode' => 'DKV',  'nama' => 'Desain Komunikasi Visual',      'icon' => '🎨', 'desc' => 'Mempelajari desain grafis, web design, dan animasi digital.'],
            ['kode' => 'TOI',  'nama' => 'Teknik Otomasi Industri',       'icon' => '⚙️', 'desc' => 'Mempelajari sistem kontrol dan otomasi yang digunakan di industri.'],
            ['kode' => 'TAV',  'nama' => 'Teknik Audio Video',            'icon' => '📡', 'desc' => 'Mempelajari ilmu elektronika arus lemah, audio, dan video.'],
            ['kode' => 'TITL', 'nama' => 'Teknik Instalasi Tenaga Listrik','icon' => '⚡', 'desc' => 'Mempelajari instalasi listrik arus kuat dan sistem kelistrikan.'],
            ['kode' => 'TKTL', 'nama' => 'Teknik Konstruksi & Tata Lingkungan','icon' => '🏗️','desc' => 'Mempelajari konstruksi bangunan dan perencanaan tata lingkungan.'],
        ];

        return view('landing.jurusan', compact('jurusan'));
    }

    public function ekstrakulikuler()
    {
        $ekskul = [
            ['nama' => 'Pramuka',           'icon' => '⛺', 'kategori' => 'Wajib',    'desc' => 'Pembentukan karakter, kepemimpinan, dan kemandirian.'],
            ['nama' => 'PMR',               'icon' => '🏥', 'kategori' => 'Wajib',    'desc' => 'Palang Merah Remaja, belajar pertolongan pertama dan sosial.'],
            ['nama' => 'Paskibra',          'icon' => '🚩', 'kategori' => 'Pilihan',  'desc' => 'Pasukan pengibar bendera yang disiplin dan berprestasi.'],
            ['nama' => 'ORBIT (IT Club)',   'icon' => '🖥️', 'kategori' => 'Pilihan',  'desc' => 'Organization of Basic Information Technology untuk pecinta IT.'],
            ['nama' => 'Karate (OPAT)',     'icon' => '🥋', 'kategori' => 'Pilihan',  'desc' => 'Opat Karate Club, aktif di kejuaraan daerah hingga nasional.'],
            ['nama' => 'Basket',            'icon' => '🏀', 'kategori' => 'Pilihan',  'desc' => 'Tim basket sekolah yang kompetitif di berbagai turnamen.'],
            ['nama' => 'Futsal',            'icon' => '⚽', 'kategori' => 'Pilihan',  'desc' => 'Tim futsal dengan semangat kolaborasi dan sportivitas tinggi.'],
            ['nama' => 'Badminton',         'icon' => '🏸', 'kategori' => 'Pilihan',  'desc' => 'Olahraga bulu tangkis untuk mengasah ketangkasan dan fokus.'],
            ['nama' => 'English Club',      'icon' => '🗣️', 'kategori' => 'Pilihan',  'desc' => 'Meningkatkan kemampuan bahasa Inggris melalui diskusi dan debat.'],
            ['nama' => 'Seni Musik',        'icon' => '🎵', 'kategori' => 'Pilihan',  'desc' => 'Mengembangkan bakat seni musik vokal dan instrumen.'],
            ['nama' => 'Robotika',          'icon' => '🤖', 'kategori' => 'Pilihan',  'desc' => 'Merancang dan memprogram robot untuk kompetisi nasional.'],
            ['nama' => 'Taekwondo',         'icon' => '🥊', 'kategori' => 'Pilihan',  'desc' => 'Seni bela diri Korea yang melatih fisik, mental, dan disiplin.'],
        ];

        return view('landing.ekstrakulikuler', compact('ekskul'));
    }

    public function testimoni()
    {
        $testimoni = [
            ['nama' => 'Rizky Firmansyah', 'jurusan' => 'Alumni RPL 2022', 'tahun' => '2022', 'foto' => '👨‍💻', 'pesan' => 'SMKN 4 Bandung benar-benar membentuk saya menjadi developer profesional. Sekarang saya bekerja di startup teknologi di Bandung.'],
            ['nama' => 'Siti Nurhaliza',   'jurusan' => 'Alumni DKV 2021', 'tahun' => '2021', 'foto' => '👩‍🎨', 'pesan' => 'Jurusan DKV membuka mata saya tentang dunia desain. Ilmu yang didapat langsung bisa diterapkan di dunia kerja.'],
            ['nama' => 'Dimas Pratama',    'jurusan' => 'Alumni TKJ 2023', 'tahun' => '2023', 'foto' => '👨‍🔧', 'pesan' => 'Gurunya profesional dan fasilitas lab komputer sangat mendukung. Saya kini bekerja sebagai network engineer.'],
            ['nama' => 'Annisa Rahmawati', 'jurusan' => 'Alumni TAV 2022', 'tahun' => '2022', 'foto' => '👩‍🔬', 'pesan' => 'Ekskul PMR dan pengalaman di SMKN 4 membentuk karakter saya. Sangat bangga menjadi alumni sekolah ini.'],
            ['nama' => 'Bagas Nugroho',    'jurusan' => 'Alumni TITL 2020', 'tahun' => '2020', 'foto' => '👨‍🏭', 'pesan' => 'Berkat SMKN 4 saya berhasil masuk BUMN bidang kelistrikan. Sekolah ini benar-benar menjamin masa depan.'],
            ['nama' => 'Putri Anggraeni',  'jurusan' => 'Alumni TOI 2023',  'tahun' => '2023', 'foto' => '👩‍💼', 'pesan' => 'Jurusan TOI sangat relevan dengan industri 4.0. Saya langsung diterima kerja setelah lulus di perusahaan otomasi.'],
        ];

        return view('landing.testimoni', compact('testimoni'));
    }
}