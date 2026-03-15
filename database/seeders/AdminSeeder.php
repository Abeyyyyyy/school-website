<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'nama'     => 'Administrator',
            'email'    => 'admin@smkn4bdg.sch.id',
            'password' => Hash::make('admin123'),
        ]);
    }
}