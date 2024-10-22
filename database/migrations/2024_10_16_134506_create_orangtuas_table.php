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
        Schema::create('orangtuas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_orang_tua');
            $table->string('pekerjaan_orang_tua');
            $table->string('no_telepon_orang_tua');
            $table->text('alamat_orang_tua');
            // Menggunakan unsignedBigInteger untuk kolom student_id
            $table->unsignedBigInteger('student_id');

            // Definisikan foreign key
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
