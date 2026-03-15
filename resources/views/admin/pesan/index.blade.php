@extends('admin.layouts.app')
@section('title', 'Pesan Masuk')
@section('page-title', 'Pesan Masuk')
@section('page-subtitle', 'Pesan dari siswa melalui form kontak')

@section('content')

@if($totalBelumBaca > 0)
<div class="bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm mb-5 flex items-center gap-2">
    🔔 Ada <strong>{{ $totalBelumBaca }} pesan</strong> yang belum dibaca.
</div>
@endif

<div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Pengirim</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Subjek & Pesan</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Waktu</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Status</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($pesans as $p)
                <tr class="hover:bg-slate-50 transition {{ $p->status === 'belum_dibaca' ? 'bg-blue-50/30' : '' }}">
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-700 font-bold text-xs">
                                {{ strtoupper(substr($p->nama, 0, 1)) }}
                            </div>
                            <div>
                                <div class="font-semibold text-slate-800 text-sm">{{ $p->nama }}</div>
                                <div class="text-xs text-slate-400">{{ $p->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4">
                        <div class="font-semibold text-slate-800 text-sm">{{ $p->subjek }}</div>
                        <div class="text-xs text-slate-400 mt-0.5 line-clamp-2 max-w-xs">{{ $p->pesan }}</div>
                    </td>
                    <td class="px-5 py-4 text-xs text-slate-400">{{ $p->created_at->diffForHumans() }}</td>
                    <td class="px-5 py-4">
                        @if($p->status === 'belum_dibaca')
                        <span class="bg-red-100 text-red-600 text-xs font-bold px-2 py-1 rounded-full">● Baru</span>
                        @else
                        <span class="bg-slate-100 text-slate-500 text-xs font-medium px-2 py-1 rounded-full">Dibaca</span>
                        @endif
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2">
                            @if($p->status === 'belum_dibaca')
                            <form action="{{ route('admin.pesan.baca', $p) }}" method="POST">
                                @csrf @method('PATCH')
                                <button type="submit" class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1.5 rounded-lg hover:bg-green-200 transition">
                                    ✓ Tandai Dibaca
                                </button>
                            </form>
                            @endif
                            <form action="{{ route('admin.pesan.destroy', $p) }}" method="POST"
                                onsubmit="return confirm('Hapus pesan ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-100 text-red-700 text-xs font-semibold px-3 py-1.5 rounded-lg hover:bg-red-200 transition">
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
                        <div>Belum ada pesan masuk</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($pesans->hasPages())
    <div class="px-5 py-4 border-t border-slate-100">
        {{ $pesans->links() }}
    </div>
    @endif
</div>

@endsection