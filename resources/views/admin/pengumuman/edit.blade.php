@extends('admin.layouts.app')
@section('title', 'Edit Pengumuman')
@section('page-title', 'Edit Pengumuman')
@section('page-subtitle', 'Perbarui informasi pengumuman')

@section('content')

<div class="max-w-2xl">
    <div class="bg-white rounded-2xl border border-slate-200 p-6">

        @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm mb-6">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.pengumuman.update', $pengumuman) }}" method="POST" class="space-y-5">
            @csrf @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Judul <span class="text-red-500">*</span></label>
                <input type="text" name="judul" value="{{ old('judul', $pengumuman->judul) }}" required
                    class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Kategori</label>
                    <select name="kategori" required class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 bg-white">
                        @foreach($kategoriList as $k)
                        <option value="{{ $k }}" {{ old('kategori', $pengumuman->kategori) === $k ? 'selected' : '' }}>{{ $k }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Icon</label>
                    <select name="icon" required class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 bg-white">
                        @foreach($iconList as $i)
                        <option value="{{ $i }}" {{ old('icon', $pengumuman->icon) === $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ old('tanggal', $pengumuman->tanggal->format('Y-m-d')) }}" required
                        class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Status</label>
                    <select name="status" required class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 bg-white">
                        <option value="aktif" {{ old('status', $pengumuman->status) === 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status', $pengumuman->status) === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Isi Pengumuman</label>
                <textarea name="isi" rows="6" required
                    class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 resize-none">{{ old('isi', $pengumuman->isi) }}</textarea>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-red-600 text-white font-bold px-6 py-2.5 rounded-xl hover:bg-red-700 transition text-sm">
                    💾 Update Pengumuman
                </button>
                <a href="{{ route('admin.pengumuman.index') }}"
                    class="bg-slate-100 text-slate-600 font-semibold px-6 py-2.5 rounded-xl hover:bg-slate-200 transition text-sm">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection