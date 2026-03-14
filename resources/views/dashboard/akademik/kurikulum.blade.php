@extends('layouts.dashboard')
@section('title', 'Kurikulum')
@section('page-title', 'Kurikulum Sekolah')
@section('page-subtitle', 'Informasi kurikulum yang diterapkan di SMKN 4 Bandung')

@section('content')

<div class="max-w-4xl space-y-6">

    <div class="bg-white rounded-2xl border border-slate-200 p-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center text-xl">📋</div>
            <div>
                <h2 class="font-bold text-slate-900">Kurikulum Merdeka</h2>
                <p class="text-slate-400 text-xs">Diterapkan mulai Tahun Ajaran 2022/2023</p>
            </div>
        </div>
        <p class="text-slate-600 text-sm leading-relaxed">
            SMKN 4 Bandung menerapkan <strong>Kurikulum Merdeka</strong> yang memberikan fleksibilitas kepada sekolah dan siswa untuk mengembangkan potensi sesuai minat dan bakat. Kurikulum ini berfokus pada pembelajaran berbasis proyek (Project Based Learning) dan penguatan profil pelajar Pancasila.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach([
            ['Fase E', 'Kelas X', 'Pengenalan dasar program keahlian, pembentukan karakter, dan literasi digital.', '🌱', 'bg-green-50 border-green-200'],
            ['Fase F1', 'Kelas XI', 'Pendalaman kompetensi kejuruan dan praktik industri melalui proyek nyata.', '🌿', 'bg-blue-50 border-blue-200'],
            ['Fase F2', 'Kelas XII', 'Praktik Kerja Lapangan (PKL), Ujian Kompetensi Keahlian, dan persiapan karir.', '🌳', 'bg-amber-50 border-amber-200'],
        ] as $fase)
        <div class="rounded-2xl border {{ $fase[4] }} p-5">
            <div class="text-3xl mb-2">{{ $fase[2][0] }}{{ $fase[3] }}</div>
            <div class="font-bold text-slate-900">{{ $fase[0] }}</div>
            <div class="text-blue-600 text-xs font-semibold mb-2">{{ $fase[1] }}</div>
            <p class="text-slate-600 text-xs leading-relaxed">{{ $fase[2] }}</p>
        </div>
        @endforeach
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-6">
        <h3 class="font-bold text-slate-900 mb-4">🎯 Profil Pelajar Pancasila</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
            @foreach(['Beriman & Bertakwa','Berkebinekaan Global','Bergotong Royong','Mandiri','Bernalar Kritis','Kreatif'] as $profil)
            <div class="bg-slate-50 rounded-xl p-3 text-center text-sm font-medium text-slate-700">{{ $profil }}</div>
            @endforeach
        </div>
    </div>
</div>

@endsection