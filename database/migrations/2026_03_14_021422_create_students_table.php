<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nisn')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('asal_sekolah');
            $table->enum('pilihan_jurusan', ['RPL', 'TKJ', 'DKV', 'TOI', 'TAV', 'TITL', 'TKTL']);
            $table->string('no_telepon')->nullable();
            $table->enum('status', ['pending', 'aktif', 'nonaktif'])->default('pending');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};