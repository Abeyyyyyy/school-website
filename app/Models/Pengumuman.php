<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pengumuman extends Model
{
     protected $table = 'pengumumans'; 
    protected $fillable = [
        'judul', 'isi', 'kategori', 'icon', 'tanggal', 'status', 'admin_id'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    // Scope filter per bulan
    public function scopePerBulan($query, $bulan, $tahun)
    {
        return $query->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun);
    }

    // Scope filter per tahun
    public function scopePerTahun($query, $tahun)
    {
        return $query->whereYear('tanggal', $tahun);
    }
}