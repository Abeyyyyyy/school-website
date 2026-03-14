@extends('layouts.app')

@section('title', 'Beranda — SMA Nusantara')

@section('content')

{{-- HERO SECTION --}}
<section class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-24">
  <div class="max-w-7xl mx-auto px-4 text-center">
    <h1 class="text-4xl md:text-6xl font-bold mb-4">
      Selamat Datang di <br>
      <span class="text-yellow-400">SMA Nusantara</span>
    </h1>
    <p class="text-xl text-blue-200 max-w-2xl mx-auto mb-8">
      Membentuk generasi cerdas, berkarakter, dan berdaya saing global.
    </p>
    <a href="#" class="btn-primary text-lg px-8 py-3 inline-block rounded-full">
      Pelajari Lebih Lanjut
    </a>
  </div>
</section>

{{-- STATS SECTION --}}
<section class="py-16 bg-white">
  <div class="max-w-7xl mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">

      <div class="card border-t-4 border-blue-600">
        <div class="text-5xl font-bold text-blue-600">{{ $data['total_students'] }}+</div>
        <div class="text-gray-600 mt-2 text-lg">Siswa Aktif</div>
      </div>

      <div class="card border-t-4 border-yellow-500">
        <div class="text-5xl font-bold text-yellow-500">{{ $data['total_teachers'] }}</div>
        <div class="text-gray-600 mt-2 text-lg">Guru Profesional</div>
      </div>

      <div class="card border-t-4 border-green-500">
        <div class="text-5xl font-bold text-green-500">{{ $data['total_extracurricular'] }}</div>
        <div class="text-gray-600 mt-2 text-lg">Ekstrakulikuler</div>
      </div>

    </div>
  </div>
</section>

@endsection