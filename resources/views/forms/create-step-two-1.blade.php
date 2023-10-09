@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('forms.create.step.two.post.1') }}" method="POST">
                @csrf

                <div class="card">
                    <div class="card-header">Data Alamat Asal</div>

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
                                        <input type="text" class="form-control" value="{{ $forms->alamat_latitude ?? ''}}" placeholder="0" name="alamat_latitude" id="lat" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label for="Longitude">Longitude</label>
                                        <input type="text" class="form-control" value="{{ $forms->alamat_longitude ?? ''}}" placeholder="0" name="alamat_longitude" id="lng" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Kecamatan</label>
                                        <input type="text" class="form-control" value="{{ $forms->alamat_kecamatan?? ''}}" placeholder="-" name="alamat_kecamatan" id="kecamatan" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label for="kelurahan">Kelurahan</label>
                                        <input type="text" class="form-control" value="{{ $forms->alamat_kelurahan?? ''}}" placeholder="-" name="alamat_kelurahan" id="kelurahan" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kelurahan">Kota</label>
                                    <input type="text" class="form-control" value="{{ $forms->alamat_kota?? ''}}" placeholder="-" name="alamat_kota" id="kota" readonly>
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

                                                // Perform reverse geocoding to get kecamatan, kelurahan, and kota
                                                const geocoder = new google.maps.Geocoder();
                                                const latLng = new google.maps.LatLng(lat, lng);

                                                geocoder.geocode({ 'latLng': latLng }, function (results, status) {
                                                    if (status === google.maps.GeocoderStatus.OK) {
                                                        if (results[0]) {
                                                            for (let i = 0; i < results[0].address_components.length; i++) {
                                                                const addressType = results[0].address_components[i].types[0];
                                                                const addressLongName = results[0].address_components[i].long_name;

                                                                if (addressType === 'administrative_area_level_3') {
                                                                    $('#kecamatan').val(addressLongName);
                                                                }
                                                                if (addressType === 'administrative_area_level_4') {
                                                                    $('#kelurahan').val(addressLongName);
                                                                }
                                                                if (addressType === 'administrative_area_level_2') {
                                                                    $('#kota').val(addressLongName);
                                                                }
                                                            }
                                                        }
                                                    }
                                                });
                                            });

                                        google.maps.event.addListener(map,'click',
                                        function (event){
                                            pos = event.latLng
                                            marker.setPosition(pos)
                                        })
                                    }
                                </script>
                                <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap"
                                        type="text/javascript"></script>
                            </div>

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('forms.create.step.one') }}" class="btn btn-danger pull-right">Sebelumnya</a>
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
