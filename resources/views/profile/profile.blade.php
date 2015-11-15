@extends('layouts.master')
@section('content')
<script>
$(document).ready(function(){
$("#verhuurd").show();
$("#verhalen").show();
$("#gehuurd").show();
$('#knopgehuurd').click(function(e){
    $("#gehuurd").show();
    $("#verhalen").hide();
    $("#verhuurd").hide();
});
$('#knopverhuurd').click(function(e){
    $("#verhuurd").show();
    $("#gehuurd").hide();
    $("#verhalen").hide();
});
$('#knopverhalen').click(function(e){
    $("#verhalen").show();
    $("#gehuurd").hide();
    $("#verhuurd").hide();
});

});
</script>
<div class="profileinfo">
    <div class="picture">
        <p>{{substr(Auth::user()->voornaam, 0, 1)}}</p>
    </div>
    <div class="profiletext">
    <p>{{Auth::user()->voornaam}} {{Auth::user()->achternaam}}</p>
    </div>
</div>

<div class="knoppen">
    <div class="knop" id="knopgehuurd">
        <p>Gehuurd</p>
    </div>
    <div class="knop" id="knopverhuurd">
        <p>Verhuurd</p>
    </div>
    <div class="knop" id="knopverhalen">
        <p>Aanvragen</p>
    </div>
</div>
<div class="infoknoppen">
    <div id="gehuurd" class="profileparkeer">
        <div class="listparking" style="margin-top:20px;">
    @foreach ($gehuurd as $item)
    <script>
    function initialize() {
        var mapCanvas = document.getElementById('map{{$item->prkplid}}');
        var myLatlng = new google.maps.LatLng({{$item->latitude}}, {{$item->longitude}});
        var mapOptions = {
          center: myLatlng,
          zoom: 20,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
        });
        var map = new google.maps.Map(mapCanvas, mapOptions)
        marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <div class="listpark col-sm-4">
    <br>
        <div id="map{{$item->prkplid}}" style="width:100%;height:280px;"></div>
        <div class="info col-sm-12">
        <br>
        <p style="text-align:center;">Van <span style="font-weight: bold;">{{date('H:i', strtotime($item->BeschikbaarStarttijd))}}</span> tot <span style="font-weight: bold;">{{date('H:i', strtotime($item->BeschikbaarStoptijd))}}.</span></p>
        <p style="text-align:center;">Prijs: <span style="font-weight: bold;">{{$item->Prijs}}</span> / uur.</p>
        <form style="width:100%;padding-top:5px;margin-top:0;" method="POST" action="/parkeren">
            {!! csrf_field() !!}
            @if (count($errors))
                <ul class="alert alert-info">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            @endif
            <input type="submit" value="PARKEREN">
        </form>
        </div>
    </div>
    @endforeach
    </div>
    </div>
    <div id="verhuurd" class="profileparkeer">
        <div class="listparking" style="margin-top:20px;">
    @foreach ($verhuurd as $item)
    <script>
    function initialize() {
        var mapCanvas = document.getElementById('mapb{{$item->prkplid}}');
        var myLatlng = new google.maps.LatLng({{$item->latitude}}, {{$item->longitude}});
        var mapOptions = {
          center: myLatlng,
          zoom: 20,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
        });
        var map = new google.maps.Map(mapCanvas, mapOptions)
        marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <div class="listpark col-sm-4">
    <br>
        <div id="mapb{{$item->prkplid}}" style="width:100%;height:280px;"></div>
        <div class="info col-sm-12">
        <br>
        <p style="text-align:center;">Van <span style="font-weight: bold;">{{date('H:i', strtotime($item->BeschikbaarStarttijd))}}</span> tot <span style="font-weight: bold;">{{date('H:i', strtotime($item->BeschikbaarStoptijd))}}.</span></p>
        <p style="text-align:center;">Prijs: <span style="font-weight: bold;">{{$item->Prijs}}</span> / uur.</p>
        <form style="width:100%;padding-top:5px;margin-top:0;" method="POST" action="/parkeren">
            {!! csrf_field() !!}
            @if (count($errors))
                <ul class="alert alert-info">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            @endif
            <input type="submit" value="PARKEREN">
        </form>
        </div>
    </div>
    @endforeach
    </div>
    </div>
    <div id="verhalen" class="profileparkeer">
                <div class="listparking" style="margin-top:20px;">
    @foreach ($aanvragen as $item)
    <script>
    function initialize() {
        var mapCanvas = document.getElementById('mapg{{$item->prkplid}}');
        var myLatlng = new google.maps.LatLng({{$item->latitude}}, {{$item->longitude}});
        var mapOptions = {
          center: myLatlng,
          zoom: 20,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
        });
        var map = new google.maps.Map(mapCanvas, mapOptions)
        marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <div class="listpark col-sm-4">
    <br>
        <div id="mapg{{$item->prkplid}}" style="width:100%;height:280px;"></div>
        <div class="info col-sm-12">
        <br>
        <p style="text-align:center;">Door: <span style="font-weight: bold;">{{$item->adres}}</span></p>
        <form style="width:100%;padding-top:5px;margin-top:0;" method="POST" action="/accepteren">
            {!! csrf_field() !!}
            @if (count($errors))
                <ul class="alert alert-info">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            @endif
            <input type="submit" value="ACCEPTEREN">
        </form>
        </div>
    </div>
    @endforeach
    </div>
    </div>
</div>
@endsection