@extends('layouts.dashboard')
@section('title', 'Kontak')
@section('page-title', 'Kontak')
@section('page-subtitle', 'Hubungi kami dan temukan lokasi SMKN 4 Bandung')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    {{-- Form Kontak --}}
    <div class="bg-white rounded-2xl border border-slate-200 p-6">
        <h3 class="font-bold text-slate-900 mb-5">✉️ Kirim Pesan</h3>
        <form class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Nama</label>
                <input type="text" value="{{ Auth::guard('student')->user()->nama_lengkap }}"
                    class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Email</label>
                <input type="email" value="{{ Auth::guard('student')->user()->email }}"
                    class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Subjek</label>
                <input type="text" placeholder="Subjek pesan"
                    class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Pesan</label>
                <textarea rows="4" placeholder="Tulis pesan kamu..."
                    class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-700 text-white font-bold py-3 rounded-xl hover:bg-blue-800 transition text-sm">
                Kirim Pesan
            </button>
        </form>
    </div>

    {{-- Info Kontak + Peta --}}
    <div class="space-y-5">

        {{-- Info --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h3 class="font-bold text-slate-900 mb-4">📍 Informasi Kontak</h3>
            <div class="space-y-3">
                @foreach([
                    ['📍', 'Alamat', 'Jl. Kliningan No.6, Turangga, Kec. Lengkong, Kota Bandung, Jawa Barat 40264'],
                    ['📞', 'Telepon', '(022) 7304179'],
                    ['✉️', 'Email', 'info@smkn4bdg.sch.id'],
                    ['🌐', 'Website', 'smkn4bdg.sch.id'],
                    ['🕐', 'Jam Operasional', 'Senin - Jumat: 07.00 - 16.00 WIB'],
                ] as $k)
                <div class="flex items-start gap-3">
                    <span class="text-xl flex-shrink-0">{{ $k[0] }}</span>
                    <div>
                        <div class="text-xs text-slate-400 font-medium">{{ $k[1] }}</div>
                        <div class="text-sm text-slate-700 mt-0.5">{{ $k[2] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Peta --}}
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <div class="p-4 border-b border-slate-100">
                <h3 class="font-bold text-slate-900 text-sm">🗺️ Lokasi SMKN 4 Bandung</h3>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9!2d107.6381!3d-6.9317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9adf177bf8d%3A0x437cac25e8feae!2sSMKN%204%20Bandung!5e0!3m2!1sid!2sid!4v1"
                width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>

        {{-- Kegiatan Animasi --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-5">
            <h3 class="font-bold text-slate-900 text-sm mb-3">📸 Kegiatan SMKN 4 Bandung</h3>
            <div class="grid grid-cols-3 gap-2">
                @foreach(['🎓','🏆','⚽','🎨','🤖','🎵'] as $emoji)
                <div class="aspect-square bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center text-3xl hover:scale-105 transition-transform cursor-pointer">
                    {{ $emoji }}
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection