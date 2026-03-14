@extends('layouts.landing')
@section('title', 'Beranda — SMKN 4 Bandung')

@section('content')

{{-- HERO --}}
<section class="bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700 text-white">
    <div class="max-w-7xl mx-auto px-4 py-24 flex flex-col md:flex-row items-center gap-12">
        <div class="flex-1 text-center md:text-left">
            <span class="inline-block bg-blue-600 text-blue-100 text-xs font-semibold px-3 py-1 rounded-full mb-4">🏫 Sekolah Menengah Kejuruan Negeri</span>
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4">
                Selamat Datang di <br>
                <span class="text-yellow-400">SMKN 4 Bandung</span>
            </h1>
            <p class="text-blue-200 text-lg max-w-xl mb-8">
                Bersama kami, wujudkan potensimu menjadi tenaga profesional yang siap bersaing di dunia industri global.
            </p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center md:justify-start">
                <a href="{{ route('register') }}" class="bg-yellow-400 text-blue-900 font-bold px-8 py-3 rounded-xl hover:bg-yellow-300 transition text-center">Daftar Sekarang</a>
                <a href="{{ route('jurusan') }}" class="bg-white/10 text-white font-semibold px-8 py-3 rounded-xl hover:bg-white/20 transition text-center border border-white/20">Lihat Jurusan</a>
            </div>
        </div>
        <div class="flex-1 flex justify-center">
            <div class="grid grid-cols-2 gap-4 max-w-xs">
                <div class="bg-white/10 backdrop-blur rounded-2xl p-5 text-center border border-white/10">
                    <div class="text-3xl font-extrabold text-yellow-400">2.500+</div>
                    <div class="text-blue-200 text-sm mt-1">Siswa Aktif</div>
                </div>
                <div class="bg-white/10 backdrop-blur rounded-2xl p-5 text-center border border-white/10">
                    <div class="text-3xl font-extrabold text-yellow-400">150+</div>
                    <div class="text-blue-200 text-sm mt-1">Guru & Staff</div>
                </div>
                <div class="bg-white/10 backdrop-blur rounded-2xl p-5 text-center border border-white/10">
                    <div class="text-3xl font-extrabold text-yellow-400">7</div>
                    <div class="text-blue-200 text-sm mt-1">Jurusan Unggulan</div>
                </div>
                <div class="bg-white/10 backdrop-blur rounded-2xl p-5 text-center border border-white/10">
                    <div class="text-3xl font-extrabold text-yellow-400">58+</div>
                    <div class="text-blue-200 text-sm mt-1">Tahun Berdiri</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- JURUSAN HIGHLIGHT --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Jurusan Unggulan</h2>
            <p class="text-gray-500 mt-2">Pilih jurusan sesuai minat dan bakat kamu</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach([['RPL','💻','Rekayasa Perangkat Lunak'],['TKJ','🌐','Teknik Komputer & Jaringan'],['DKV','🎨','Desain Komunikasi Visual'],['TOI','⚙️','Teknik Otomasi Industri'],['TAV','📡','Teknik Audio Video'],['TITL','⚡','Teknik Instalasi Tenaga Listrik'],['TKTL','🏗️','Teknik Konstruksi & Tata Lingkungan']] as $j)
            <div class="bg-gray-50 hover:bg-blue-50 border border-gray-200 hover:border-blue-300 rounded-2xl p-5 text-center transition cursor-pointer group">
                <div class="text-3xl mb-2">{{ $j[1] }}</div>
                <div class="font-bold text-blue-800 text-sm">{{ $j[0] }}</div>
                <div class="text-gray-500 text-xs mt-1">{{ $j[2] }}</div>
            </div>
            @endforeach
            <div class="bg-blue-700 hover:bg-blue-800 rounded-2xl p-5 text-center transition cursor-pointer">
                <div class="text-3xl mb-2">📖</div>
                <div class="font-bold text-white text-sm">Selengkapnya</div>
                <a href="{{ route('jurusan') }}" class="text-blue-200 text-xs mt-1 block hover:text-white">Lihat semua</a>
            </div>
        </div>
    </div>
</section>

{{-- CTA DAFTAR --}}
<section class="py-20 bg-gradient-to-r from-blue-700 to-blue-900">
    <div class="max-w-3xl mx-auto px-4 text-center text-white">
        <h2 class="text-3xl font-bold mb-4">Siap Bergabung?</h2>
        <p class="text-blue-200 mb-8">Daftarkan dirimu sekarang dan mulai perjalanan menuju karir impianmu bersama SMKN 4 Bandung.</p>
        <a href="{{ route('register') }}" class="bg-yellow-400 text-blue-900 font-bold px-10 py-4 rounded-xl hover:bg-yellow-300 transition inline-block text-lg">
            Daftar Sekarang — Gratis
        </a>
    </div>
</section>

@endsection