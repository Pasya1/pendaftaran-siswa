<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

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
        'nama_wali',
        'pekerjaan_orangtua',
        'no_telepon_wali',
        'alamat_orangtua',
        'foto_diri',
        'ktp',
        'ijazah'
    ];
}
