@extends('layouts.master')
@section('content')
<div class="listparking" style="margin-top:20px;">
 	@foreach ($items as $item)
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
@endsection