@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('forms.create.step.four.b1.post') }}" method="POST">
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
                                <label for="title">Jumlah Kepemilikan Kendaraan Pribadi dan Jenisnya:</label>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="desription">Motor (Unit):</label>
                                        <input  type="number" min="0" value="{{ $forms->deskripsi_kendaraan_motor ?? '' }}" class="form-control" id="deskripsi_kendaraan_motor"  name="deskripsi_kendaraan_motor">
                                    </div>
                                    <div class="col-6">
                                        <label for="desription">Mobil (Unit):</label>
                                        <input  type="number" min="0" value="{{ $forms->deskripsi_kendaraan_mobil ?? '' }}" class="form-control" id="deskripsi_kendaraan_mobil"  name="deskripsi_kendaraan_mobil">
                                    </div>
                                </div>
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
</div>
@endsection
