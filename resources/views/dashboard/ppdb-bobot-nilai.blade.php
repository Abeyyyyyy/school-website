@extends('layouts.dashboard')
@section('title', 'Kalkulator Bobot Nilai PPDB')
@section('page-title', 'PPDB 2025/2026')
@section('page-subtitle', 'Kalkulator Bobot Nilai Rapor untuk Seleksi PPDB')

@section('content')

{{-- Sub Navbar --}}
<div class="flex gap-2 mb-6 border-b border-slate-200 pb-0">
    <a href="{{ route('dashboard.ppdb') }}"
        class="px-4 py-2.5 text-sm font-semibold border-b-2 transition -mb-px border-transparent text-slate-500 hover:text-slate-800">
        📋 Info PPDB
    </a>
    <a href="{{ route('dashboard.ppdb.bobot-nilai') }}"
        class="px-4 py-2.5 text-sm font-semibold border-b-2 transition -mb-px border-blue-600 text-blue-600">
        🧮 Kalkulator Bobot Nilai
    </a>
</div>

<div class="max-w-4xl space-y-6" x-data="kalkulatorNilai()">

    {{-- Info Banner --}}
    <div class="bg-blue-50 border border-blue-200 rounded-2xl p-4 flex items-start gap-3">
        <span class="text-2xl">💡</span>
        <div>
            <div class="font-semibold text-blue-800 text-sm">Cara Penggunaan</div>
            <div class="text-blue-700 text-xs mt-1 leading-relaxed">
                Masukkan nilai rapor semester 1–5 untuk setiap mata pelajaran, lalu tambahkan poin prestasi jika ada.
                Kalkulator akan otomatis menghitung nilai rata-rata dan nilai seleksi akhir kamu.
            </div>
        </div>
    </div>

    {{-- Form Nilai Rapor --}}
    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
        <div class="bg-slate-800 px-6 py-4 flex items-center justify-between">
            <h3 class="text-white font-bold">📊 Input Nilai Rapor</h3>
            <span class="text-slate-400 text-xs">Semester 1 — 5</span>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-slate-200">
                            <th class="text-left py-3 pr-4 text-slate-600 font-semibold text-xs uppercase tracking-wide w-40">Mata Pelajaran</th>
                            <th class="py-3 px-2 text-center text-slate-600 font-semibold text-xs uppercase tracking-wide">Sem 1</th>
                            <th class="py-3 px-2 text-center text-slate-600 font-semibold text-xs uppercase tracking-wide">Sem 2</th>
                            <th class="py-3 px-2 text-center text-slate-600 font-semibold text-xs uppercase tracking-wide">Sem 3</th>
                            <th class="py-3 px-2 text-center text-slate-600 font-semibold text-xs uppercase tracking-wide">Sem 4</th>
                            <th class="py-3 px-2 text-center text-slate-600 font-semibold text-xs uppercase tracking-wide">Sem 5</th>
                            <th class="py-3 pl-4 text-center text-blue-600 font-bold text-xs uppercase tracking-wide">Rata-rata</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <template x-for="(mapel, index) in mapelList" :key="index">
                            <tr class="hover:bg-slate-50 transition">
                                <td class="py-3 pr-4">
                                    <div class="flex items-center gap-2">
                                        <span x-text="mapel.icon" class="text-base"></span>
                                        <span class="font-medium text-slate-700 text-sm" x-text="mapel.nama"></span>
                                    </div>
                                </td>
                                <template x-for="sem in 5" :key="sem">
                                    <td class="py-3 px-2">
                                        <input
                                            type="number"
                                            min="0" max="100"
                                            x-model.number="mapel.nilai[sem-1]"
                                            @input="hitung()"
                                            placeholder="–"
                                            class="w-16 text-center border border-slate-300 rounded-lg px-2 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    </td>
                                </template>
                                <td class="py-3 pl-4 text-center">
                                    <span class="font-bold text-blue-700 text-sm"
                                        x-text="mapel.rata > 0 ? mapel.rata.toFixed(1) : '–'">
                                    </span>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Tambah Mapel Custom --}}
    <div class="bg-white rounded-2xl border border-slate-200 p-5">
        <h3 class="font-bold text-slate-900 mb-3 text-sm">➕ Tambah Mata Pelajaran Lain (Opsional)</h3>
        <div class="flex gap-3">
            <input type="text" x-model="mapelBaru" placeholder="Nama mata pelajaran..."
                class="flex-1 border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button @click="tambahMapel()"
                class="bg-blue-700 text-white font-semibold px-5 py-2 rounded-xl hover:bg-blue-800 transition text-sm">
                Tambah
            </button>
        </div>
    </div>

    {{-- Bonus Prestasi --}}
    <div class="bg-white rounded-2xl border border-slate-200 p-6">
        <h3 class="font-bold text-slate-900 mb-4">🏆 Bonus Poin Prestasi <span class="text-slate-400 font-normal text-xs">(Opsional)</span></h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <template x-for="(prestasi, i) in prestasiList" :key="i">
                <label class="flex items-start gap-3 p-4 rounded-xl border border-slate-200 cursor-pointer hover:border-blue-300 hover:bg-blue-50 transition"
                    :class="prestasi.aktif ? 'border-blue-400 bg-blue-50' : ''">
                    <input type="checkbox" x-model="prestasi.aktif" @change="hitung()" class="mt-0.5 rounded">
                    <div>
                        <div class="text-sm font-semibold text-slate-800">
                            <span x-text="prestasi.icon"></span>
                            <span x-text="prestasi.nama"></span>
                        </div>
                        <div class="text-xs text-slate-500 mt-0.5" x-text="prestasi.keterangan"></div>
                        <div class="text-blue-600 font-bold text-sm mt-1">
                            +<span x-text="prestasi.poin"></span> poin
                        </div>
                    </div>
                </label>
            </template>
        </div>

        {{-- Custom bonus --}}
        <div class="mt-4 flex items-center gap-3">
            <span class="text-sm text-slate-600 font-medium">Poin tambahan lain:</span>
            <input type="number" x-model.number="bonusCustom" @input="hitung()" min="0" max="10"
                placeholder="0"
                class="w-24 border border-slate-300 rounded-xl px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-center">
            <span class="text-slate-400 text-sm">poin</span>
        </div>
    </div>

    {{-- Hasil Kalkulasi --}}
    <div class="bg-gradient-to-br from-slate-800 to-blue-900 rounded-2xl p-6 text-white">
        <h3 class="font-bold text-lg mb-5">📋 Hasil Kalkulasi</h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

            {{-- Rata-rata per mapel --}}
            <div class="bg-white/10 rounded-xl p-4">
                <div class="text-blue-200 text-xs font-medium mb-3">Rata-rata per Mata Pelajaran</div>
                <div class="space-y-2">
                    <template x-for="mapel in mapelList.filter(m => m.rata > 0)" :key="mapel.nama">
                        <div class="flex justify-between items-center">
                            <span class="text-slate-300 text-xs" x-text="mapel.nama"></span>
                            <span class="font-bold text-white text-sm" x-text="mapel.rata.toFixed(1)"></span>
                        </div>
                    </template>
                    <template x-if="mapelList.filter(m => m.rata > 0).length === 0">
                        <div class="text-slate-400 text-xs">Belum ada nilai diisi</div>
                    </template>
                </div>
            </div>

            {{-- Komponen nilai --}}
            <div class="bg-white/10 rounded-xl p-4">
                <div class="text-blue-200 text-xs font-medium mb-3">Komponen Nilai</div>
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <span class="text-slate-300 text-xs">Rata-rata Rapor</span>
                        <span class="font-bold text-white text-sm" x-text="nilaiRapor > 0 ? nilaiRapor.toFixed(2) : '–'"></span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-300 text-xs">Bonus Prestasi</span>
                        <span class="font-bold text-green-400 text-sm" x-text="'+' + totalBonus.toFixed(1)"></span>
                    </div>
                    <div class="border-t border-white/20 pt-2 flex justify-between items-center">
                        <span class="text-slate-300 text-xs">Total</span>
                        <span class="font-bold text-yellow-400 text-sm" x-text="nilaiAkhir > 0 ? nilaiAkhir.toFixed(2) : '–'"></span>
                    </div>
                </div>
            </div>

            {{-- Nilai akhir + prediksi --}}
            <div class="bg-white/10 rounded-xl p-4 flex flex-col items-center justify-center text-center">
                <div class="text-blue-200 text-xs font-medium mb-2">Nilai Seleksi Akhir</div>
                <div class="text-5xl font-extrabold"
                    :class="nilaiAkhir >= 85 ? 'text-green-400' : nilaiAkhir >= 75 ? 'text-yellow-400' : nilaiAkhir > 0 ? 'text-red-400' : 'text-slate-400'"
                    x-text="nilaiAkhir > 0 ? nilaiAkhir.toFixed(2) : '–'">
                </div>
                <div class="mt-3 text-xs font-semibold px-3 py-1 rounded-full"
                    :class="nilaiAkhir >= 85 ? 'bg-green-400/20 text-green-300' : nilaiAkhir >= 75 ? 'bg-yellow-400/20 text-yellow-300' : nilaiAkhir > 0 ? 'bg-red-400/20 text-red-300' : 'bg-white/10 text-slate-400'"
                    x-text="nilaiAkhir >= 85 ? '🎉 Peluang Sangat Baik' : nilaiAkhir >= 75 ? '👍 Peluang Cukup Baik' : nilaiAkhir > 0 ? '📚 Perlu Ditingkatkan' : 'Isi nilai di atas'">
                </div>
            </div>

        </div>

        {{-- Tombol Reset --}}
        <div class="flex gap-3">
            <button @click="reset()"
                class="bg-white/10 hover:bg-white/20 text-white font-semibold px-5 py-2.5 rounded-xl transition text-sm">
                🔄 Reset Semua
            </button>
            <button @click="salinHasil()"
                class="bg-blue-500 hover:bg-blue-400 text-white font-semibold px-5 py-2.5 rounded-xl transition text-sm">
                📋 Salin Hasil
            </button>
        </div>

    </div>

