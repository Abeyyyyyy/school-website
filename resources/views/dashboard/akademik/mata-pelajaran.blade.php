@extends('layouts.dashboard')
@section('title', 'Mata Pelajaran')
@section('page-title', 'Daftar Mata Pelajaran')
@section('page-subtitle', 'Mata pelajaran per jenjang kelas di SMKN 4 Bandung')

@section('content')

<div class="space-y-6 max-w-4xl">
    @foreach($mapel as $kelas => $kelompok)
    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
        <div class="bg-slate-800 px-6 py-4">
            <h2 class="text-white font-bold">Kelas {{ $kelas }}</h2>
        </div>
        <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-5">
            @foreach($kelompok as $kategori => $daftar)
            <div>
                <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-3">{{ $kategori }}</h3>
                <div class="space-y-2">
                    @foreach($daftar as $i => $mapelItem)
                    <div class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-slate-50 transition">
                        <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center text-blue-700 font-bold text-xs flex-shrink-0">
                            {{ $i + 1 }}
                        </div>
                        <span class="text-sm text-slate-700">{{ $mapelItem }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>

@endsection