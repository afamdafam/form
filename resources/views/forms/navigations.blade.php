@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Navigasi</div>

                    <div class="card-body">
                            <form id="directionsForm">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="startAddress">Starting Address:</label>
                                        <input type="text" id="startAddress" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="endAddress">Destination Address:</label>
                                        <input type="text" id="endAddress" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                    <label for="transportMode">Transport Mode:</label>
                                        <select id="transportMode">
                                            <option value="DRIVING">Driving</option>
                                            <option value="BICYCLING">Bicycling</option>
                                            <option value="TRANSIT">Transit</option>
                                            <option value="WALKING">Walking</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit">Get Directions</button>
                                    </div>
                                </div>

                                <div id="map" style="height:400px; width: 400px;" class="my-6"></div>

                                <div id="directionsPanel"></div> 
                                <div id="infoPanel"></div>      
                                
                                <script src="{{ URL::asset('js/app.js'); }}"></script>
                                <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap"
                                        type="text/javascript"></script>
                            </div>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>
@endsection