@extends('layouts.dashboard')
@section('title', 'Kesiswaan')
@section('page-title', 'Kesiswaan')
@section('page-subtitle', 'Visi, Misi, dan Panca Waluya SMKN 4 Bandung')

@section('content')

<div class="space-y-6 max-w-4xl">

    {{-- Visi --}}
    <div class="bg-white rounded-2xl border border-slate-200 p-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center text-xl">🎯</div>
            <h2 class="text-xl font-bold text-slate-900">Visi</h2>
        </div>
        <p class="text-slate-700 leading-relaxed text-sm bg-blue-50 rounded-xl p-4 border-l-4 border-blue-500">
            "Mewujudkan SMKN 4 Bandung sebagai sekolah unggulan yang menghasilkan lulusan berkompetensi tinggi, berkarakter mulia, berwawasan lingkungan, dan mampu bersaing di era global."
        </p>
    </div>

    {{-- Misi --}}
    <div class="bg-white rounded-2xl border border-slate-200 p-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center text-xl">🚀</div>
            <h2 class="text-xl font-bold text-slate-900">Misi</h2>
        </div>
        <div class="space-y-3">
            @foreach([
                'Menyelenggarakan pendidikan dan pelatihan kejuruan yang berkualitas sesuai standar industri.',
                'Mengembangkan kompetensi siswa melalui pembelajaran berbasis proyek dan praktik nyata.',
                'Membentuk karakter siswa yang disiplin, jujur, kreatif, dan bertanggung jawab.',
                'Membangun kemitraan strategis dengan dunia usaha dan dunia industri (DUDI).',
                'Menciptakan lingkungan belajar yang kondusif, inovatif, dan berwawasan lingkungan.',
                'Meningkatkan kompetensi pendidik dan tenaga kependidikan secara berkelanjutan.',
            ] as $i => $m)
            <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-50">
                <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center text-white text-xs font-bold flex-shrink-0 mt-0.5">{{ $i + 1 }}</div>
                <p class="text-slate-700 text-sm">{{ $m }}</p>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Panca Waluya --}}
    <div class="bg-white rounded-2xl border border-slate-200 p-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 bg-amber-100 rounded-xl flex items-center justify-center text-xl">⭐</div>
            <div>
                <h2 class="text-xl font-bold text-slate-900">Panca Waluya</h2>
                <p class="text-slate-400 text-xs">Lima nilai utama SMKN 4 Bandung</p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-5 gap-3">
            @foreach([
                ['W', 'Waluya', 'Sehat jasmani dan rohani dalam menjalankan setiap aktivitas', 'bg-blue-500'],
                ['A', 'Amanah', 'Dapat dipercaya dan bertanggung jawab dalam setiap tugas', 'bg-green-500'],
                ['L', 'Luhung', 'Berbudi pekerti luhur dan berakhlak mulia dalam keseharian', 'bg-purple-500'],
                ['U', 'Unggul', 'Berprestasi dan kompeten di bidang keahlian masing-masing', 'bg-amber-500'],
                ['Y', 'Yarsa', 'Siap dan tanggap menghadapi tantangan masa depan', 'bg-red-500'],
            ] as $p)
            <div class="text-center p-4 rounded-2xl border border-slate-200 hover:shadow-md transition">
                <div class="w-12 h-12 {{ $p[3] }} rounded-full flex items-center justify-center text-white font-bold text-xl mx-auto mb-2">{{ $p[0] }}</div>
                <div class="font-bold text-slate-900 text-sm">{{ $p[1] }}</div>
                <div class="text-slate-500 text-xs mt-1 leading-relaxed">{{ $p[2] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection