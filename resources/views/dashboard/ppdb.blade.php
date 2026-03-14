@extends('layouts.dashboard')
@section('title', 'PPDB')
@section('page-title', 'PPDB 2025/2026')
@section('page-subtitle', 'Penerimaan Peserta Didik Baru — Informasi resmi dari PPDB Jawa Barat')

@section('content')

{{-- Sub Navbar --}}
<div class="flex gap-2 mb-6 border-b border-slate-200 pb-0">
    <a href="{{ route('dashboard.ppdb') }}"
        class="px-4 py-2.5 text-sm font-semibold border-b-2 transition -mb-px
        {{ request()->routeIs('dashboard.ppdb') && !request()->routeIs('dashboard.ppdb.bobot-nilai')
            ? 'border-blue-600 text-blue-600'
            : 'border-transparent text-slate-500 hover:text-slate-800' }}">
        📋 Info PPDB
    </a>
    <a href="{{ route('dashboard.ppdb.bobot-nilai') }}"
        class="px-4 py-2.5 text-sm font-semibold border-b-2 transition -mb-px
        {{ request()->routeIs('dashboard.ppdb.bobot-nilai')
            ? 'border-blue-600 text-blue-600'
            : 'border-transparent text-slate-500 hover:text-slate-800' }}">
        🧮 Kalkulator Bobot Nilai
    </a>
</div>

<div class="max-w-4xl space-y-6">

    {{-- Banner --}}
    <div class="bg-gradient-to-r from-blue-700 to-blue-900 rounded-2xl p-6 text-white">
        <div class="flex items-center gap-4">
            <span class="text-5xl">📋</span>
            <div>
                <h2 class="text-xl font-bold">PPDB SMKN 4 Bandung 2025/2026</h2>
                <p class="text-blue-200 text-sm mt-1">Informasi resmi bersumber dari ppdb.jabarprov.go.id</p>
                <a href="https://ppdb.jabarprov.go.id" target="_blank"
                    class="inline-block mt-3 bg-white text-blue-700 font-bold text-xs px-4 py-2 rounded-lg hover:bg-blue-50 transition">
                    🌐 Kunjungi PPDB Jabar →
                </a>
            </div>
        </div>
    </div>

    {{-- Timeline --}}
    <div class="bg-white rounded-2xl border border-slate-200 p-6">
        <h3 class="font-bold text-slate-900 mb-5">📅 Jadwal PPDB 2025/2026</h3>
        <div class="space-y-4">
            @foreach([
                ['Sosialisasi PPDB', '1 - 28 Februari 2025', 'Selesai', 'bg-slate-400'],
                ['Pendaftaran Online', '3 - 14 Juni 2025', 'Akan Datang', 'bg-blue-500'],
                ['Seleksi & Verifikasi', '15 - 20 Juni 2025', 'Akan Datang', 'bg-blue-500'],
                ['Pengumuman Hasil', '25 Juni 2025', 'Akan Datang', 'bg-blue-500'],
                ['Daftar Ulang', '26 - 30 Juni 2025', 'Akan Datang', 'bg-blue-500'],
                ['Masa Pengenalan Sekolah', '14 Juli 2025', 'Akan Datang', 'bg-green-500'],
            ] as $t)
            <div class="flex items-center gap-4">
                <div class="w-3 h-3 {{ $t[3] }} rounded-full flex-shrink-0"></div>
                <div class="flex-1 flex items-center justify-between py-2 border-b border-slate-100">
                    <div>
                        <div class="text-sm font-semibold text-slate-800">{{ $t[0] }}</div>
                        <div class="text-xs text-slate-400">{{ $t[1] }}</div>
                    </div>
                    <span class="text-xs font-medium px-2 py-1 rounded-full
                        {{ $t[2] === 'Selesai' ? 'bg-slate-100 text-slate-500' : 'bg-blue-100 text-blue-700' }}">
                        {{ $t[2] }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Persyaratan --}}
    <div class="bg-white rounded-2xl border border-slate-200 p-6">
        <h3 class="font-bold text-slate-900 mb-4">📄 Persyaratan Pendaftaran</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            @foreach([
                'Ijazah / Surat Keterangan Lulus SMP/MTs',
                'Kartu Keluarga (KK)',
                'Akta Kelahiran',
                'Foto terbaru 3x4 (background merah)',
                'NISN terdaftar di Dapodik',
                'Sertifikat prestasi (jika ada)',
            ] as $s)
            <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl">
                <span class="text-green-500 font-bold">✓</span>
                <span class="text-sm text-slate-700">{{ $s }}</span>
            </div>
            @endforeach
        </div>
    </div>

</div>

@endsection