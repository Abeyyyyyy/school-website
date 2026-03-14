@extends('layouts.landing')
@section('title', 'Ekstrakulikuler — SMKN 4 Bandung')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-16">

    <div class="text-center mb-14">
        <span class="text-blue-600 font-semibold text-sm uppercase tracking-widest">Kegiatan Siswa</span>
        <h1 class="text-4xl font-extrabold text-gray-900 mt-2">Ekstrakulikuler</h1>
        <p class="text-gray-500 mt-3 max-w-2xl mx-auto">Kembangkan bakat dan minatmu di luar jam pelajaran bersama teman-teman terbaik.</p>
    </div>

    {{-- Filter Tabs --}}
    <div class="flex justify-center gap-2 mb-10 flex-wrap">
        <button class="px-5 py-2 rounded-full text-sm font-medium bg-blue-700 text-white">Semua</button>
        <button class="px-5 py-2 rounded-full text-sm font-medium bg-gray-100 text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition">Wajib</button>
        <button class="px-5 py-2 rounded-full text-sm font-medium bg-gray-100 text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition">Pilihan</button>
    </div>

    {{-- Grid Ekskul --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        @foreach($ekskul as $e)
        <div class="bg-white border border-gray-200 rounded-2xl p-5 text-center hover:shadow-md hover:border-blue-300 transition">
            <div class="text-4xl mb-3">{{ $e['icon'] }}</div>
            <h3 class="font-bold text-gray-900 text-sm">{{ $e['nama'] }}</h3>
            <span class="inline-block mt-1 text-xs px-2 py-0.5 rounded-full {{ $e['kategori'] === 'Wajib' ? 'bg-red-100 text-red-600' : 'bg-blue-100 text-blue-600' }}">
                {{ $e['kategori'] }}
            </span>
            <p class="text-gray-500 text-xs mt-2">{{ $e['desc'] }}</p>
        </div>
        @endforeach
    </div>
</div>

@endsection