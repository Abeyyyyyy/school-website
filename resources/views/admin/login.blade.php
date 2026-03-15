<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — SMKN 4 Bandung</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-900 min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md">

        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-red-600 rounded-2xl flex items-center justify-center text-white font-bold text-2xl mx-auto mb-4">S4</div>
            <h1 class="text-white text-2xl font-bold">Admin Panel</h1>
            <p class="text-slate-400 text-sm mt-1">SMKN 4 Bandung — Restricted Access</p>
        </div>

        <div class="bg-slate-800 rounded-2xl border border-slate-700 p-8">

            @if($errors->any())
            <div class="bg-red-500/20 border border-red-500/30 text-red-400 rounded-xl px-4 py-3 text-sm mb-6">
                {{ $errors->first() }}
            </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-slate-300 mb-1">Email Admin</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full bg-slate-700 border border-slate-600 rounded-xl px-4 py-2.5 text-sm text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-red-500"
                        placeholder="admin@smkn4bdg.sch.id">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-300 mb-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full bg-slate-700 border border-slate-600 rounded-xl px-4 py-2.5 text-sm text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-red-500"
                        placeholder="Password">
                </div>
                <button type="submit"
                    class="w-full bg-red-600 text-white font-bold py-3 rounded-xl hover:bg-red-700 transition text-sm mt-2">
                    Masuk sebagai Admin
                </button>
            </form>

            <div class="mt-6 pt-4 border-t border-slate-700 text-center">
                <a href="{{ route('home') }}" class="text-slate-400 text-xs hover:text-slate-300 transition">
                    ← Kembali ke halaman utama
                </a>
            </div>
        </div>

        <p class="text-center text-slate-600 text-xs mt-6">
            ⚠️ Halaman ini hanya untuk administrator sekolah
        </p>
    </div>

</body>
</html>