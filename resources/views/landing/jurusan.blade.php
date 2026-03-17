@extends('layouts.landing')
@section('title', 'Jurusan — SMKN 4 Bandung')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-16">

    {{-- Header --}}
    <div class="text-center mb-14">
        <span class="text-blue-600 font-semibold text-sm uppercase tracking-widest">Program Keahlian</span>
        <h1 class="text-4xl font-extrabold text-gray-900 mt-2">Jurusan di SMKN 4 Bandung</h1>
        <p class="text-gray-500 mt-3 max-w-2xl mx-auto">6 program keahlian yang dirancang sesuai kebutuhan industri modern, siap mencetak tenaga profesional.</p>
    </div>

    {{-- Grid Jurusan --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($jurusan as $j)
        <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-lg hover:border-blue-300 transition group">
            <div class="flex items-start gap-4">
                <div class="text-4xl">{{ $j['icon'] }}</div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="bg-blue-100 text-blue-700 text-xs font-bold px-2 py-0.5 rounded-full">{{ $j['kode'] }}</span>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg">{{ $j['nama'] }}</h3>
                    <p class="text-gray-500 text-sm mt-2">{{ $j['desc'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- CTA --}}
    <div class="mt-14 text-center">
        <p class="text-gray-600 mb-4">Sudah tahu jurusan pilihanmu?</p>
        <a href="{{ route('register') }}" class="bg-blue-700 text-white font-bold px-8 py-3 rounded-xl hover:bg-blue-800 transition inline-block">
            Daftar Sekarang
        </a>
    </div>
</div>

@endsection