@extends('layout.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Manage Product</div>

                <div class="card-body">

                    <a href="{{ route('forms.create.step.one') }}" class="btn btn-primary pull-right">Create Product</a>

                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Profesi</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Kepemilikan Kendaraan</th>
                            <th scope="col">Ukuran Keluarga</th>
                            <th scope="col">Kedudukan Keluarga</th>
                            <th scope="col">Maksud Perjalanan</th>
                            <th scope="col">Frekuensi Perjalanan</th>
                            <th scope="col">Kendaraan Pribadi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($forms as $form)
                            <tr>
                                <th scope="row">{{$form->id}}</th>
                                <td>{{$form->profesi}}</td>
                                <td>{{$form->umur}}</td>
                                <td>{{$form->kepemilikan_kendaraan}}</td>
                                <td>{{$form->ukuran_keluarga}}</td>
                                <td>{{$form->kedudukan_keluarga}}</td>
                                <td>{{$form->maksud_perjalanan}}</td>
                                <td>{{$form->frekuensi_perjalanan}}</td>
                                <td>{{$form->kendaraan_pribadi ? 'Punya' : 'Tidak'}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
