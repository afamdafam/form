@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('forms.create.step.two.post.2') }}" method="POST">
                @csrf

                <div class="card">
                    <div class="card-header">Data Tujuan</div>

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
                            <div class="mapform" >
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Latitude</label>
                                        <input type="text" class="form-control" value="{{ $forms->tujuan_latitude ?? ''}}" placeholder="0" name="tujuan_latitude" id="lat" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label for="Longitude">Longitude</label>
                                        <input type="text" class="form-control" value="{{ $forms->tujuan_longitude ?? ''}}" placeholder="0" name="tujuan_longitude" id="lng" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kota">Kota Tujuan</label>
                                    <select class="form-control" id="tujuan_kota" name="tujuan_kota">
                                        <option value="">Pilih Kota</option>
                                        <option value="Jakarta" {{ optional($forms)->tujuan_kota === 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                                        <option value="Bogor" {{ optional($forms)->tujuan_kota === 'Bogor' ? 'selected' : '' }}>Bogor</option>
                                        <option value="Depok" {{ optional($forms)->tujuan_kota === 'Depok' ? 'selected' : '' }}>Depok</option>
                                        <option value="Tangerang" {{ optional($forms)->tujuan_kota === 'Tangerang' ? 'selected' : '' }}>Tangerang</option>
                                        <option value="Bekasi" {{ optional($forms)->tujuan_kota === 'Bekasi' ? 'selected' : '' }}>Bekasi</option>
                                        <option value="Lainnya" {{ optional($forms)->tujuan_kota === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                </div>
                                <div id="map" style="height:400px; width: 400px;" class="my-6"></div>

                                <script>
                                    let map;
                                    function initMap() {
                                        map = new google.maps.Map(document.getElementById("map"), {
                                            center: { lat: -6.208347, lng: 106.848165 },
                                            zoom: 8,
                                            scrollwheel: true,
                                        });

                                        const uluru = { lat: -6.208347, lng: 106.848165 };
                                        let marker = new google.maps.Marker({
                                            position: uluru,
                                            map: map,
                                            draggable: true
                                        });

                                        google.maps.event.addListener(marker,'position_changed',
                                            function (){
                                                let lat = marker.position.lat()
                                                let lng = marker.position.lng()
                                                $('#lat').val(lat)
                                                $('#lng').val(lng)
                                            })

                                        google.maps.event.addListener(map,'click',
                                        function (event){
                                            pos = event.latLng
                                            marker.setPosition(pos)
                                        })
                                    }
                                </script>
                                <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
                                        type="text/javascript"></script>
                            </div>

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('forms.create.step.two.1') }}" class="btn btn-danger pull-right">Sebelumnya</a>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>
@endsection
