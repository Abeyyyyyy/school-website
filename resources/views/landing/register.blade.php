@extends('layouts.landing')
@section('title', 'Daftar — SMKN 4 Bandung')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-blue-50 to-white flex items-center justify-center px-4 py-16">
    <div class="w-full max-w-lg">

        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8">

            {{-- Header --}}
            <div class="text-center mb-8">
                <div class="w-14 h-14 bg-blue-800 rounded-2xl flex items-center justify-center text-white font-bold text-xl mx-auto mb-4">S4</div>
                <h1 class="text-2xl font-extrabold text-gray-900">Buat Akun Baru</h1>
                <p class="text-gray-500 text-sm mt-1">Daftarkan dirimu sebagai calon siswa SMKN 4 Bandung</p>
            </div>

            {{-- Errors --}}
            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm mb-6">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
                @csrf

                {{-- Nama Lengkap --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan nama lengkap">
                </div>

                {{-- NISN --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">NISN <span class="text-red-500">*</span></label>
                    <input type="text" name="nisn" value="{{ old('nisn') }}" required maxlength="10"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="10 digit NISN">
                    <p class="text-xs text-gray-400 mt-1">Nomor Induk Siswa Nasional (10 digit)</p>
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="email@example.com">
                </div>

                {{-- Asal Sekolah --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Asal Sekolah (SMP) <span class="text-red-500">*</span></label>
                    <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}" required
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Contoh: SMPN 1 Bandung">
                </div>

                {{-- Pilihan Jurusan --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Pilihan Jurusan <span class="text-red-500">*</span></label>
                    <select name="pilihan_jurusan" required
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        <option value="" disabled {{ old('pilihan_jurusan') ? '' : 'selected' }}>-- Pilih Jurusan --</option>
                        @foreach(['RPL' => 'RPL — Rekayasa Perangkat Lunak', 'TKJ' => 'TKJ — Teknik Komputer & Jaringan', 'DKV' => 'DKV — Desain Komunikasi Visual', 'TOI' => 'TOI — Teknik Otomasi Industri', 'TAV' => 'TAV — Teknik Audio Video', 'TITL' => 'TITL — Teknik Instalasi Tenaga Listrik', 'TKTL' => 'TKTL — Teknik Konstruksi & Tata Lingkungan'] as $val => $label)
                            <option value="{{ $val }}" {{ old('pilihan_jurusan') === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- No Telepon --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">No. Telepon <span class="text-gray-400 font-normal">(opsional)</span></label>
                    <input type="text" name="no_telepon" value="{{ old('no_telepon') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="08xxxxxxxxxx">
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Password <span class="text-red-500">*</span></label>
                    <input type="password" name="password" required
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Minimal 8 karakter">
                </div>

                {{-- Konfirmasi Password --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Password <span class="text-red-500">*</span></label>
                    <input type="password" name="password_confirmation" required
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Ulangi password">
                </div>

                <button type="submit"
                    class="w-full bg-blue-700 text-white font-bold py-3 rounded-xl hover:bg-blue-800 transition text-sm mt-2">
                    Buat Akun & Masuk
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-6">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">Masuk di sini</a>
            </p>
        </div>
    </div>
</div>

@endsection