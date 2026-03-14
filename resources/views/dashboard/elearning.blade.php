@extends('layouts.dashboard')
@section('title', 'E-Learning')
@section('page-title', 'E-Learning')
@section('page-subtitle', 'Platform pembelajaran digital SMKN 4 Bandung')

@section('content')

<div class="max-w-lg mx-auto">
    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">

        <div class="bg-gradient-to-br from-slate-800 to-blue-900 p-8 text-center text-white">
            <div class="text-6xl mb-4">💻</div>
            <h2 class="text-2xl font-bold">Portal E-Learning</h2>
            <p class="text-blue-200 text-sm mt-2">Masuk ke platform pembelajaran digital untuk mengakses materi, tugas, dan kuis.</p>
        </div>

        <div class="p-8">
            <div class="space-y-4 mb-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Username / Email</label>
                    <input type="text" placeholder="Masukkan username e-learning"
                        class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Password</label>
                    <input type="password" placeholder="Masukkan password"
                        class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button class="w-full bg-blue-700 text-white font-bold py-3 rounded-xl hover:bg-blue-800 transition text-sm">
                    Masuk ke E-Learning
                </button>
            </div>

            <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 text-center">
                <p class="text-amber-700 text-xs font-medium">🚧 Fitur E-Learning sedang dalam pengembangan.</p>
                <p class="text-amber-600 text-xs mt-1">Akan segera hadir setelah portal ini selesai.</p>
            </div>
        </div>
    </div>
</div>

@endsection