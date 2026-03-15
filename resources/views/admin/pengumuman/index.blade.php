@extends('admin.layouts.app')
@section('title', 'Kelola Pengumuman')
@section('page-title', 'Kelola Pengumuman')
@section('page-subtitle', 'Buat, edit, dan hapus pengumuman sekolah')

@section('content')

{{-- Filter & Actions --}}
<div class="bg-white rounded-2xl border border-slate-200 p-5 mb-5">
    <form method="GET" class="flex flex-wrap gap-3 items-end">
        <div>
            <label class="block text-xs font-semibold text-slate-600 mb-1">Tahun</label>
            <select name="tahun" class="border border-slate-300 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 bg-white">
                <option value="">Semua Tahun</option>
                @foreach($tahunList as $t)
                <option value="{{ $t }}" {{ request('tahun') == $t ? 'selected' : '' }}>{{ $t }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-xs font-semibold text-slate-600 mb-1">Bulan</label>
            <select name="bulan" class="border border-slate-300 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 bg-white">
                <option value="">Semua Bulan</option>
                @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $i => $b)
                <option value="{{ $i+1 }}" {{ request('bulan') == $i+1 ? 'selected' : '' }}>{{ $b }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-xs font-semibold text-slate-600 mb-1">Kategori</label>
            <select name="kategori" class="border border-slate-300 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 bg-white">
                <option value="">Semua Kategori</option>
                @foreach($kategoriList as $k)
                <option value="{{ $k }}" {{ request('kategori') == $k ? 'selected' : '' }}>{{ $k }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-slate-700 text-white text-sm font-semibold px-4 py-2 rounded-xl hover:bg-slate-800 transition">Filter</button>
        <a href="{{ route('admin.pengumuman.index') }}" class="text-slate-400 text-sm hover:text-slate-600 py-2">Reset</a>
        <div class="flex-1"></div>
        <a href="{{ route('admin.pengumuman.create') }}"
            class="bg-red-600 text-white text-sm font-bold px-5 py-2 rounded-xl hover:bg-red-700 transition flex items-center gap-2">
            ➕ Tambah Pengumuman
        </a>
    </form>
</div>

{{-- Table --}}
<div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Pengumuman</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Kategori</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Tanggal</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Status</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($pengumumans as $p)
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">{{ $p->icon }}</span>
                            <div>
                                <div class="font-semibold text-slate-800">{{ $p->judul }}</div>
                                <div class="text-xs text-slate-400 mt-0.5 line-clamp-1">{{ Str::limit($p->isi, 60) }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4">
                        <span class="bg-blue-100 text-blue-700 text-xs font-medium px-2 py-1 rounded-full">{{ $p->kategori }}</span>
                    </td>
                    <td class="px-5 py-4 text-slate-500 text-xs">{{ $p->tanggal->format('d M Y') }}</td>
                    <td class="px-5 py-4">
                        <span class="text-xs font-medium px-2 py-1 rounded-full {{ $p->status === 'aktif' ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-500' }}">
                            {{ $p->status }}
                        </span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.pengumuman.edit', $p) }}"
                                class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1.5 rounded-lg hover:bg-blue-200 transition">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('admin.pengumuman.destroy', $p) }}" method="POST"
                                onsubmit="return confirm('Yakin hapus pengumuman ini?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="bg-red-100 text-red-700 text-xs font-semibold px-3 py-1.5 rounded-lg hover:bg-red-200 transition">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-5 py-12 text-center text-slate-400">
                        <div class="text-4xl mb-2">📭</div>
                        <div>Belum ada pengumuman</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($pengumumans->hasPages())
    <div class="px-5 py-4 border-t border-slate-100">
        {{ $pengumumans->withQueryString()->links() }}
    </div>
    @endif
</div>

@endsection