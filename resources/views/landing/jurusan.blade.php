@extends('layouts.landing')
@section('title', 'Jurusan — SMKN 4 Bandung')

@section('content')

{{-- Header --}}
<div class="bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700 text-white py-16 text-center">
    <span class="inline-block bg-blue-600/50 text-blue-100 text-xs font-semibold px-4 py-2 rounded-full mb-4 border border-blue-500/30">Program Keahlian</span>
    <h1 class="text-4xl font-extrabold mt-2">Jurusan di SMKN 4 Bandung</h1>
    <p class="text-blue-200 mt-3 max-w-2xl mx-auto">6 program keahlian yang dirancang sesuai kebutuhan industri modern, siap mencetak tenaga profesional.</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-16">

    {{-- Slider Wrapper --}}
    <div class="relative">

        {{-- Tombol Kiri --}}
        <button onclick="slideKiri()" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-5 z-10 bg-white border border-gray-200 shadow-lg rounded-full w-12 h-12 flex items-center justify-center hover:bg-blue-50 hover:border-blue-300 transition">
            ←
        </button>

        {{-- Slider Track --}}
        <div class="overflow-hidden rounded-2xl">
            <div id="sliderTrack" class="flex gap-6 transition-transform duration-500 ease-in-out">
                @foreach($jurusan as $j)
                <div class="flex-shrink-0 w-full md:w-[calc(33.333%-1rem)] bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-xl hover:border-blue-300 transition group">
                    <div class="flex items-center justify-center w-16 h-16 bg-blue-50 rounded-2xl mb-4 text-4xl group-hover:bg-blue-100 transition">
                        {{ $j['icon'] }}
                    </div>
                    <span class="bg-blue-100 text-blue-700 text-xs font-bold px-2 py-0.5 rounded-full">{{ $j['kode'] }}</span>
                    <h3 class="font-bold text-gray-900 text-xl mt-3 mb-2">{{ $j['nama'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">{{ $j['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Tombol Kanan --}}
        <button onclick="slideKanan()" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-5 z-10 bg-white border border-gray-200 shadow-lg rounded-full w-12 h-12 flex items-center justify-center hover:bg-blue-50 hover:border-blue-300 transition">
            →
        </button>
    </div>

    {{-- Dots Indicator --}}
    <div class="flex justify-center gap-2 mt-8" id="dots"></div>

    {{-- CTA --}}
    <div class="mt-16 text-center bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700 rounded-3xl py-14 px-6 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-yellow-400/10 rounded-full -translate-y-32 translate-x-32 blur-3xl"></div>
        <div class="relative z-10">
            <span class="inline-block bg-yellow-400/20 text-yellow-300 text-xs font-semibold px-4 py-2 rounded-full mb-4 border border-yellow-400/30">🎓 Pendaftaran Dibuka</span>
            <h2 class="text-3xl font-extrabold text-white mb-3">Sudah tahu jurusan pilihanmu?</h2>
            <p class="text-blue-200 mb-8">Daftarkan dirimu sekarang dan mulai perjalanan menuju karir impianmu.</p>
            <a href="{{ route('register') }}" class="bg-yellow-400 text-blue-900 font-bold px-10 py-4 rounded-xl hover:bg-yellow-300 transition inline-block shadow-lg shadow-yellow-400/25">
                Daftar Sekarang — Gratis
            </a>
        </div>
    </div>
</div>

<script>
    const track = document.getElementById('sliderTrack');
    const dotsContainer = document.getElementById('dots');
    const itemsPerView = window.innerWidth >= 768 ? 3 : 1;
    const totalItems = {{ count($jurusan) }};
    const totalSlides = Math.ceil(totalItems / itemsPerView);
    let current = 0;
    let autoSlide;

    // Buat dots
    for (let i = 0; i < totalSlides; i++) {
        const dot = document.createElement('button');
        dot.className = `w-2.5 h-2.5 rounded-full transition-all ${i === 0 ? 'bg-blue-700 w-6' : 'bg-gray-300'}`;
        dot.onclick = () => goTo(i);
        dotsContainer.appendChild(dot);
    }

    function updateDots() {
        document.querySelectorAll('#dots button').forEach((dot, i) => {
            dot.className = `w-2.5 h-2.5 rounded-full transition-all ${i === current ? 'bg-blue-700 w-6' : 'bg-gray-300'}`;
        });
    }

    function goTo(index) {
        current = index;
        const itemWidth = track.children[0].offsetWidth + 24;
        track.style.transform = `translateX(-${current * itemsPerView * itemWidth}px)`;
        updateDots();
    }

    function slideKanan() {
        current = (current + 1) % totalSlides;
        goTo(current);
        resetAuto();
    }

    function slideKiri() {
        current = (current - 1 + totalSlides) % totalSlides;
        goTo(current);
        resetAuto();
    }

    function resetAuto() {
        clearInterval(autoSlide);
        autoSlide = setInterval(slideKanan, 3000);
    }

    autoSlide = setInterval(slideKanan, 3000);
</script>

@endsection