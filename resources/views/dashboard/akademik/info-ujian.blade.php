@extends('layouts.dashboard')
@section('title', 'Info Ujian')
@section('page-title', 'Info Ujian')
@section('page-subtitle', 'Informasi ujian dari pemerintah dan sekolah')

@section('content')

<div class="max-w-4xl space-y-4">
    @foreach($ujian as $u)
    <div class="bg-white rounded-2xl border border-slate-200 p-5 hover:shadow-md transition">
        <div class="flex items-start justify-between gap-4">
            <div class="flex-1">
                <div class="flex items-center gap-2 mb-2">
                    <span class="text-xs font-semibold px-2 py-1 rounded-full
                        {{ $u['status'] === 'Berlangsung' ? 'bg-green-100 text-green-700' :
                           ($u['status'] === 'Selesai' ? 'bg-slate-100 text-slate-500' : 'bg-blue-100 text-blue-700') }}">
                        ● {{ $u['status'] }}
                    </span>
                    <span class="text-xs text-slate-400">{{ $u['sumber'] }}</span>
                </div>
                <h3 class="font-bold text-slate-900 mb-1">{{ $u['judul'] }}</h3>
                <p class="text-slate-500 text-xs leading-relaxed">{{ $u['desc'] }}</p>
            </div>
            <div class="text-right flex-shrink-0">
                <div class="text-xs text-slate-400">Tanggal</div>
                <div class="font-semibold text-slate-800 text-sm mt-0.5">{{ $u['tanggal'] }}</div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection