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
            $table->string('telepon')->nullable();
            $table->string('profesi')->nullable();
            $table->string('profesi_lainnya')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->integer('umur')->nullable();
            $table->string('tingkat_pendidikan')->nullable();
            $table->integer('ukuran_keluarga')->nullable();
            $table->string('kedudukan_keluarga')->nullable();
            $table->boolean('kendaraan_pribadi')->default(0);
            $table->integer('deskripsi_kendaraan_motor')->nullable();
            $table->integer('deskripsi_kendaraan_mobil')->nullable();
            $table->string('alamat_kecamatan')->nullable();
            $table->string('alamat_kelurahan')->nullable();
            $table->string('alamat_kota')->nullable();
            $table->float('alamat_latitude')->nullable();
            $table->float('alamat_longitude')->nullable();
            $table->string('tujuan_kecamatan')->nullable();
            $table->string('tujuan_kelurahan')->nullable();
            $table->string('tujuan_kota')->nullable();
            $table->float('tujuan_latitude')->nullable();
            $table->float('tujuan_longitude')->nullable();
            $table->boolean('option')->default(0);
            $table->string('maksud_perjalanan')->nullable();
            $table->string('tulis_maksud')->nullable();
            $table->integer('frekuensi_perjalanan')->nullable();
            $table->boolean('kendaraan_berangkat_mobil')->default(0);
            $table->boolean('kendaraan_berangkat_motor')->default(0);
            $table->boolean('kendaraan_berangkat_lainnya')->default(0);
            $table->boolean('kendaraan_berangkat_krl')->default(0);
            $table->boolean('kendaraan_berangkat_lrt')->default(0);
            $table->boolean('kendaraan_berangkat_mrt')->default(0);
            $table->boolean('kendaraan_berangkat_brt')->default(0);
            $table->boolean('kendaraan_berangkat_angkutan_kota')->default(0);
            $table->boolean('kendaraan_berangkat_ojol')->default(0);
            $table->boolean('kendaraan_berangkat_kereta_api')->default(0);
            $table->boolean('kendaraan_berangkat_bus_akap')->default(0);
            $table->boolean('kendaraan_berangkat_bus_akdp')->default(0);
            $table->boolean('kendaraan_pulang_mobil')->default(0);
            $table->boolean('kendaraan_pulang_motor')->default(0);
            $table->boolean('kendaraan_pulang_lainnya')->default(0);
            $table->boolean('kendaraan_pulang_krl')->default(0);
            $table->boolean('kendaraan_pulang_lrt')->default(0);
            $table->boolean('kendaraan_pulang_mrt')->default(0);
            $table->boolean('kendaraan_pulang_brt')->default(0);
            $table->boolean('kendaraan_pulang_angkutan_kota')->default(0);
            $table->boolean('kendaraan_pulang_ojol')->default(0);
            $table->boolean('kendaraan_pulang_kereta_api')->default(0);
            $table->boolean('kendaraan_pulang_bus_akap')->default(0);
            $table->boolean('kendaraan_pulang_bus_akdp')->default(0);
            $table->integer('tarif')->nullable();
            $table->integer('waktu_transit')->nullable();
            $table->boolean('transport_henti_jalan_kaki')->default(0);
            $table->boolean('transport_henti_ojol')->default(0);
            $table->boolean('transport_henti_angkutan_umum_lain')->default(0);
            $table->boolean('transport_henti_diantar')->default(0);
            $table->boolean('transport_henti_pribadi')->default(0);
            $table->integer('waktu_tunggu')->nullable();
            $table->integer('waktu_perjalanan')->nullable();
            $table->integer('waktu_henti_tujuan')->nullable();
            $table->boolean('transport_akhir_jalan_kaki')->default(0);
            $table->boolean('transport_akhir_ojol')->default(0);
            $table->boolean('transport_akhir_angkutan_umum_lain')->default(0);
            $table->boolean('transport_akhir_dijemput')->default(0);
            $table->boolean('transport_akhir_pribadi')->default(0);
            $table->integer('waktu_total')->nullable();
            $table->integer('pendapatan')->nullable();
            $table->integer('biaya_parkir')->nullable();
            $table->integer('biaya_bbm')->nullable();
            $table->integer('perjalanan_total')->nullable();
            $table->float('preferensi')->nullable();
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
