@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('forms.create.step.four.c.post') }}" method="POST">
                @csrf

                <div class="card">
                    <div class="card-header">Data Public Transport</div>

                    <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="description">Maksud Perjalanan:</label>
                                <select class="form-control" id="maksud_perjalanan" name="maksud_perjalanan">
                                    <option value="">Pilih Maksud Perjalanan</option>
                                    <option value="Bekerja" {{ old('maksud_perjalanan') === 'Bekerja' ? 'selected' : '' }}>Bekerja</option>
                                    <option value="Sekolah / Kuliah" {{ old('maksud_perjalanan') === 'Sekolah / Kuliah' ? 'selected' : '' }}>Sekolah / Kuliah</option>
                                    <option value="Belanja" {{ old('maksud_perjalanan') === 'Belanja' ? 'selected' : '' }}>Belanja</option>
                                    <option value="Wisata" {{ old('maksud_perjalanan') === 'Wisata' ? 'selected' : '' }}>Wisata</option>
                                    <option value="Lain-lain" {{ old('maksud_perjalanan') === 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
                                </select>
                            </div>
                            <div class="form-group" id="lainlain_field" style="display: none;">
                                <label for="lainlain">Tuliskan Maksud Perjalanan:</label>
                                <input type="text" class="form-control" id="lainlain" name="tulis_maksud" value="{{ old('tulis_maksud', optional($forms)->tulis_maksud) }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Frekuensi Perjalanan (Kali/Minggu):</label>
                                <input type="number" min="0" value="{{{ $forms->frekuensi_perjalanan ?? '' }}}" class="form-control" id="frekuensi_perjalanan" name="frekuensi_perjalanan"/>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kendaraan Umum yang digunakan ketika berangkat (boleh pilih lebih dari 1):</label>
                                <div>
                                    <input type="checkbox" name="kendaraan_berangkat_krl" value="1" {{ isset($forms) && $forms->kendaraan_berangkat_krl ? 'checked' : '' }}>
                                    <label for="krl">KRL</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="kendaraan_berangkat_lrt" value="1" {{ isset($forms) && $forms->kendaraan_berangkat_lrt ? 'checked' : '' }}>
                                    <label for="lrt">LRT</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="kendaraan_berangkat_mrt" value="1" {{ isset($forms) && $forms->kendaraan_berangkat_mrt ? 'checked' : '' }}>
                                    <label for="mrt">MRT</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="kendaraan_berangkat_brt" value="1" {{ isset($forms) && $forms->kendaraan_berangkat_brt ? 'checked' : '' }}>
                                    <label for="brt">BRT</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="kendaraan_berangkat_angkutan_kota" value="1" {{ isset($forms) && $forms->kendaraan_berangkat_angkutan_kota ? 'checked' : '' }}>
                                    <label for="angkutan_kota">Angkutan Kota</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="kendaraan_berangkat_ojol" value="1" {{ isset($forms) && $forms->kendaraan_berangkat_ojol ? 'checked' : '' }}>
                                    <label for="ojol">Ojol</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kendaraan Umum yang digunakan ketika pulang (boleh pilih lebih dari 1):</label>
                                <div>
                                    <input type="checkbox" name="kendaraan_pulang_krl" value="1" {{ isset($forms) && $forms->kendaraan_pulang_krl ? 'checked' : '' }}>
                                    <label for="krl">KRL</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="kendaraan_pulang_lrt" value="1" {{ isset($forms) && $forms->kendaraan_pulang_lrt ? 'checked' : '' }}>
                                    <label for="lrt">LRT</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="kendaraan_pulang_mrt" value="1" {{ isset($forms) && $forms->kendaraan_pulang_mrt ? 'checked' : '' }}>
                                    <label for="mrt">MRT</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="kendaraan_pulang_brt" value="1" {{ isset($forms) && $forms->kendaraan_pulang_brt ? 'checked' : '' }}>
                                    <label for="brt">BRT</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="kendaraan_pulang_angkutan_kota" value="1" {{ isset($forms) && $forms->kendaraan_pulang_angkutan_kota ? 'checked' : '' }}>
                                    <label for="angkutan_kota">Angkutan Kota</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="kendaraan_pulang_ojol" value="1" {{ isset($forms) && $forms->kendaraan_pulang_ojol ? 'checked' : '' }}>
                                    <label for="ojol">Ojol</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Total Tarif / Biaya yang Harus Dibayar Untuk Angkutan Umum (Rp/hari, tanpa titik atau koma):</label>
                                <input type="text" value="{{ $forms->tarif ?? '' }}" class="form-control" id="tarif"  name="tarif">
                            </div>
                            <div class="form-group">
                                <label for="description">Waktu Perjalanan Menuju Tempat Henti Angkutan Massal (Menit):</label>
                                <input type="text"  value="{{{ $forms->waktu_transit ?? '' }}}" class="form-control" id="waktu_transit" name="waktu_transit"/>
                            </div>
                            <div class="form-group">
                                <label>Moda Transportasi Menuju Tempat Henti Angkutan Massal (boleh pilih lebih dari 1):</label>
                                <div>
                                    <input type="checkbox" name="transport_henti_jalan_kaki" value="1" {{ isset($forms) && $forms->transport_henti_jalan_kaki ? 'checked' : '' }}>
                                    <label>Jalan Kaki</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="transport_henti_ojol" value="1" {{ isset($forms) && $forms->transport_henti_ojol ? 'checked' : '' }}>
                                    <label>Ojol</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="transport_henti_angkutan_umum_lain" value="1" {{ isset($forms) && $forms->transport_henti_angkutan_umum_lain ? 'checked' : '' }}>
                                    <label>Angkutan Umum Lainnya</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="transport_henti_diantar" value="1" {{ isset($forms) && $forms->transport_henti_diantar ? 'checked' : '' }}>
                                    <label>Diantar</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="transport_henti_pribadi" value="1" {{ isset($forms) && $forms->transport_henti_pribadi ? 'checked' : '' }}>
                                    <label>Kendaraan Pribadi (Lalu Parkir)</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Waktu Tunggu Kedatangan Angkutan Massal (Menit):</label>
                                <input type="text"  value="{{{ $forms->waktu_tunggu ?? '' }}}" class="form-control" id="waktu_tunggu" name="waktu_tunggu"/>
                            </div>
                            <div class="form-group">
                                <label for="description">Waktu Perjalanan di Atas Kendaraan Umum Massal (Menit):</label>
                                <input type="text"  value="{{{ $forms->waktu_perjalanan ?? '' }}}" class="form-control" id="waktu_perjalanan" name="waktu_perjalanan"/>
                            </div>
                            <div class="form-group">
                                <label for="description">Waktu Perjalanan dari Tempat Henti Akhir ke Tujuan(menit):</label>
                                <input type="text"  value="{{{ $forms->waktu_henti_tujuan ?? '' }}}" class="form-control" id="waktu_henti_tujuan" name="waktu_henti_tujuan"/>
                            </div>
                            <div class="form-group">
                                <label>Moda Transportasi dari Tempat Henti Akhir ke Tujuan (boleh pilih lebih dari 1):</label>
                                <div>
                                    <input type="checkbox" name="transport_akhir_jalan_kaki" value="1" {{ isset($forms) && $forms->transport_akhir_jalan_kaki ? 'checked' : '' }}>
                                    <label>Jalan Kaki</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="transport_akhir_ojol" value="1" {{ isset($forms) && $forms->transport_akhir_ojol ? 'checked' : '' }}>
                                    <label>Ojol</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="transport_akhir_angkutan_umum_lain" value="1" {{ isset($forms) && $forms->transport_akhir_angkutan_umum_lain ? 'checked' : '' }}>
                                    <label>Angkutan Umum Lainnya</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="transport_akhir_diantar" value="1" {{ isset($forms) && $forms->transport_akhir_diantar ? 'checked' : '' }}>
                                    <label>Diantar</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="transport_akhir_pribadi" value="1" {{ isset($forms) && $forms->transport_akhir_pribadi ? 'checked' : '' }}>
                                    <label>Kendaraan Pribadi (Lalu Parkir)</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Waktu Total Perjalanan Menuju Tujuan Perjalanan (Menit):</label>
                                <input type="text"  value="{{{ $forms->waktu_total ?? '' }}}" class="form-control" id="waktu_total" name="waktu_total"/>
                            </div>
                            <div class="form-group">
                                <label for="description">Pendapatan (Rp/bulan, tanpa titik atau koma):</label>
                                <input type="text"  value="{{{ $forms->waktu_total ?? '' }}}" class="form-control" id="pendapatan" name="pendapatan"/>
                            </div>
                            <div class="form-group">
                                <label for="description">Preferensi / Keinginan Menggunakan Kendaraan Umum Dibanding Kendaraan Pribadi (%):</label>
                                <input type="text"  value="{{{ $forms->preferensi ?? '' }}}" class="form-control" id="preferensi" name="preferensi"/>
                                <h6> Dari skala 0-100, tanpa tanda '%'</h6>
                            </div>

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('forms.create.step.three') }}" class="btn btn-danger pull-right">Sebelumnya</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">Berikutnya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById('maksud_perjalanan').addEventListener('change', function () {
            var profesiLainlain = document.getElementById('lainlain_field');
            if (this.value === 'Lain-lain') {
                profesiLainlain.style.display = 'block';
            } else {
                profesiLainlain.style.display = 'none';
            }
        });
    </script>
</div>
@endsection
