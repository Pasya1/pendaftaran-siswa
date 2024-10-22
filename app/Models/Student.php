<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    // Kolom yang boleh diisi melalui mass assignment
    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'no_telepon',
        'email',
        'alamat_lengkap',
        'kode_pos',
        'nama_sekolah',
        'jurusan',
        'tahun_lulus',
        'nilai_rata_rata',
        'foto',
        'ktp',
        'ijazah',
        'transkrip_nilai',
        'surat_rekomendasi'
    ];

    // Relasi ke tabel parents
    public function parents()
    {
        return $this->hasMany(Orangtua::class, 'student_id');
    }

    // Relasi ke tabel registrations
    public function registrations()
    {
        return $this->hasMany(Registration::class, 'student_id');
    }
}
