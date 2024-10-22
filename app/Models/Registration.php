<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $table = 'registrations';

    protected $fillable = [
        'student_id',
        'program_id',
        'tingkat_pendidikan',
        'kelas'
    ];

    // Relasi ke tabel students
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // Relasi ke tabel programs
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
