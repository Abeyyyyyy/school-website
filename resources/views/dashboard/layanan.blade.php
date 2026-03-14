@extends('layouts.dashboard')
@section('title', 'Layanan')
@section('page-title', 'Layanan Sekolah')
@section('page-subtitle', 'Layanan administrasi dan fasilitas yang tersedia di SMKN 4 Bandung')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
    @foreach($layanan as $l)
    <div class="bg-white rounded-2xl border border-slate-200 p-5 hover:shadow-md transition">
        <div class="text-4xl mb-3">{{ $l['icon'] }}</div>
        <h3 class="font-bold text-slate-900 text-sm mb-2">{{ $l['nama'] }}</h3>
        <p class="text-slate-500 text-xs leading-relaxed mb-4">{{ $l['desc'] }}</p>
        <div class="flex items-center justify-between pt-3 border-t border-slate-100">
            <span class="text-xs text-slate-400">⏱ {{ $l['waktu'] }}</span>
            <button class="text-xs font-semibold text-blue-600 hover:text-blue-800 transition">Selengkapnya →</button>
        </div>
    </div>
    @endforeach
</div>

@endsection