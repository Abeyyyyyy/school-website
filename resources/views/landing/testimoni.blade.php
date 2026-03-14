@extends('layouts.landing')
@section('title', 'Testimoni Alumni — SMKN 4 Bandung')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-16">

    <div class="text-center mb-14">
        <span class="text-blue-600 font-semibold text-sm uppercase tracking-widest">Kata Mereka</span>
        <h1 class="text-4xl font-extrabold text-gray-900 mt-2">Testimoni Alumni</h1>
        <p class="text-gray-500 mt-3 max-w-2xl mx-auto">Dengarkan pengalaman nyata dari alumni SMKN 4 Bandung yang kini berkarya di berbagai bidang.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($testimoni as $t)
        <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-lg transition flex flex-col">
            <div class="text-4xl mb-1">{{ $t['foto'] }}</div>
            <p class="text-gray-600 text-sm leading-relaxed flex-1 mb-4">"{{ $t['pesan'] }}"</p>
            <div class="border-t border-gray-100 pt-4">
                <div class="font-bold text-gray-900">{{ $t['nama'] }}</div>
                <div class="text-blue-600 text-xs font-medium">{{ $t['jurusan'] }}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection