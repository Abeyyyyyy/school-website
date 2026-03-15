<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengumuman::with('admin')->latest();

        // Filter bulan
        if ($request->bulan && $request->tahun) {
            $query->perBulan($request->bulan, $request->tahun);
        } elseif ($request->tahun) {
            $query->perTahun($request->tahun);
        }

        // Filter kategori
        if ($request->kategori) {
            $query->where('kategori', $request->kategori);
        }

        $pengumumans = $query->paginate(10);
        $tahunList   = Pengumuman::selectRaw('YEAR(tanggal) as tahun')->distinct()->orderBy('tahun', 'desc')->pluck('tahun');
        $kategoriList = ['Acara', 'Prestasi', 'Akademik', 'Kegiatan', 'PPDB', 'Olahraga', 'Umum'];

        return view('admin.pengumuman.index', compact('pengumumans', 'tahunList', 'kategoriList'));
    }

    public function create()
    {
        $kategoriList = ['Acara', 'Prestasi', 'Akademik', 'Kegiatan', 'PPDB', 'Olahraga', 'Umum'];
        $iconList     = ['📢', '🏆', '📝', '🎉', '🏭', '📋', '⚽', '🎓', '🔔', '📌'];
        return view('admin.pengumuman.create', compact('kategoriList', 'iconList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'isi'      => 'required|string',
            'kategori' => 'required|string',
            'icon'     => 'required|string',
            'tanggal'  => 'required|date',
            'status'   => 'required|in:aktif,nonaktif',
        ]);

        Pengumuman::create([
            ...$request->only('judul', 'isi', 'kategori', 'icon', 'tanggal', 'status'),
            'admin_id' => Auth::guard('admin')->id(),
        ]);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    public function edit(Pengumuman $pengumuman)
    {
        $kategoriList = ['Acara', 'Prestasi', 'Akademik', 'Kegiatan', 'PPDB', 'Olahraga', 'Umum'];
        $iconList     = ['📢', '🏆', '📝', '🎉', '🏭', '📋', '⚽', '🎓', '🔔', '📌'];
        return view('admin.pengumuman.edit', compact('pengumuman', 'kategoriList', 'iconList'));
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'isi'      => 'required|string',
            'kategori' => 'required|string',
            'icon'     => 'required|string',
            'tanggal'  => 'required|date',
            'status'   => 'required|in:aktif,nonaktif',
        ]);

        $pengumuman->update($request->only('judul', 'isi', 'kategori', 'icon', 'tanggal', 'status'));

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil diupdate!');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();
        return back()->with('success', 'Pengumuman berhasil dihapus!');
    }
}