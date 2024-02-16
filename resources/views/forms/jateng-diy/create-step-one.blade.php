@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('forms.jateng-diy.create.step.one.post') }}" method="POST">
                @csrf

                <div class="card">
                    <div class="card-header">Data Sosio Demografi</div>

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
                                <label for="description">No. Telepon:</label>
                                <input type="number" min="0" value="{{{ $forms->telepon ?? '' }}}" class="form-control" id="telepon" name="telepon"/>
                                <h6>Data nomor telepon akan digunakan untuk pembagian reward</h6>
                            </div>
                            <div class="form-group">
                                <label for="title">Profesi:</label>
                                <select class="form-control" id="profesi" name="profesi">
                                    <option value="">Pilih Profesi</option>
                                    <option value="PNS" {{ old('profesi', optional($forms)->profesi) === 'PNS' ? 'selected' : '' }}>PNS</option>
                                    <option value="TNI / POLRI" {{ old('profesi', optional($forms)->profesi) === 'TNI / POLRI' ? 'selected' : '' }}>TNI / POLRI</option>
                                    <option value="Pegawai" {{ old('profesi', optional($forms)->profesi) === 'Pegawai' ? 'selected' : '' }}>Pegawai</option>
                                    <option value="Wiraswasta" {{ old('profesi', optional($forms)->profesi) === 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                    <option value="Pelajar / Mahasiswa" {{ old('profesi', optional($forms)->profesi) === 'Pelajar / Mahasiswa' ? 'selected' : '' }}>Pelajar / Mahasiswa</option>
                                    <option value="Ibu Rumah Tangga" {{ old('profesi', optional($forms)->profesi) === 'Ibu Rumah Tangga' ? 'selected' : '' }}>Ibu Rumah Tangga</option>
                                    <option value="Sedang Tidak Bekerja" {{ old('profesi', optional($forms)->profesi) === 'Sedang Tidak Bekerja' ? 'selected' : '' }}>Sedang Tidak Bekerja</option>
                                    <option value="Lainnya" {{ old('profesi', optional($forms)->profesi) === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group" id="profesi_lainlain" style="display: none;">
                                <label for="lainlain">Tuliskan Profesi Lainnya:</label>
                                <input type="text" class="form-control" id="profesi_lain" name="profesi_lainnya" value="{{ old('profesi_lain', optional($forms)->profesi_lainnya) }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Jenis Kelamin:</label><br/>
                                <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="Laki-laki" {{{ (isset($forms->jenis_kelamin) && $forms->jenis_kelamin == 'Laki-laki') ? "checked" : "" }}}> Laki-laki</label><br/>
                                <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="Perempuan" {{{ (isset($forms->jenis_kelamin) && $forms->jenis_kelamin == 'Perempuan') ? "checked" : "" }}}> Perempuan</label><br>
                            </div>
                            <div class="form-group">
                                <label for="description">Umur (Tahun):</label>
                                <input type="number" min="0" value="{{{ $forms->umur ?? '' }}}" class="form-control" id="umur" name="umur"/>
                                <h6>Cukup tulis angka saja, tanpa titik, koma, atau satuan</h6>
                            </div>
                            <div class="form-group">
                                <label for="description">Jumlah Anggota Keluarga (Orang):</label>
                                <input type="number" min="0" value="{{{ $forms->ukuran_keluarga ?? '' }}}" class="form-control" id="ukuran_keluarga" name="ukuran_keluarga"/>
                                <h6>Cukup tulis angka saja, tanpa titik, koma, atau satuan</h6>
                            </div>
                            <div class="form-group">
                                <label for="description">Kedudukan Keluarga:</label>
                                <select class="form-control" id="kedudukan_keluarga" name="kedudukan_keluarga">
                                    <option value="">Pilih Kedudukan Keluarga</option>
                                    <option value="Suami" {{ optional($forms)->kedudukan_keluarga === 'Suami' ? 'selected' : '' }}>Suami</option>
                                    <option value="Istri" {{ optional($forms)->kedudukan_keluarga === 'Istri' ? 'selected' : '' }}>Istri</option>
                                    <option value="Anak" {{ optional($forms)->kedudukan_keluarga === 'Anak' ? 'selected' : '' }}>Anak</option>
                                    <option value="Lajang" {{ optional($forms)->kedudukan_keluarga === 'Lajang' ? 'selected' : '' }}>Lajang / Single</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Kepemilikan Kendaraan Pribadi</label><br/>
                                <label class="radio-inline"><input type="radio" name="kendaraan_pribadi" id="kendaraan_0" value="0" {{{ (isset($forms->kendaraan_pribadi) && $forms->kendaraan_pribadi == '0') ? "checked" : "" }}}> Tidak Punya</label><br/>
                                <label class="radio-inline"><input type="radio" name="kendaraan_pribadi" id="kendaraan_1" value="1" {{{ (isset($forms->kendaraan_pribadi) && $forms->kendaraan_pribadi == '1') ? "checked" : "" }}}> Punya</label>
                            </div>
                            <div class="form-group" id="jumlah_kepemilikan" style="display:none">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="desription">Motor (Unit):</label>
                                        <input  type="number" min="0" value="{{ $forms->deskripsi_kendaraan_motor ?? '' }}" class="form-control" id="deskripsi_kendaraan_motor"  name="deskripsi_kendaraan_motor">
                                        <h6>Cukup tulis angka saja, tanpa titik, koma, atau satuan</h6>
                                    </div>
                                    <div class="col-6">
                                        <label for="desription">Mobil (Unit):</label>
                                        <input  type="number" min="0" value="{{ $forms->deskripsi_kendaraan_mobil ?? '' }}" class="form-control" id="deskripsi_kendaraan_mobil"  name="deskripsi_kendaraan_mobil">
                                        <h6>Cukup tulis angka saja, tanpa titik, koma, atau satuan</h6>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Berikutnya</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById('profesi').addEventListener('change', function () {
            var profesiLainlain = document.getElementById('profesi_lainlain');
            if (this.value === 'Lainnya') {
                profesiLainlain.style.display = 'block';
            } else {
                profesiLainlain.style.display = 'none';
            }
        });

        document.getElementById('kendaraan_0').addEventListener('click', function () {
            document.getElementById('jumlah_kepemilikan').style.display = 'none';
        })
        document.getElementById('kendaraan_1').addEventListener('click', function () {
            document.getElementById('jumlah_kepemilikan').style.display = 'block';
        })
    </script>
</div>
@endsection
