@extends('layouts.dashboard')
@section('title', 'Pengumuman')
@section('page-title', 'Pengumuman')
@section('page-subtitle', 'Berita, acara, dan informasi seputar SMKN 4 Bandung')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
    @foreach($pengumuman as $p)
    <div class="bg-white rounded-2xl border border-slate-200 p-5 hover:shadow-md transition flex flex-col">
        <div class="flex items-start gap-3 mb-3">
            <span class="text-3xl">{{ $p['icon'] }}</span>
            <span class="text-xs font-semibold px-2 py-1 rounded-full bg-blue-100 text-blue-700">{{ $p['kategori'] }}</span>
        </div>
        <h3 class="font-bold text-slate-900 text-sm mb-2">{{ $p['judul'] }}</h3>
        <p class="text-slate-500 text-xs leading-relaxed flex-1">{{ $p['isi'] }}</p>
        <div class="text-xs text-slate-400 mt-4 pt-3 border-t border-slate-100">📅 {{ $p['tanggal'] }}</div>
    </div>
    @endforeach
</div>

@endsection