@extends('layouts.dashboard')
@section('title', 'Ekstrakulikuler')
@section('page-title', 'Ekstrakulikuler')
@section('page-subtitle', 'Informasi lengkap kegiatan ekstrakulikuler SMKN 4 Bandung')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
    @foreach($ekskul as $e)
    <div class="bg-white rounded-2xl border border-slate-200 p-5 hover:shadow-md transition">
        <div class="flex items-start justify-between mb-3">
            <span class="text-4xl">{{ $e['icon'] }}</span>
            <span class="text-xs font-semibold px-2 py-1 rounded-full {{ $e['kategori'] === 'Wajib' ? 'bg-red-100 text-red-600' : 'bg-blue-100 text-blue-600' }}">
                {{ $e['kategori'] }}
            </span>
        </div>
        <h3 class="font-bold text-slate-900 mb-2">{{ $e['nama'] }}</h3>
        <p class="text-slate-500 text-xs leading-relaxed mb-4">{{ $e['desc'] }}</p>
        <div class="space-y-1.5 pt-3 border-t border-slate-100">
            <div class="flex items-center gap-2 text-xs text-slate-500">
                <span>👤</span> <span class="font-medium">{{ $e['coach'] }}</span>
            </div>
            <div class="flex items-center gap-2 text-xs text-slate-500">
                <span>🕐</span> <span>{{ $e['jadwal'] }}</span>
            </div>
            <div class="flex items-center gap-2 text-xs text-slate-500">
                <span>📍</span> <span>{{ $e['tempat'] }}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection