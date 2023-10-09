<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    protected $fillable = [
        'profesi', 'profesi_lainnya', 'jenis_kelamin', 'umur', 'ukuran_keluarga', 'kedudukan_keluarga',
        'maksud_perjalanan', 'tulis_maksud', 'berangkat_pulang', 'frekuensi_perjalanan', 'kendaraan_pribadi',
        'alamat_kecamatan', 'alamat_kelurahan', 'alamat_kota', 'alamat_latitude', 'alamat_longitude',
        'tujuan_kecamatan', 'tujuan_kelurahan', 'tujuan_kota', 'tujuan_latitude', 'tujuan_longitude',
        'option', 'jenis_kendaraan_krl', 'jenis_kendaraan_lrt', 'jenis_kendaraan_mrt', 'jenis_kendaraan_brt',
        'jenis_kendaraan_angkutan_kota', 'jenis_kendaraan_ojol', 'tarif', 'waktu_transfer', 'waktu_transit',
        'waktu_tunggu', 'waktu_perjalanan', 'waktu_total', 'pendapatan', 'deskripsi_kendaraan_motor',
        'deskripsi_kendaraan_mobil', 'biaya_parkir', 'biaya_bbm', 'perjalanan_total', 'preferensi_pribadi',
        'preferensi_umum',
    ];


}
