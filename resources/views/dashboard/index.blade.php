@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Selamat datang di Portal Siswa SMKN 4 Bandung')

@section('content')

{{-- Welcome Banner --}}
<div class="bg-gradient-to-r from-slate-800 to-blue-900 rounded-2xl p-6 mb-6 text-white">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-blue-200 text-sm">Selamat datang kembali 👋</p>
            <h2 class="text-2xl font-bold mt-1">{{ $student->nama_lengkap }}</h2>
            <div class="flex items-center gap-3 mt-3 flex-wrap">
                <span class="bg-white/20 text-white text-xs px-3 py-1 rounded-full">{{ $student->pilihan_jurusan }}</span>
                <span class="bg-white/20 text-white text-xs px-3 py-1 rounded-full">NISN: {{ $student->nisn }}</span>
                <span class="bg-{{ $student->status === 'aktif' ? 'green' : 'yellow' }}-400/30 text-{{ $student->status === 'aktif' ? 'green' : 'yellow' }}-200 text-xs px-3 py-1 rounded-full capitalize">
                    ● {{ $student->status }}
                </span>
            </div>
        </div>
        <div class="text-6xl hidden md:block">🎓</div>
    </div>
</div>

{{-- Stats Cards --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:shadow-md transition">
        <div class="text-2xl mb-2">📚</div>
        <div class="text-2xl font-bold text-slate-900">15</div>
        <div class="text-slate-500 text-xs mt-0.5">Mata Pelajaran</div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:shadow-md transition">
        <div class="text-2xl mb-2">📢</div>
        <div class="text-2xl font-bold text-slate-900">6</div>
        <div class="text-slate-500 text-xs mt-0.5">Pengumuman Baru</div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:shadow-md transition">
        <div class="text-2xl mb-2">📝</div>
        <div class="text-2xl font-bold text-slate-900">2</div>
        <div class="text-slate-500 text-xs mt-0.5">Ujian Mendatang</div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:shadow-md transition">
        <div class="text-2xl mb-2">⛺</div>
        <div class="text-2xl font-bold text-slate-900">9</div>
        <div class="text-slate-500 text-xs mt-0.5">Ekstrakulikuler</div>
    </div>
</div>

{{-- Sambutan Kepala Sekolah --}}
<div class="bg-white rounded-2xl border border-slate-200 p-6 mb-6">
    <h3 class="font-bold text-slate-900 mb-5">🎙️ Sambutan Kepala Sekolah</h3>
    <div class="flex flex-col md:flex-row gap-6 items-start">

        {{-- Foto --}}
        <div class="flex-shrink-0 text-center">
            <div class="w-28 h-28 bg-gradient-to-br from-slate-700 to-blue-900 rounded-2xl flex items-center justify-center text-6xl mx-auto md:mx-0">
                👨‍💼
            </div>
            <div class="mt-3">
                <div class="font-bold text-slate-900 text-sm">Dr. Agus Setiawan, S.Pd., M.Si.</div>
                <div class="text-blue-600 text-xs font-medium mt-0.5">Kepala SMKN 4 Bandung</div>
            </div>
        </div>

        {{-- Sambutan --}}
        <div class="flex-1">
            <div class="bg-slate-50 rounded-2xl p-5 border-l-4 border-blue-600 relative">
                <span class="absolute -top-3 left-5 text-blue-200 text-5xl font-serif leading-none">"</span>
                <div class="space-y-3 text-slate-700 text-sm leading-relaxed pt-3">
                    <p>
                        Assalamu'alaikum Warahmatullahi Wabarakatuh. Selamat datang di Portal Siswa SMKN 4 Bandung.
                        Kami bangga menyambut kalian sebagai bagian dari keluarga besar SMKN 4 Bandung.
                    </p>
                    <p>
                        SMKN 4 Bandung berkomitmen untuk mencetak lulusan yang <strong>berkarakter, kompeten, dan berwawasan global</strong>.
                        Melalui portal ini, kami harap kalian dapat mengakses seluruh informasi akademik dengan mudah dan efisien.
                    </p>
                    <p>
                        Manfaatkan setiap kesempatan belajar yang ada. Jadikan SMKN 4 Bandung sebagai batu loncatan menuju masa depan yang gemilang.
                        Semangat belajar, terus berprestasi!
                    </p>
                </div>
                <span class="block text-right text-blue-200 text-5xl font-serif leading-none -mb-3">"</span>
            </div>

            {{-- Profil singkat --}}
            <div class="flex flex-wrap gap-2 mt-3">
                <span class="bg-blue-50 text-blue-700 text-xs px-3 py-1 rounded-full font-medium">📍 SMKN 4 Bandung sejak 2021</span>
                <span class="bg-green-50 text-green-700 text-xs px-3 py-1 rounded-full font-medium">🎓 Doktor Pendidikan</span>
                <span class="bg-amber-50 text-amber-700 text-xs px-3 py-1 rounded-full font-medium">🏆 Akreditasi A</span>
            </div>
        </div>
    </div>
</div>

{{-- Quick Access --}}
<div class="bg-white rounded-2xl border border-slate-200 p-6 mb-6">
    <h3 class="font-bold text-slate-900 mb-4">⚡ Akses Cepat</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
        <a href="{{ route('dashboard.akademik.jadwal') }}"
            class="flex flex-col items-center gap-2 p-4 rounded-xl bg-blue-50 hover:bg-blue-100 transition text-center group">
            <span class="text-2xl group-hover:scale-110 transition-transform">🗓️</span>
            <span class="text-xs font-semibold text-blue-800">Jadwal Pelajaran</span>
        </a>
        <a href="{{ route('dashboard.pengumuman') }}"
            class="flex flex-col items-center gap-2 p-4 rounded-xl bg-amber-50 hover:bg-amber-100 transition text-center group">
            <span class="text-2xl group-hover:scale-110 transition-transform">📢</span>
            <span class="text-xs font-semibold text-amber-800">Pengumuman</span>
        </a>
        <a href="{{ route('dashboard.akademik.info-ujian') }}"
            class="flex flex-col items-center gap-2 p-4 rounded-xl bg-red-50 hover:bg-red-100 transition text-center group">
            <span class="text-2xl group-hover:scale-110 transition-transform">📝</span>
            <span class="text-xs font-semibold text-red-800">Info Ujian</span>
        </a>
        <a href="{{ route('dashboard.profil') }}"
            class="flex flex-col items-center gap-2 p-4 rounded-xl bg-green-50 hover:bg-green-100 transition text-center group">
            <span class="text-2xl group-hover:scale-110 transition-transform">👤</span>
            <span class="text-xs font-semibold text-green-800">Profil Saya</span>
        </a>
    </div>
</div>

{{-- Pengumuman Terbaru --}}
<div class="bg-white rounded-2xl border border-slate-200 p-6">
    <div class="flex items-center justify-between mb-4">
        <h3 class="font-bold text-slate-900">📰 Pengumuman Terbaru</h3>
        <a href="{{ route('dashboard.pengumuman') }}" class="text-blue-600 text-xs font-semibold hover:underline">Lihat semua →</a>
    </div>
    <div class="space-y-2">
        @foreach([
            ['🏆', 'Juara 1 LKS Provinsi Jawa Barat 2025', 'Prestasi', '15 April 2025'],
            ['📝', 'Jadwal UAS Semester Genap 2024/2025', 'Akademik', '10 April 2025'],
            ['🎉', 'Peringatan Hari Pendidikan Nasional', 'Acara', '02 Mei 2025'],
        ] as $p)
        <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition cursor-pointer">
            <span class="text-xl">{{ $p[0] }}</span>
            <div class="flex-1">
                <div class="text-sm font-semibold text-slate-800">{{ $p[1] }}</div>
                <div class="flex items-center gap-2 mt-0.5">
                    <span class="text-xs text-blue-600 font-medium">{{ $p[2] }}</span>
                    <span class="text-slate-300">•</span>
                    <span class="text-xs text-slate-400">{{ $p[3] }}</span>
                </div>
            </div>
            <span class="text-slate-300 text-sm">→</span>
        </div>
        @endforeach
    </div>
</div>

@endsection