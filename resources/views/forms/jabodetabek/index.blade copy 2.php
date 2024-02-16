@extends('layout.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body ">
                  <h5 class="card-title text-center">Survei Keefektifan Angkutan Umum Massal</h5>
                  <p class="card-text text-justify">
                    Di Indonesia, pelayanan angkutan umum belum menjadi pilihan yang menarik bagi pelaku perjalanan. Survei ini dilakukan untuk mengulas keefektifan pelayanan angkutan umum massal. Hasil dari survei ini diharapkan dapat memberi gambaran lebih mendalam berkaitan dengan keefektifan pelayanan angkutan umum massal yang harus diukur secara terperinci sehingga memberi manfaat kepada masyarakat dan dapat memberi arah pengembangan angkutan umum dimasa mendatang.
                    Sebagai langkah awal survei, cakupan wilayah yang akan diamati adalah JABODETABEK. </p>
                    <p><b>Akan ada reward secara acak bagi responden yang mengisi. Terima kasih atas partisipasinya.</b></p>
                    <br>
                  <a href="{{ route('forms.create.step.one') }}" class="btn btn-primary pull-right">Isi Form</a>

                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
