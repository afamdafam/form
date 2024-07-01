@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('forms.solo.create.step.four.b2.post') }}" method="POST">
                @csrf

                <div class="card">
                    <div class="card-header">Data Kendaraan Pribadi</div>

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
                                <label for="description">Biaya Parkir (Rp/hari):</label>
                                <input type="text"  value="{{{ $forms->biaya_parkir ?? '' }}}" class="form-control" id="biaya_parkir" name="biaya_parkir"/>
                                <h6>Cukup tulis angka saja, tanpa titik, koma, atau satuan</h6>
                            </div>
                            <div class="form-group">
                                <label for="description">Biaya Bahan Bakar (Rp/bulan):</label>
                                <input type="text"  value="{{{ $forms->biaya_bbm ?? '' }}}" class="form-control" id="biaya_bbm" name="biaya_bbm"/>
                                <h6>Cukup tulis angka saja, tanpa titik, koma, atau satuan</h6>
                            </div>
                            <div class="form-group">
                                <label for="description">Total Waktu Tempuh Perjalanan (Menit):</label>
                                <input type="text"  value="{{{ $forms->perjalanan_total ?? '' }}}" class="form-control" id="perjalanan_total" name="perjalanan_total"/>
                                <h6>Cukup tulis angka saja, tanpa titik, koma, atau satuan</h6>
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
                            <a href="{{ route('forms.solo.create.step.four.b1') }}" class="btn btn-danger pull-right">Sebelumnya</a>
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
