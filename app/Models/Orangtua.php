<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    use HasFactory;

    protected $table = 'orangtuas';

    protected $fillable = [
        'nama_orang_tua',
        'pekerjaan_orang_tua',
        'no_telepon_orang_tua',
        'alamat_orang_tua',
        'student_id'
    ];

    // Relasi ke tabel students
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
