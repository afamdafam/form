<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    protected $fillable = [
        'telepon', 'profesi', 'profesi_lainnya', 'jenis_kelamin', 'umur', 'ukuran_keluarga',
        'kedudukan_keluarga', 'kendaraan_pribadi', 'deskripsi_kendaraan_motor',
        'deskripsi_kendaraan_mobil', 'alamat_kecamatan', 'alamat_kelurahan',
        'alamat_kota', 'alamat_latitude', 'alamat_longitude', 'tujuan_kecamatan',
        'tujuan_kelurahan', 'tujuan_kota', 'tujuan_latitude', 'tujuan_longitude',
        'option', 'maksud_perjalanan', 'tulis_maksud', 'frekuensi_perjalanan',
        'kendaraan_berangkat_mobil', 'kendaraan_berangkat_motor',
        'kendaraan_berangkat_lainnya', 'kendaraan_berangkat_krl',
        'kendaraan_berangkat_lrt', 'kendaraan_berangkat_mrt', 'kendaraan_berangkat_brt',
        'kendaraan_berangkat_angkutan_kota', 'kendaraan_berangkat_ojol',
        'kendaraan_pulang_mobil', 'kendaraan_pulang_motor', 'kendaraan_pulang_lainnya',
        'kendaraan_pulang_krl', 'kendaraan_pulang_lrt', 'kendaraan_pulang_mrt',
        'kendaraan_pulang_brt', 'kendaraan_pulang_angkutan_kota', 'kendaraan_pulang_ojol',
        'tarif', 'waktu_transit', 'transport_henti_jalan_kaki', 'transport_henti_ojol',
        'transport_henti_angkutan_umum_lain', 'transport_henti_diantar', 'transport_henti_pribadi',
        'waktu_tunggu', 'waktu_perjalanan', 'waktu_henti_tujuan',
        'transport_akhir_jalan_kaki', 'transport_akhir_ojol',
        'transport_akhir_angkutan_umum_lain', 'transport_akhir_diantar', 'transport_akhir_pribadi',
        'waktu_total', 'pendapatan', 'biaya_parkir', 'biaya_bbm', 'perjalanan_total',
        'preferensi',
    ];


}
