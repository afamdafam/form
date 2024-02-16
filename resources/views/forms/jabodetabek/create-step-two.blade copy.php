@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('forms.create.step.two.post') }}" method="post" >
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">Step 3: Review Details</div>

                    <div class="card-body">

                            <table class="table">
                                <tr>
                                    <td>Profesi:</td>
                                    <td><strong>{{$forms->profesi}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Umur:</td>
                                    <td><strong>{{$forms->umur}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Kepemilikan Kendaraan:</td>
                                    <td><strong>{{$forms->kepemilikan_kendaraan}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Ukuran Keluarga:</td>
                                    <td><strong>{{$forms->ukuran_keluarga}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Kedudukan Keluarga:</td>
                                    <td><strong>{{$forms->kedudukan_keluarga}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Maksud Perjalanan:</td>
                                    <td><strong>{{$forms->maksud_perjalanan}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Frekuensi Perjalanan:</td>
                                    <td><strong>{{$forms->frekuensi_perjalanan}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Kendaraan Pribadi:</td>
                                    <td><strong>{{$forms->kendaraan_pribadi ? 'Punya' : 'Tidak'}}</strong></td>
                                </tr>
                            </table>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('forms.create.step.one') }}" class="btn btn-danger pull-right">Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
