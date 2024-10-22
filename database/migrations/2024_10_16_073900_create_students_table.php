<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_telepon');
            $table->string('email');
            $table->text('alamat_lengkap');
            $table->string('kode_pos');
            $table->string('nama_sekolah');
            $table->string('jurusan');
            $table->year('tahun_lulus');
            $table->decimal('nilai_rata_rata', 5, 2);
            $table->string('foto');
            $table->string('ktp');
            $table->string('ijazah');
            $table->string('transkrip_nilai');
            $table->string('surat_rekomendasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
