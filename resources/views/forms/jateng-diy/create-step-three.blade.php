@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('forms.jateng-diy.create.step.three.post') }}" method="POST">
                @csrf

                <div class="card">
                    <div class="card-header">Data Pilihan Mode Kendaraan</div>

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
                                <label for="description">Pilihan Mode Kendaraan</label><br/>
                                <label class="radio-inline"><input type="radio" name="option" value="1" {{{ (isset($forms->option) && $forms->option == '1') ? "checked" : "" }}}> Kendaraan Pribadi</label><br/>
                                <label class="radio-inline"><input type="radio" name="option" value="0" {{{ (isset($forms->option) && $forms->option == '0') ? "checked" : "" }}}> Kendaraan Umum</label>
                            </div>

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('forms.jateng-diy.create.step.two.2') }}" class="btn btn-danger pull-right">Sebelumnya</a>
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
