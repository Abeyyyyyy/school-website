<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::latest();

        if ($request->search) {
            $query->where('nama_lengkap', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%")
                  ->orWhere('nisn', 'like', "%{$request->search}%");
        }

        if ($request->jurusan) {
            $query->where('pilihan_jurusan', $request->jurusan);
        }

        $students = $query->paginate(15);
        return view('admin.students.index', compact('students'));
    }
}