@extends('layouts.dashboard')
@section('title', 'Jadwal Pelajaran')
@section('page-title', 'Jadwal Pelajaran')
@section('page-subtitle', 'Pilih kelas untuk melihat jadwal pelajaran')

@section('content')

{{-- Pilih Kelas --}}
<div class="bg-white rounded-2xl border border-slate-200 p-5 mb-6">
    <label class="block text-sm font-semibold text-slate-700 mb-2">Pilih Kelas</label>
    <select id="kelasSelect" onchange="filterKelas(this.value)"
        class="border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white w-full md:w-72">
        <option value="">-- Pilih Kelas --</option>
        @foreach($kelas as $k)
            <option value="{{ $k }}">{{ $k }}</option>
        @endforeach
    </select>
</div>

{{-- Jadwal Table --}}
<div id="jadwalTable" class="bg-white rounded-2xl border border-slate-200 overflow-hidden hidden">
    <div class="p-5 border-b border-slate-100 flex items-center justify-between">
        <h3 class="font-bold text-slate-900">Jadwal Pelajaran — <span id="namaKelas"></span></h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Hari</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Jam</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Mata Pelajaran</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Guru</th>
                </tr>
            </thead>
            <tbody id="jadwalBody" class="divide-y divide-slate-100"></tbody>
        </table>
    </div>
</div>

{{-- Empty State --}}
<div id="emptyState" class="text-center py-16 text-slate-400">
    <div class="text-5xl mb-3">🗓️</div>
    <p class="font-medium">Pilih kelas untuk melihat jadwal pelajaran</p>
</div>

<script>
const jadwal = @json($jadwal);

function filterKelas(kelas) {
    const table = document.getElementById('jadwalTable');
    const empty = document.getElementById('emptyState');
    const body = document.getElementById('jadwalBody');
    const namaKelas = document.getElementById('namaKelas');

    if (!kelas) {
        table.classList.add('hidden');
        empty.classList.remove('hidden');
        return;
    }

    namaKelas.textContent = kelas;
    body.innerHTML = '';

    const colors = ['bg-blue-50','bg-green-50','bg-amber-50','bg-purple-50','bg-red-50'];
    let colorIdx = 0;

    Object.entries(jadwal).forEach(([hari, pelajaran]) => {
        pelajaran.forEach((p, i) => {
            const row = document.createElement('tr');
            row.className = 'hover:bg-slate-50 transition';
            row.innerHTML = `
                <td class="px-4 py-3">
                    ${i === 0 ? `<span class="font-semibold text-blue-700 text-xs px-2 py-1 rounded-full bg-blue-50">${hari}</span>` : ''}
                </td>
                <td class="px-4 py-3 text-slate-500 text-xs">${p.jam}</td>
                <td class="px-4 py-3 font-medium text-slate-800">${p.mapel}</td>
                <td class="px-4 py-3 text-slate-500 text-xs">${p.guru}</td>
            `;
            body.appendChild(row);
        });
    });

    table.classList.remove('hidden');
    empty.classList.add('hidden');
}
</script>

@endsection