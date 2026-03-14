<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ===== SHOW FORMS =====

    public function showLogin()
    {
        if (Auth::guard('student')->check()) {
            return redirect()->route('dashboard.index');
        }
        return view('landing.login');
    }

    public function showRegister()
    {
        if (Auth::guard('student')->check()) {
            return redirect()->route('dashboard.index');
        }
        return view('landing.register');
    }

    // ===== REGISTER =====

    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|string|size:10|unique:students',
            'email' => 'required|email|unique:students',
            'password' => 'required|min:8|confirmed',
            'asal_sekolah' => 'required|string|max:255',
            'pilihan_jurusan' => 'required|in:RPL,TKJ,DKV,TOI,TAV,TITL,TKTL',
            'no_telepon' => 'nullable|string|max:15',
        ], [
            'nisn.size' => 'NISN harus 10 digit.',
            'nisn.unique' => 'NISN sudah terdaftar.',
            'email.unique' => 'Email sudah digunakan.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        $student = Student::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nisn' => $request->nisn,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'asal_sekolah' => $request->asal_sekolah,
            'pilihan_jurusan' => $request->pilihan_jurusan,
            'no_telepon' => $request->no_telepon,
        ]);

        Auth::guard('student')->login($student);

        return redirect()->route('dashboard.index')->with('success', 'Selamat datang, ' . $student->nama_lengkap . '!');
    }

    // ===== LOGIN =====

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('student')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard.index'));
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');


    }

    // ===== LOGOUT =====

    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}