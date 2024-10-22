<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'programs';

    protected $fillable = ['nama_program'];

    // Relasi ke tabel registrations
    public function registrations()
    {
        return $this->hasMany(Registration::class, 'program_id');
    }
}
