@extends('layouts.dashboard')
@section('title', 'Profil Saya')
@section('page-title', 'Profil Saya')
@section('page-subtitle', 'Data pribadi dan informasi akun')

@section('content')

<div class="max-w-2xl">
    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">

        {{-- Header Profil --}}
        <div class="bg-gradient-to-r from-slate-800 to-blue-900 px-6 py-8 text-center">
            <div class="w-20 h-20 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-3xl mx-auto mb-3">
                {{ strtoupper(substr($student->nama_lengkap, 0, 1)) }}
            </div>
            <h2 class="text-white text-xl font-bold">{{ $student->nama_lengkap }}</h2>
            <p class="text-blue-200 text-sm mt-1">{{ $student->pilihan_jurusan }} — SMKN 4 Bandung</p>
            <span class="inline-block mt-2 bg-{{ $student->status === 'aktif' ? 'green' : 'yellow' }}-400/30 text-{{ $student->status === 'aktif' ? 'green' : 'yellow' }}-200 text-xs px-3 py-1 rounded-full capitalize">
                ● {{ $student->status }}
            </span>
        </div>

        {{-- Data Profil --}}
        <div class="p-6 space-y-4">
            @foreach([
                ['label' => 'Nama Lengkap', 'value' => $student->nama_lengkap, 'icon' => '👤'],
                ['label' => 'NISN', 'value' => $student->nisn, 'icon' => '🪪'],
                ['label' => 'Email', 'value' => $student->email, 'icon' => '✉️'],
                ['label' => 'Asal Sekolah', 'value' => $student->asal_sekolah, 'icon' => '🏫'],
                ['label' => 'Pilihan Jurusan', 'value' => $student->pilihan_jurusan, 'icon' => '📚'],
                ['label' => 'No. Telepon', 'value' => $student->no_telepon ?? '-', 'icon' => '📱'],
                ['label' => 'Terdaftar Sejak', 'value' => $student->created_at->format('d F Y'), 'icon' => '📅'],
            ] as $item)
            <div class="flex items-center gap-4 py-3 border-b border-slate-100 last:border-0">
                <span class="text-xl w-8">{{ $item['icon'] }}</span>
                <div class="flex-1">
                    <div class="text-xs text-slate-400 font-medium">{{ $item['label'] }}</div>
                    <div class="text-sm font-semibold text-slate-800 mt-0.5">{{ $item['value'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection