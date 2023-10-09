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
        Schema::create('form_data', function (Blueprint $table) {
            $table->id();
            $table->string('profesi')->nullable();
            $table->string('profesi_lainnya')->nullable();
            $table->integer('umur')->nullable();
            $table->integer('ukuran_keluarga')->nullable();
            $table->string('kedudukan_keluarga')->nullable();
            $table->string('maksud_perjalanan')->nullable();
            $table->string('tulis_maksud')->nullable();
            $table->string('berangkat_pulang')->nullable();
            $table->integer('frekuensi_perjalanan')->nullable();
            $table->boolean('kendaraan_pribadi')->default(0);
            $table->string('alamat_kota')->nullable();
            $table->float('alamat_latitude')->nullable();
            $table->float('alamat_longitude')->nullable();
            $table->string('tujuan_kota')->nullable();
            $table->float('tujuan_latitude')->nullable();
            $table->float('tujuan_longitude')->nullable();
            $table->boolean('option')->default(0);
            $table->boolean('jenis_kendaraan_krl')->default(0);
            $table->boolean('jenis_kendaraan_lrt')->default(0);
            $table->boolean('jenis_kendaraan_mrt')->default(0);
            $table->boolean('jenis_kendaraan_brt')->default(0);
            $table->boolean('jenis_kendaraan_angkutan_kota')->default(0);
            $table->boolean('jenis_kendaraan_ojol')->default(0);
            $table->integer('tarif')->nullable();
            $table->integer('waktu_transfer')->nullable();
            $table->integer('waktu_transit')->nullable();
            $table->integer('waktu_tunggu')->nullable();
            $table->integer('waktu_perjalanan')->nullable();
            $table->integer('waktu_total')->nullable();
            $table->integer('pendapatan')->nullable();
            $table->integer('deskripsi_kendaraan_motor')->nullable();
            $table->integer('deskripsi_kendaraan_mobil')->nullable();
            $table->integer('biaya_parkir')->nullable();
            $table->integer('biaya_bbm')->nullable();
            $table->integer('perjalanan_total')->nullable();
            $table->float('preferensi_pribadi')->nullable();
            $table->float('preferensi_umum')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_data');
    }
};
