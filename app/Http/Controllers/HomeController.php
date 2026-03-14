<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'school_name'          => 'SMA Nusantara',
            'total_students'       => 1200,
            'total_teachers'       => 85,
            'total_extracurricular'=> 24,
        ];

        return view('pages.home', compact('data'));
    }
}