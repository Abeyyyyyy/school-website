<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;

class PesanController extends Controller
{
    public function index()
    {
        $pesans = Pesan::with('student')->latest()->paginate(15);
        $totalBelumBaca = Pesan::where('status', 'belum_dibaca')->count();
        return view('admin.pesan.index', compact('pesans', 'totalBelumBaca'));
    }

    public function tandaiBaca(Pesan $pesan)
    {
        $pesan->update(['status' => 'dibaca']);
        return back()->with('success', 'Pesan ditandai sudah dibaca.');
    }

    public function destroy(Pesan $pesan)
    {
        $pesan->delete();
        return back()->with('success', 'Pesan berhasil dihapus.');
    }
}