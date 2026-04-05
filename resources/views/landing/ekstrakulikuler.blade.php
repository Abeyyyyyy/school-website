@extends('layouts.landing')
@section('title', 'Ekstrakulikuler — SMKN 4 Bandung')

@section('content')

{{-- Header --}}
<div class="bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700 text-white py-16 text-center relative overflow-hidden">
    <div class="absolute top-0 right-0 w-72 h-72 bg-yellow-400/10 rounded-full -translate-y-36 translate-x-36 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-72 h-72 bg-blue-500/20 rounded-full translate-y-36 -translate-x-36 blur-3xl"></div>
    <div class="relative z-10">
        <span class="inline-block bg-blue-600/50 text-blue-100 text-xs font-semibold px-4 py-2 rounded-full mb-4 border border-blue-500/30">Kegiatan Siswa</span>
        <h1 class="text-4xl font-extrabold mt-2">Ekstrakulikuler</h1>
        <p class="text-blue-200 mt-3 max-w-2xl mx-auto">Kembangkan bakat dan minatmu di luar jam pelajaran bersama teman-teman terbaik.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-16">

    {{-- Filter Tabs --}}
    <div class="flex justify-center gap-2 mb-12 flex-wrap">
        <button onclick="filterEkskul('Semua')" id="btn-Semua" class="px-6 py-2.5 rounded-full text-sm font-semibold bg-blue-700 text-white shadow transition">Semua</button>
        <button onclick="filterEkskul('Wajib')" id="btn-Wajib" class="px-6 py-2.5 rounded-full text-sm font-semibold bg-gray-100 text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition">Wajib</button>
        <button onclick="filterEkskul('Pilihan')" id="btn-Pilihan" class="px-6 py-2.5 rounded-full text-sm font-semibold bg-gray-100 text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition">Pilihan</button>
    </div>

    {{-- Grid Ekskul --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5" id="ekskulGrid">
        @foreach($ekskul as $e)
        <div class="ekskul-card bg-white border border-gray-100 rounded-2xl p-6 text-center hover:shadow-xl hover:border-blue-300 hover:-translate-y-1 transition-all duration-300 group"
             data-kategori="{{ $e['kategori'] }}">
            <div class="w-16 h-16 mx-auto mb-4 bg-blue-50 rounded-2xl flex items-center justify-center text-4xl group-hover:bg-blue-100 transition">
                {{ $e['icon'] }}
            </div>
            <h3 class="font-bold text-gray-900 text-sm mb-1">{{ $e['nama'] }}</h3>
            <span class="inline-block text-xs px-3 py-0.5 rounded-full font-semibold {{ $e['kategori'] === 'Wajib' ? 'bg-red-100 text-red-600' : 'bg-blue-100 text-blue-600' }}">
                {{ $e['kategori'] }}
            </span>
            <p class="text-gray-400 text-xs mt-3 leading-relaxed">{{ $e['desc'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- CTA --}}
    <div class="mt-16 text-center bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700 rounded-3xl py-14 px-6 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-yellow-400/10 rounded-full -translate-y-32 translate-x-32 blur-3xl"></div>
        <div class="relative z-10">
            <span class="inline-block bg-yellow-400/20 text-yellow-300 text-xs font-semibold px-4 py-2 rounded-full mb-4 border border-yellow-400/30">🏆 Raih Prestasimu</span>
            <h2 class="text-3xl font-extrabold text-white mb-3">Siap Bergabung?</h2>
            <p class="text-blue-200 mb-8">Daftarkan dirimu dan ikuti ekstrakulikuler sesuai minat dan bakatmu.</p>
            <a href="{{ route('register') }}" class="bg-yellow-400 text-blue-900 font-bold px-10 py-4 rounded-xl hover:bg-yellow-300 transition inline-block shadow-lg shadow-yellow-400/25">
                Daftar Sekarang — Gratis
            </a>
        </div>
    </div>
</div>

<script>
function filterEkskul(kategori) {
    const cards = document.querySelectorAll('.ekskul-card');
    const buttons = document.querySelectorAll('[id^="btn-"]');

    buttons.forEach(btn => {
        btn.className = 'px-6 py-2.5 rounded-full text-sm font-semibold bg-gray-100 text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition';
    });
    document.getElementById('btn-' + kategori).className = 'px-6 py-2.5 rounded-full text-sm font-semibold bg-blue-700 text-white shadow transition';

    cards.forEach(card => {
        if (kategori === 'Semua' || card.dataset.kategori === kategori) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

@endsection 