@extends('layouts.landing')
@section('title', 'Beranda — SMKN 4 Bandung')

@section('content')

{{-- HERO FULL COVER --}}
<section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700 text-white min-h-screen flex items-center overflow-hidden">
    {{-- Background decorative circles --}}
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-600/20 rounded-full -translate-y-48 translate-x-48 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-yellow-400/10 rounded-full translate-y-48 -translate-x-48 blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 py-24 flex flex-col md:flex-row items-center gap-12 w-full relative z-10">
        <div class="flex-1 text-center md:text-left">
            <span class="inline-block bg-blue-600/50 backdrop-blur text-blue-100 text-xs font-semibold px-4 py-2 rounded-full mb-6 border border-blue-500/30">🏫 Sekolah Menengah Kejuruan Negeri</span>
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">
                Selamat Datang di <br>
                <span class="text-yellow-400">SMKN 4 Bandung</span>
            </h1>
            <p class="text-blue-200 text-lg max-w-xl mb-10 leading-relaxed">
                Bersama kami, wujudkan potensimu menjadi tenaga profesional yang siap bersaing di dunia industri global.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                <a href="{{ route('register') }}" class="bg-yellow-400 text-blue-900 font-bold px-8 py-4 rounded-xl hover:bg-yellow-300 transition text-center shadow-lg shadow-yellow-400/25">Daftar Sekarang</a>
                <a href="{{ route('jurusan') }}" class="bg-white/10 text-white font-semibold px-8 py-4 rounded-xl hover:bg-white/20 transition text-center border border-white/20 backdrop-blur">Lihat Jurusan</a>
            </div>
        </div>
        <div class="flex-1 flex justify-center">
            <div class="grid grid-cols-2 gap-4 max-w-sm w-full">
                <div class="bg-white/10 backdrop-blur rounded-2xl p-6 text-center border border-white/10 hover:bg-white/15 transition">
                    <div class="text-4xl font-extrabold text-yellow-400">2.500+</div>
                    <div class="text-blue-200 text-sm mt-2">Siswa Aktif</div>
                </div>
                <div class="bg-white/10 backdrop-blur rounded-2xl p-6 text-center border border-white/10 hover:bg-white/15 transition">
                    <div class="text-4xl font-extrabold text-yellow-400">150+</div>
                    <div class="text-blue-200 text-sm mt-2">Guru & Staff</div>
                </div>
                <div class="bg-white/10 backdrop-blur rounded-2xl p-6 text-center border border-white/10 hover:bg-white/15 transition">
                    <div class="text-4xl font-extrabold text-yellow-400">6</div>
                    <div class="text-blue-200 text-sm mt-2">Jurusan Unggulan</div>
                </div>
                <div class="bg-white/10 backdrop-blur rounded-2xl p-6 text-center border border-white/10 hover:bg-white/15 transition">
                    <div class="text-4xl font-extrabold text-yellow-400">58+</div>
                    <div class="text-blue-200 text-sm mt-2">Tahun Berdiri</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <div class="w-6 h-10 border-2 border-white/40 rounded-full flex justify-center pt-2">
            <div class="w-1 h-2 bg-white/60 rounded-full"></div>
        </div>
    </div>
</section>

{{-- JURUSAN SLIDER --}}
<section class="py-20 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-widest">Program Keahlian</span>
            <h2 class="text-3xl font-bold text-gray-900 mt-2">Jurusan Unggulan</h2>
            <p class="text-gray-500 mt-2">Pilih jurusan sesuai minat dan bakat kamu</p>
        </div>

        {{-- Slider container --}}
        <div class="relative">
            <div class="slider-track flex gap-4" id="jurusanSlider">
                @foreach([['RPL','💻','Rekayasa Perangkat Lunak'],['TKJ','🌐','Teknik Komputer & Jaringan'],['DKV','🎨','Desain Komunikasi Visual'],['TOI','⚙️','Teknik Otomasi Industri'],['TAV','📡','Teknik Audio Video'],['TITL','⚡','Teknik Instalasi Tenaga Listrik'],['RPL','💻','Rekayasa Perangkat Lunak'],['TKJ','🌐','Teknik Komputer & Jaringan'],['DKV','🎨','Desain Komunikasi Visual'],['TOI','⚙️','Teknik Otomasi Industri'],['TAV','📡','Teknik Audio Video'],['TITL','⚡','Teknik Instalasi Tenaga Listrik']] as $j)
                <div class="flex-shrink-0 w-48 bg-gray-50 hover:bg-blue-50 border border-gray-200 hover:border-blue-300 rounded-2xl p-5 text-center transition cursor-pointer group">
                    <div class="text-4xl mb-3">{{ $j[1] }}</div>
                    <div class="font-bold text-blue-800 text-sm">{{ $j[0] }}</div>
                    <div class="text-gray-500 text-xs mt-1">{{ $j[2] }}</div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('jurusan') }}" class="inline-flex items-center gap-2 bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl hover:bg-blue-800 transition">
                Lihat Semua Jurusan →
            </a>
        </div>
    </div>
</section>

{{-- CTA DAFTAR --}}
<section class="relative py-24 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700"></div>
    <div class="absolute top-0 right-0 w-72 h-72 bg-yellow-400/10 rounded-full -translate-y-36 translate-x-36 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-72 h-72 bg-blue-500/20 rounded-full translate-y-36 -translate-x-36 blur-3xl"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-4 text-center text-white">
        <span class="inline-block bg-yellow-400/20 text-yellow-300 text-xs font-semibold px-4 py-2 rounded-full mb-6 border border-yellow-400/30">🎓 Pendaftaran Dibuka</span>
        <h2 class="text-4xl font-extrabold mb-4">Siap Bergabung?</h2>
        <p class="text-blue-200 mb-10 text-lg leading-relaxed">Daftarkan dirimu sekarang dan mulai perjalanan menuju karir impianmu bersama SMKN 4 Bandung.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('register') }}" class="bg-yellow-400 text-blue-900 font-bold px-10 py-4 rounded-xl hover:bg-yellow-300 transition inline-block text-lg shadow-lg shadow-yellow-400/25">
                Daftar Sekarang — Gratis
            </a>
            <a href="{{ route('jurusan') }}" class="bg-white/10 text-white font-semibold px-10 py-4 rounded-xl hover:bg-white/20 transition inline-block text-lg border border-white/20">
                Lihat Jurusan
            </a>
        </div>
    </div>
</section>

{{-- Slider Animation --}}
<style>
.slider-track {
    animation: scroll 20s linear infinite;
    width: max-content;
}
.slider-track:hover {
    animation-play-state: paused;
}
@keyframes scroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
</style>

@endsection