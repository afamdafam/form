@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('forms.create.step.four.b2.post') }}" method="POST">
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
                                <label>Jenis Kendaraan Umum yang digunakan dalam sekali trip (boleh pilih lebih dari 1):</label>
                                <div>
                                    <input type="checkbox" id="krl" name="jenis_kendaraan_krl" value="1" {{ $forms->jenis_kendaraan_krl ? 'checked' : '' }}>
                                    <label for="krl">KRL</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="lrt" name="jenis_kendaraan_lrt" value="1" {{ $forms->jenis_kendaraan_lrt ? 'checked' : '' }}>
                                    <label for="lrt">LRT</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="mrt" name="jenis_kendaraan_mrt" value="1" {{ $forms->jenis_kendaraan_mrt ? 'checked' : '' }}>
                                    <label for="mrt">MRT</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="brt" name="jenis_kendaraan_brt" value="1" {{ $forms->jenis_kendaraan_brt ? 'checked' : '' }}>
                                    <label for="brt">BRT</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="angkutan_kota" name="jenis_kendaraan_angkutan_kota" value="1" {{ $forms->jenis_kendaraan_angkutan_kota ? 'checked' : '' }}>
                                    <label for="angkutan_kota">Angkutan Kota</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="ojol" name="jenis_kendaraan_ojol" value="1" {{ $forms->jenis_kendaraan_ojol ? 'checked' : '' }}>
                                    <label for="ojol">Ojol</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title">Tarif (Rp/hari, tanpa titik atau koma):</label>
                                <input type="text" value="{{ $forms->tarif ?? '' }}" class="form-control" id="tarif"  name="tarif">
                            </div>
                            <div class="form-group">
                                <label for="description">Waktu Transfer (Menit):</label>
                                <input type="text"  value="{{{ $forms->waktu_transfer ?? '' }}}" class="form-control" id="waktu_transfer" name="waktu_transfer"/>
                            </div>
                            <div class="form-group">
                                <label for="description">Waktu perjalanan menuju tempat henti (Menit):</label>
                                <input type="text"  value="{{{ $forms->waktu_transit ?? '' }}}" class="form-control" id="waktu_transit" name="waktu_transit"/>
                            </div>
                            <div class="form-group">
                                <label for="description">Waktu tunggu (Menit):</label>
                                <input type="text"  value="{{{ $forms->waktu_tunggu ?? '' }}}" class="form-control" id="waktu_tunggu" name="waktu_tunggu"/>
                            </div>
                            <div class="form-group">
                                <label for="description">Waktu perjalanan di atas kendaraan umum massal (menit):</label>
                                <input type="text"  value="{{{ $forms->waktu_perjalanan ?? '' }}}" class="form-control" id="waktu_perjalanan" name="waktu_perjalanan"/>
                            </div>
                            <div class="form-group">
                                <label for="description">Waktu Total Perjalanan menuju tujuan perjalanan (Menit):</label>
                                <input type="text"  value="{{{ $forms->waktu_total ?? '' }}}" class="form-control" id="waktu_total" name="waktu_total"/>
                            </div>
                            <div class="form-group">
                                <label for="description">Pendapatan (Rp/bulan, tanpa titik atau koma):</label>
                                <input type="text"  value="{{{ $forms->waktu_total ?? '' }}}" class="form-control" id="pendapatan" name="pendapatan"/>
                            </div>
                            <div class="form-group">
                                <label for="description">Preferensi/keinginan menggunakan kendaraan umum dibanding kendaraan pribadi (%):</label>
                                <input type="text"  value="{{{ $forms->preferensi_umum ?? '' }}}" class="form-control" id="preferensi_umum" name="preferensi_umum"/>
                                <h6> Dari skala 0-100, tanpa tanda '%'</h6>
                            </div>

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('forms.create.step.four.b1') }}" class="btn btn-danger pull-right">Sebelumnya</a>
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
</div>
@endsection
