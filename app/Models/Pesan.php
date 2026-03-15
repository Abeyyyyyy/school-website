<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $fillable = [
        'nama', 'email', 'subjek', 'pesan', 'status', 'student_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}