@extends('admin.layouts.app')
@section('title', 'Data Siswa')
@section('page-title', 'Data Siswa Terdaftar')
@section('page-subtitle', 'Daftar siswa yang sudah mendaftar — hanya nama dan email yang ditampilkan')

@section('content')

{{-- Search & Filter --}}
<div class="bg-white rounded-2xl border border-slate-200 p-5 mb-5">
    <form method="GET" class="flex gap-3 flex-wrap">
        <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Cari nama, email, atau NISN..."
            class="border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 flex-1 min-w-48">
        <select name="jurusan" class="border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 bg-white">
            <option value="">Semua Jurusan</option>
            @foreach(['RPL','TKJ','DKV','TOI','TAV','TITL','TKTL'] as $j)
            <option value="{{ $j }}" {{ request('jurusan') === $j ? 'selected' : '' }}>{{ $j }}</option>
            @endforeach
        </select>
        <button type="submit" class="bg-slate-700 text-white text-sm font-semibold px-4 py-2 rounded-xl hover:bg-slate-800 transition">Cari</button>
        <a href="{{ route('admin.students.index') }}" class="text-slate-400 text-sm hover:text-slate-600 py-2">Reset</a>
    </form>
</div>

<div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
    <div class="px-5 py-3 border-b border-slate-100 flex items-center justify-between">
        <span class="text-sm text-slate-500">Total: <strong class="text-slate-800">{{ $students->total() }}</strong> siswa</span>
        <div class="bg-amber-50 border border-amber-200 text-amber-700 text-xs px-3 py-1 rounded-full">
            🔒 Password tidak ditampilkan
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase">#</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Nama</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Email</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Jurusan</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Status</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Terdaftar</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($students as $i => $s)
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-5 py-3 text-slate-400 text-xs">{{ $students->firstItem() + $i }}</td>
                    <td class="px-5 py-3">
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 bg-blue-100 rounded-full flex items-center justify-center text-blue-700 font-bold text-xs">
                                {{ strtoupper(substr($s->nama_lengkap, 0, 1)) }}
                            </div>
                            <span class="font-semibold text-slate-800">{{ $s->nama_lengkap }}</span>
                        </div>
                    </td>
                    <td class="px-5 py-3 text-slate-500 text-xs">{{ $s->email }}</td>
                    <td class="px-5 py-3">
                        <span class="bg-blue-100 text-blue-700 text-xs font-bold px-2 py-1 rounded-full">{{ $s->pilihan_jurusan }}</span>
                    </td>
                    <td class="px-5 py-3">
                        <span class="text-xs font-medium px-2 py-1 rounded-full
                            {{ $s->status === 'aktif' ? 'bg-green-100 text-green-700' : ($s->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-slate-100 text-slate-500') }}">
                            {{ ucfirst($s->status) }}
                        </span>
                    </td>
                    <td class="px-5 py-3 text-xs text-slate-400">{{ $s->created_at->format('d M Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-12 text-center text-slate-400">
                        <div class="text-4xl mb-2">👥</div>
                        <div>Belum ada siswa terdaftar</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($students->hasPages())
    <div class="px-5 py-4 border-t border-slate-100">
        {{ $students->withQueryString()->links() }}
    </div>
    @endif
</div>

@endsection