@extends('admin.layouts.app')
@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')
@section('page-subtitle', 'Selamat datang, ' . Auth::guard('admin')->user()->nama)

@section('content')

{{-- Stats --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:shadow-md transition">
        <div class="flex items-center justify-between mb-3">
            <span class="text-2xl">📢</span>
            <span class="text-xs text-slate-400">Total</span>
        </div>
        <div class="text-3xl font-bold text-slate-900">{{ $data['total_pengumuman'] }}</div>
        <div class="text-slate-500 text-xs mt-1">Pengumuman</div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:shadow-md transition">
        <div class="flex items-center justify-between mb-3">
            <span class="text-2xl">👥</span>
            <span class="text-xs text-slate-400">Total</span>
        </div>
        <div class="text-3xl font-bold text-slate-900">{{ $data['total_student'] }}</div>
        <div class="text-slate-500 text-xs mt-1">Siswa Terdaftar</div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:shadow-md transition">
        <div class="flex items-center justify-between mb-3">
            <span class="text-2xl">✉️</span>
            <span class="text-xs text-slate-400">Total</span>
        </div>
        <div class="text-3xl font-bold text-slate-900">{{ $data['total_pesan'] }}</div>
        <div class="text-slate-500 text-xs mt-1">Pesan Masuk</div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-red-200 bg-red-50 hover:shadow-md transition">
        <div class="flex items-center justify-between mb-3">
            <span class="text-2xl">🔔</span>
            <span class="text-xs text-red-400">Baru</span>
        </div>
        <div class="text-3xl font-bold text-red-600">{{ $data['pesan_belum_baca'] }}</div>
        <div class="text-red-500 text-xs mt-1">Pesan Belum Dibaca</div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Pengumuman Terbaru --}}
    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">
            <h3 class="font-bold text-slate-900">📢 Pengumuman Terbaru</h3>
            <a href="{{ route('admin.pengumuman.index') }}" class="text-red-600 text-xs font-semibold hover:underline">Lihat semua →</a>
        </div>
        <div class="divide-y divide-slate-100">
            @forelse($data['pengumuman_terbaru'] as $p)
            <div class="px-5 py-3 flex items-center justify-between hover:bg-slate-50 transition">
                <div class="flex items-center gap-3">
                    <span class="text-xl">{{ $p->icon }}</span>
                    <div>
                        <div class="text-sm font-semibold text-slate-800">{{ $p->judul }}</div>
                        <div class="text-xs text-slate-400">{{ $p->kategori }} · {{ $p->tanggal->format('d M Y') }}</div>
                    </div>
                </div>
                <span class="text-xs px-2 py-1 rounded-full {{ $p->status === 'aktif' ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-500' }}">
                    {{ $p->status }}
                </span>
            </div>
            @empty
            <div class="px-5 py-8 text-center text-slate-400 text-sm">Belum ada pengumuman</div>
            @endforelse
        </div>
        <div class="px-5 py-3 border-t border-slate-100">
            <a href="{{ route('admin.pengumuman.create') }}"
                class="inline-flex items-center gap-2 bg-red-600 text-white text-xs font-bold px-4 py-2 rounded-lg hover:bg-red-700 transition">
                ➕ Tambah Pengumuman
            </a>
        </div>
    </div>

    {{-- Pesan & Siswa --}}
    <div class="space-y-6">

        {{-- Pesan Belum Dibaca --}}
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-bold text-slate-900">✉️ Pesan Baru</h3>
                <a href="{{ route('admin.pesan.index') }}" class="text-red-600 text-xs font-semibold hover:underline">Semua →</a>
            </div>
            <div class="divide-y divide-slate-100">
                @forelse($data['pesan_terbaru'] as $p)
                <div class="px-5 py-3 hover:bg-slate-50 transition">
                    <div class="text-sm font-semibold text-slate-800 truncate">{{ $p->nama }}</div>
                    <div class="text-xs text-slate-400 truncate">{{ $p->subjek }}</div>
                    <div class="text-xs text-slate-300 mt-0.5">{{ $p->created_at->diffForHumans() }}</div>
                </div>
                @empty
                <div class="px-5 py-6 text-center text-slate-400 text-sm">Tidak ada pesan baru</div>
                @endforelse
            </div>
        </div>

        {{-- Siswa Terbaru --}}
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-bold text-slate-900">👥 Siswa Baru</h3>
                <a href="{{ route('admin.students.index') }}" class="text-red-600 text-xs font-semibold hover:underline">Semua →</a>
            </div>
            <div class="divide-y divide-slate-100">
                @forelse($data['student_terbaru'] as $s)
                <div class="px-5 py-3 flex items-center gap-3 hover:bg-slate-50 transition">
                    <div class="w-7 h-7 bg-blue-100 rounded-full flex items-center justify-center text-blue-700 font-bold text-xs">
                        {{ strtoupper(substr($s->nama_lengkap, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-xs font-semibold text-slate-800 truncate">{{ $s->nama_lengkap }}</div>
                        <div class="text-xs text-slate-400">{{ $s->pilihan_jurusan }}</div>
                    </div>
                </div>
                @empty
                <div class="px-5 py-6 text-center text-slate-400 text-sm">Belum ada siswa</div>
                @endforelse
            </div>
        </div>

    </div>
</div>

@endsection