@extends('layouts.landing')
@section('title', 'Masuk — SMKN 4 Bandung')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-blue-50 to-white flex items-center justify-center px-4 py-16">
    <div class="w-full max-w-md">

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8">

            {{-- Header --}}
            <div class="text-center mb-8">
                <div class="w-14 h-14 bg-blue-800 rounded-2xl flex items-center justify-center text-white font-bold text-xl mx-auto mb-4">S4</div>
                <h1 class="text-2xl font-extrabold text-gray-900">Masuk ke Akun</h1>
                <p class="text-gray-500 text-sm mt-1">Selamat datang kembali di SMKN 4 Bandung</p>
            </div>

            {{-- Error --}}
            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm mb-6">
                {{ $errors->first() }}
            </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="email@example.com">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Masukkan password">
                </div>

                <div class="flex items-center gap-2">
                    <input type="checkbox" name="remember" id="remember" class="rounded">
                    <label for="remember" class="text-sm text-gray-600">Ingat saya</label>
                </div>

                <button type="submit"
                    class="w-full bg-blue-700 text-white font-bold py-3 rounded-xl hover:bg-blue-800 transition text-sm mt-2">
                    Masuk
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-6">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">Daftar di sini</a>
            </p>
        </div>
    </div>
</div>

@endsection