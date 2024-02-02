@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('forms.create.step.four.a.post') }}" method="POST">
                @csrf

                <div class="card">
                    <div class="card-header">Data Private Transport</div>

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
                            <!-- <div class="form-group">
                                <label for="description">Perjalanan Berangkat atau Pulang:</label><br/>
                                <label class="radio-inline"><input type="radio" name="berangkat_pulang" value="Berangkat" {{{ (isset($forms->berangakat_pulang) && $forms->berangakat_pulang == 'Berangkat') ? "checked" : "" }}}> Berangkat</label><br/>
                                <label class="radio-inline"><input type="radio" name="berangkat_pulang" value="Pulang" {{{ (isset($forms->berangakat_pulang) && $forms->berangakat_pulang == 'Pulang') ? "checked" : "" }}}> Pulang</label><br>
                                <label class="radio-inline"><input type="radio" name="berangkat_pulang" value="Berangkat dan Pulang" {{{ (isset($forms->berangakat_pulang) && $forms->berangakat_pulang == 'Berangkat dan Pulang') ? "checked" : "" }}}> Berangkat dan Pulang</label>
                            </div> -->
                            <div class="form-group">
                                <label for="description">Frekuensi Perjalanan (Kali/Minggu):</label>
                                <input type="number" min="0" value="{{{ $forms->frekuensi_perjalanan ?? '' }}}" class="form-control" id="frekuensi_perjalanan" name="frekuensi_perjalanan"/>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kendaraan pribadi yang digunakan ketika berangkat (boleh pilih lebih dari 1):</label>
                                <div>
                                    <input type="checkbox" name="kendaraan_berangkat_mobil" value="1" {{ isset($forms) && $forms->kendaraan_berangkat_mobil ? 'checked' : '' }}>
                                    <label> Mobil</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="kendaraan_berangkat_motor" value="1" {{ isset($forms) && $forms->kendaraan_berangkat_motor ? 'checked' : '' }}>
                                    <label> Motor</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="kendaraan_berangkat_lainnya" value="1" {{ isset($forms) && $forms->kendaraan_berangkat_lainnya ? 'checked' : '' }}>
                                    <label> Lainnya</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kendaraan pribadi yang digunakan ketika pulang (boleh pilih lebih dari 1):</label>
                                <div>
                                    <input type="checkbox" name="kendaraan_pulang_mobil" value="1" {{ isset($forms) && $forms->kendaraan_pulang_mobil ? 'checked' : '' }}>
                                    <label> Mobil</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="kendaraan_pulang_mobil" value="1" {{ isset($forms) && $forms->kendaraan_pulang_mobil ? 'checked' : '' }}>
                                    <label> Motor</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="kendaraan_pulang_lainnya" value="1" {{ isset($forms) && $forms->kendaraan_pulang_lainnya ? 'checked' : '' }}>
                                    <label> Lainnya</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Frekuensi Perjalanan (Kali/Minggu):</label>
                                <input type="number" min="0" value="{{{ $forms->frekuensi_perjalanan ?? '' }}}" class="form-control" id="frekuensi_perjalanan" name="frekuensi_perjalanan"/>
                            </div>
                            <div class="form-group">
                                <label for="description">Biaya Parkir (Rp/hari, tanpa titik atau koma):</label>
                                <input type="text"  value="{{{ $forms->biaya_parkir ?? '' }}}" class="form-control" id="biaya_parkir" name="biaya_parkir"/>
                            </div>
                            <div class="form-group">
                                <label for="description">Biaya Bahan Bakar (Rp/bulan, tanpa titik atau koma):</label>
                                <input type="text"  value="{{{ $forms->biaya_bbm ?? '' }}}" class="form-control" id="biaya_bbm" name="biaya_bbm"/>
                            </div>
                            <div class="form-group">
                                <label for="description">Total Waktu Tempuh Perjalanan (Menit):</label>
                                <input type="text"  value="{{{ $forms->perjalanan_total ?? '' }}}" class="form-control" id="perjalanan_total" name="perjalanan_total"/>
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
