@extends('layout.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body ">
                  <h5 class="card-title text-center">Form Telah Berhasil Diisi !</h5>
                  <p class="card-text text-center">
                    Diizinkan untuk mengisi kembali jika ada anggota keluarga lain.
                  </p>
                  <a href="{{ route('forms.index') }}" class="btn btn-primary pull-right">Lanjutkan</a>

                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
