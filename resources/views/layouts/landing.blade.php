<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMKN 4 Bandung')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    {{-- NAVBAR --}}
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-800 rounded-lg flex items-center justify-center text-white font-bold text-sm">S4</div>
                    <div>
                        <div class="font-bold text-blue-900 text-sm leading-tight">SMKN 4 Bandung</div>
                        <div class="text-xs text-gray-500 leading-tight">Cerdas • Terampil • Berkarakter</div>
                    </div>
                </a>

                {{-- Menu Desktop --}}
                <div class="hidden md:flex items-center gap-1">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100' }} transition">Beranda</a>
                    <a href="{{ route('jurusan') }}" class="px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('jurusan') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100' }} transition">Jurusan</a>
                    <a href="{{ route('ekstrakulikuler') }}" class="px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('ekstrakulikuler') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100' }} transition">Ekstrakulikuler</a>
                    <a href="{{ route('testimoni') }}" class="px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('testimoni') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100' }} transition">Testimoni</a>
                </div>

                {{-- Auth Buttons --}}
                <div class="hidden md:flex items-center gap-2">
                    @auth('student')
                        <a href="{{ route('dashboard.index') }}" class="px-4 py-2 text-sm font-medium text-blue-700 hover:bg-blue-50 rounded-lg transition">Dashboard</a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-blue-700 border border-blue-200 rounded-lg hover:bg-blue-50 transition">Masuk</a>
                        <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition">Daftar</a>
                    @endauth
                </div>

            </div>
        </div>
    </nav>

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-blue-800 text-white">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center text-blue-900 font-bold text-sm">S4</div>
                        <div>
                            <div class="font-bold">SMKN 4 Bandung</div>
                            <div class="text-blue-300 text-sm">Est. 1965</div>
                        </div>
                    </div>
                    <p class="text-blue-200 text-sm">Membentuk generasi terampil, cerdas, dan berkarakter untuk menghadapi dunia industri global.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-3">Navigasi</h4>
                    <ul class="space-y-2 text-blue-200 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a></li>
                        <li><a href="{{ route('jurusan') }}" class="hover:text-white transition">Jurusan</a></li>
                        <li><a href="{{ route('ekstrakulikuler') }}" class="hover:text-white transition">Ekstrakulikuler</a></li>
                        <li><a href="{{ route('testimoni') }}" class="hover:text-white transition">Testimoni</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-3">Kontak</h4>
                    <ul class="space-y-2 text-blue-200 text-sm">
                        <li>📍 Jl. Kliningan No.6, Buah Batu, Bandung</li>
                        <li>📞 (022) 7304179</li>
                        <li>✉️ info@smkn4bdg.sch.id</li>
                        <li>🌐 smkn4bdg.sch.id</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-blue-800 mt-8 pt-6 text-center text-blue-300 text-sm">
                &copy; {{ date('Y') }} SMKN 4 Bandung. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>