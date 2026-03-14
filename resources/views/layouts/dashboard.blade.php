<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — SMKN 4 Bandung</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .sidebar-link {
            @apply flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:bg-white/10 hover:text-white transition-all duration-200;
        }

        .sidebar-link.active {
            @apply bg-blue-600 text-white shadow-lg;
        }

        .submenu-link {
            @apply flex items-center gap-2 pl-10 pr-4 py-2 rounded-lg text-xs font-medium text-slate-400 hover:bg-white/10 hover:text-white transition-all;
        }

        .submenu-link.active {
            @apply text-blue-300;
        }
    </style>
</head>

<body class="bg-slate-100 text-slate-800">

    <div class="flex h-screen overflow-hidden">

        {{-- ===== SIDEBAR ===== --}}
        <aside class="w-64 bg-slate-900 flex flex-col flex-shrink-0 overflow-y-auto">

            {{-- Logo --}}
            <div class="px-5 py-5 border-b border-slate-700/50">
                <a href="{{ route('dashboard.index') }}" class="flex items-center gap-3">
                    <div
                        class="w-9 h-9 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold text-sm">
                        S4</div>
                    <div>
                        <div class="text-white font-bold text-sm leading-tight">SMKN 4 Bandung</div>
                        <div class="text-slate-400 text-xs">Portal Siswa</div>
                    </div>
                </a>
            </div>

            {{-- Student Info --}}
            <div class="px-5 py-4 border-b border-slate-700/50">
                <div class="flex items-center gap-3">
                    <div
                        class="w-9 h-9 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center text-white font-bold text-sm">
                        {{ strtoupper(substr(Auth::guard('student')->user()->nama_lengkap, 0, 1)) }}
                    </div>
                    <div class="overflow-hidden">
                        <div class="text-white text-sm font-semibold truncate">
                            {{ Auth::guard('student')->user()->nama_lengkap }}</div>
                        <div class="text-slate-400 text-xs">{{ Auth::guard('student')->user()->pilihan_jurusan }}</div>
                    </div>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 px-3 py-4 space-y-0.5">

                {{-- Dashboard --}}
                <a href="{{ route('dashboard.index') }}"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all
        {{ request()->routeIs('dashboard.index') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <span class="text-base">🏠</span>
                    <span>Dashboard</span>
                </a>

                {{-- AKADEMIK --}}
                <div class="pt-3 pb-1 px-4">
                    <span class="text-xs font-bold text-slate-600 uppercase tracking-widest">Akademik</span>
                </div>

                <button onclick="toggleMenu('akademik')"
                    class="w-full flex items-center justify-between px-4 py-2.5 rounded-xl text-sm font-medium transition-all
        {{ request()->routeIs('dashboard.akademik.*') ? 'bg-slate-800 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <span class="flex items-center gap-3"><span class="text-base">📚</span><span>Akademik</span></span>
                    <span id="akademik-arrow"
                        class="text-xs transition-transform duration-200 {{ request()->routeIs('dashboard.akademik.*') ? 'rotate-180' : '' }}">▼</span>
                </button>

                <div id="akademik-menu"
                    class="{{ request()->routeIs('dashboard.akademik.*') ? '' : 'hidden' }} pl-4 space-y-0.5 mt-0.5">
                    <a href="{{ route('dashboard.akademik.kurikulum') }}"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg text-xs font-medium transition-all
            {{ request()->routeIs('dashboard.akademik.kurikulum') ? 'text-blue-400 bg-slate-800' : 'text-slate-500 hover:bg-slate-800 hover:text-white' }}">
                        <span>📋</span> Kurikulum Sekolah
                    </a>
                    <a href="{{ route('dashboard.akademik.jadwal') }}"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg text-xs font-medium transition-all
            {{ request()->routeIs('dashboard.akademik.jadwal') ? 'text-blue-400 bg-slate-800' : 'text-slate-500 hover:bg-slate-800 hover:text-white' }}">
                        <span>🗓️</span> Jadwal Pelajaran
                    </a>
                    <a href="{{ route('dashboard.akademik.ekstrakulikuler') }}"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg text-xs font-medium transition-all
            {{ request()->routeIs('dashboard.akademik.ekstrakulikuler') ? 'text-blue-400 bg-slate-800' : 'text-slate-500 hover:bg-slate-800 hover:text-white' }}">
                        <span>⛺</span> Ekstrakulikuler
                    </a>
                    <a href="{{ route('dashboard.akademik.info-ujian') }}"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg text-xs font-medium transition-all
            {{ request()->routeIs('dashboard.akademik.info-ujian') ? 'text-blue-400 bg-slate-800' : 'text-slate-500 hover:bg-slate-800 hover:text-white' }}">
                        <span>📝</span> Info Ujian
                    </a>
                    <a href="{{ route('dashboard.akademik.mata-pelajaran') }}"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg text-xs font-medium transition-all
            {{ request()->routeIs('dashboard.akademik.mata-pelajaran') ? 'text-blue-400 bg-slate-800' : 'text-slate-500 hover:bg-slate-800 hover:text-white' }}">
                        <span>📖</span> Mata Pelajaran
                    </a>
                </div>

                {{-- INFORMASI --}}
                <div class="pt-4 pb-1 px-4">
                    <span class="text-xs font-bold text-slate-600 uppercase tracking-widest">Informasi</span>
                </div>

                <a href="{{ route('dashboard.pengumuman') }}"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all
        {{ request()->routeIs('dashboard.pengumuman') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <span class="text-base">📢</span> <span>Pengumuman</span>
                </a>

                <a href="{{ route('dashboard.kesiswaan') }}"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all
        {{ request()->routeIs('dashboard.kesiswaan') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <span class="text-base">🏫</span> <span>Kesiswaan</span>
                </a>

                <a href="{{ route('dashboard.ppdb') }}"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all
        {{ request()->routeIs('dashboard.ppdb') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <span class="text-base">📋</span> <span>PPDB</span>
                </a>

                {{-- LAYANAN --}}
                <div class="pt-4 pb-1 px-4">
                    <span class="text-xs font-bold text-slate-600 uppercase tracking-widest">Layanan</span>
                </div>

                <a href="{{ route('dashboard.elearning') }}"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all
        {{ request()->routeIs('dashboard.elearning') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <span class="text-base">💻</span> <span>E-Learning</span>
                </a>

                <a href="{{ route('dashboard.layanan') }}"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all
        {{ request()->routeIs('dashboard.layanan') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <span class="text-base">🛎️</span> <span>Layanan</span>
                </a>

                <a href="{{ route('dashboard.kontak') }}"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all
        {{ request()->routeIs('dashboard.kontak') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <span class="text-base">📞</span> <span>Kontak</span>
                </a>

                {{-- AKUN --}}
                <div class="pt-4 pb-1 px-4">
                    <span class="text-xs font-bold text-slate-600 uppercase tracking-widest">Akun</span>
                </div>

                <a href="{{ route('dashboard.profil') }}"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all
        {{ request()->routeIs('dashboard.profil') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <span class="text-base">👤</span> <span>Profil Saya</span>
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all text-red-400 hover:bg-red-500/10 hover:text-red-300">
                        <span class="text-base">🚪</span> <span>Logout</span>
                    </button>
                </form>

            </nav>
        </aside>

        {{-- ===== MAIN CONTENT ===== --}}
        <div class="flex-1 flex flex-col overflow-hidden">

            {{-- Top Bar --}}
            <header
                class="bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between flex-shrink-0">
                <div>
                    <h1 class="text-lg font-bold text-slate-900">@yield('page-title', 'Dashboard')</h1>
                    <p class="text-xs text-slate-400">@yield('page-subtitle', 'Portal Siswa SMKN 4 Bandung')</p>
                </div>
                <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block">
                        <div class="text-sm font-semibold text-slate-800">
                            {{ Auth::guard('student')->user()->nama_lengkap }}</div>
                        <div class="text-xs text-slate-400">NISN: {{ Auth::guard('student')->user()->nisn }}</div>
                    </div>
                    <div
                        class="w-9 h-9 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center text-white font-bold text-sm">
                        {{ strtoupper(substr(Auth::guard('student')->user()->nama_lengkap, 0, 1)) }}
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="flex-1 overflow-y-auto p-6">

                {{-- Flash Message --}}
                @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3 text-sm mb-6">
                        ✅ {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </main>

        </div>
    </div>

    <script>
        function toggleMenu(id) {
            const menu = document.getElementById(id + '-menu');
            const arrow = document.getElementById(id + '-arrow');
            menu.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180');
        }
    </script>

</body>

</html>