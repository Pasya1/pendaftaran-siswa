<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('universitas');
            $table->string('logo');
            $table->string('background');
            $table->string('primary_color', 7);
            $table->string('secondary_color', 7);
            $table->string('no_telepon_perusahaan');
            $table->string('email_perusahaan');
            $table->string('alamat_perusahaan');
            $table->string('jam_operasional_perusahaan');
            $table->text('google_maps_embed_code');
            $table->timestamps();
        });

        // Menambahkan data default
        DB::table('sites')->insert([
            'universitas' => 'MTSN KOTA BOGOR',
            'logo' => 'logos/01JATGVZHBVAR5XG3MFT8C5B4V.png',
            'background' => 'backgrounds/01JATGYB471NAWT9DYD21VCWXV.jpg',
            'primary_color' => '#008000',
            'secondary_color' => '#00A859',
            'no_telepon_perusahaan' => '0877732892',
            'email_perusahaan' => 'MTSNKotaBogor@gmail.com',
            'alamat_perusahaan' => 'Jl. Achmad Sobana No.3, RT.01/RW.15, Tegal Gundil, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16152',
            'jam_operasional_perusahaan' => 'Senin - Sabtu 08.00 - 17.00',
            'google_maps_embed_code' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.518972565883!2d106.8138174748831!3d-6.58222019341131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c500d164303d%3A0xce6415977f8a6103!2sMTsN%201%20Kota%20Bogor!5e0!3m2!1sid!2sid!4v1729614730845!5m2!1sid!2sid',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('sites');
    }
};
