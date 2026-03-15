<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — SMKN 4 Bandung</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-100">

<div class="flex h-screen overflow-hidden">

    {{-- SIDEBAR --}}
    <aside class="w-60 bg-slate-900 flex flex-col flex-shrink-0">

        {{-- Logo --}}
        <div class="px-5 py-5 border-b border-slate-700/50">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-red-600 rounded-xl flex items-center justify-center text-white font-bold text-sm">S4</div>
                <div>
                    <div class="text-white font-bold text-sm">Admin Panel</div>
                    <div class="text-slate-400 text-xs">SMKN 4 Bandung</div>
                </div>
            </div>
        </div>

        {{-- Admin Info --}}
        <div class="px-5 py-4 border-b border-slate-700/50">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center text-white font-bold text-xs">
                    {{ strtoupper(substr(Auth::guard('admin')->user()->nama, 0, 1)) }}
                </div>
                <div>
                    <div class="text-white text-xs font-semibold truncate">{{ Auth::guard('admin')->user()->nama }}</div>
                    <div class="text-red-400 text-xs">Administrator</div>
                </div>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-3 py-4 space-y-0.5 overflow-y-auto">

            <div class="px-3 pb-2">
                <span class="text-xs font-bold text-slate-600 uppercase tracking-widest">Menu Utama</span>
            </div>

            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition
                {{ request()->routeIs('admin.dashboard') ? 'bg-red-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <span>🏠</span> Dashboard
            </a>

            <div class="px-3 pt-4 pb-2">
                <span class="text-xs font-bold text-slate-600 uppercase tracking-widest">Kelola Konten</span>
            </div>

            <a href="{{ route('admin.pengumuman.index') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition
                {{ request()->routeIs('admin.pengumuman.*') ? 'bg-red-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <span>📢</span> Pengumuman
            </a>

            <div class="px-3 pt-4 pb-2">
                <span class="text-xs font-bold text-slate-600 uppercase tracking-widest">Data & Pesan</span>
            </div>

            <a href="{{ route('admin.pesan.index') }}"
                class="flex items-center justify-between px-4 py-2.5 rounded-xl text-sm font-medium transition
                {{ request()->routeIs('admin.pesan.*') ? 'bg-red-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <span class="flex items-center gap-3"><span>✉️</span> Pesan Masuk</span>
                @php $belumBaca = \App\Models\Pesan::where('status','belum_dibaca')->count(); @endphp
                @if($belumBaca > 0)
                <span class="bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ $belumBaca }}</span>
                @endif
            </a>

            <a href="{{ route('admin.students.index') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition
                {{ request()->routeIs('admin.students.*') ? 'bg-red-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <span>👥</span> Data Siswa
            </a>

            <div class="pt-4 border-t border-slate-700/50 mt-2">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-red-400 hover:bg-red-500/10 hover:text-red-300 transition">
                        <span>🚪</span> Logout
                    </button>
                </form>
            </div>

        </nav>
    </aside>

    {{-- MAIN --}}
    <div class="flex-1 flex flex-col overflow-hidden">

        {{-- Topbar --}}
        <header class="bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between flex-shrink-0">
            <div>
                <h1 class="text-lg font-bold text-slate-900">@yield('page-title', 'Dashboard')</h1>
                <p class="text-xs text-slate-400">@yield('page-subtitle', 'Admin Panel SMKN 4 Bandung')</p>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center text-white font-bold text-xs">
                    {{ strtoupper(substr(Auth::guard('admin')->user()->nama, 0, 1)) }}
                </div>
                <div class="text-sm font-semibold text-slate-800">{{ Auth::guard('admin')->user()->nama }}</div>
            </div>
        </header>

        {{-- Content --}}
        <main class="flex-1 overflow-y-auto p-6">

            @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3 text-sm mb-6 flex items-center gap-2">
                ✅ {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm mb-6">
                ❌ {{ session('error') }}
            </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

</body>
</html>