</div>

{{-- Alpine.js --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script>
function kalkulatorNilai() {
    return {
        mapelList: [
            { nama: 'Bahasa Indonesia', icon: '📖', nilai: [null, null, null, null, null], rata: 0 },
            { nama: 'Matematika',       icon: '📐', nilai: [null, null, null, null, null], rata: 0 },
            { nama: 'Bahasa Inggris',   icon: '🌐', nilai: [null, null, null, null, null], rata: 0 },
            { nama: 'IPA',              icon: '🔬', nilai: [null, null, null, null, null], rata: 0 },
        ],
        prestasiList: [
            { nama: 'Juara 1 Lomba', icon: '🥇', keterangan: 'Tingkat Kab/Kota ke atas', poin: 3, aktif: false },
            { nama: 'Juara 2 Lomba', icon: '🥈', keterangan: 'Tingkat Kab/Kota ke atas', poin: 2, aktif: false },
            { nama: 'Juara 3 Lomba', icon: '🥉', keterangan: 'Tingkat Kab/Kota ke atas', poin: 1, aktif: false },
            { nama: 'Olimpiade Sains', icon: '🔭', keterangan: 'Sertifikat resmi', poin: 2, aktif: false },
            { nama: 'Prestasi Olahraga', icon: '⚽', keterangan: 'Tingkat resmi', poin: 1, aktif: false },
            { nama: 'Sertifikat Keahlian', icon: '📜', keterangan: 'Sertifikat kompetensi', poin: 1, aktif: false },
        ],
        bonusCustom: 0,
        nilaiRapor: 0,
        totalBonus: 0,
        nilaiAkhir: 0,
        mapelBaru: '',

        hitung() {
            // Hitung rata-rata per mapel
            this.mapelList.forEach(mapel => {
                const terisi = mapel.nilai.filter(n => n !== null && n !== '' && !isNaN(n));
                if (terisi.length > 0) {
                    mapel.rata = terisi.reduce((a, b) => a + Number(b), 0) / terisi.length;
                } else {
                    mapel.rata = 0;
                }
            });

            // Hitung rata-rata semua mapel yang terisi
            const mapelTerisi = this.mapelList.filter(m => m.rata > 0);
            if (mapelTerisi.length > 0) {
                this.nilaiRapor = mapelTerisi.reduce((a, m) => a + m.rata, 0) / mapelTerisi.length;
            } else {
                this.nilaiRapor = 0;
            }

            // Hitung total bonus
            const bonusPrestasi = this.prestasiList
                .filter(p => p.aktif)
                .reduce((a, p) => a + p.poin, 0);
            this.totalBonus = bonusPrestasi + (Number(this.bonusCustom) || 0);

            // Nilai akhir (max 100)
            this.nilaiAkhir = Math.min(100, this.nilaiRapor + this.totalBonus);
        },

        tambahMapel() {
            if (this.mapelBaru.trim() === '') return;
            this.mapelList.push({
                nama: this.mapelBaru.trim(),
                icon: '📝',
                nilai: [null, null, null, null, null],
                rata: 0
            });
            this.mapelBaru = '';
        },

        reset() {
            this.mapelList = [
                { nama: 'Bahasa Indonesia', icon: '📖', nilai: [null, null, null, null, null], rata: 0 },
                { nama: 'Matematika',       icon: '📐', nilai: [null, null, null, null, null], rata: 0 },
                { nama: 'Bahasa Inggris',   icon: '🌐', nilai: [null, null, null, null, null], rata: 0 },
                { nama: 'IPA',              icon: '🔬', nilai: [null, null, null, null, null], rata: 0 },
            ];
            this.prestasiList.forEach(p => p.aktif = false);
            this.bonusCustom = 0;
            this.nilaiRapor = 0;
            this.totalBonus = 0;
            this.nilaiAkhir = 0;
        },

        salinHasil() {
            const teks = `Hasil Kalkulator Bobot Nilai PPDB SMKN 4 Bandung\n` +
                `==========================================\n` +
                this.mapelList.filter(m => m.rata > 0)
                    .map(m => `${m.nama}: ${m.rata.toFixed(1)}`).join('\n') +
                `\n------------------------------------------\n` +
                `Rata-rata Rapor  : ${this.nilaiRapor.toFixed(2)}\n` +
                `Bonus Prestasi   : +${this.totalBonus.toFixed(1)}\n` +
                `Nilai Seleksi    : ${this.nilaiAkhir.toFixed(2)}\n` +
                `==========================================`;
            navigator.clipboard.writeText(teks);
            alert('✅ Hasil berhasil disalin!');
        }
    }
}
</script>

@endsection