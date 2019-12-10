@extends('user.layouts.userlayout')
@section('content')
@php
  $latitude_user = $data['latitude_user'];
  $longitude_user = $data['longitude_user'];
  $tambalban = $data['tambalban'];
@endphp
<style>
      #map-canvas {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 30px;
        width: 100%;
        height: 100%;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    
  <script>
    var marker;
      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          center:new google.maps.LatLng({!! $latitude_user !!},{!! $longitude_user !!}),
          zoom:15,
          mapTypeId:google.maps.MapTypeId.ROADMAP
        }     
        
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var infoWindow = new google.maps.InfoWindow;      
        var bounds = new google.maps.LatLngBounds();
 
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }

        var markerIcon = {
          url: '{!! url("img/marker/marker.png") !!}',
          scaledSize: new google.maps.Size(40, 40),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(30,60),
          labelOrigin: new google.maps.Point(15,15)
        };
 
          function addMarker(lat, lng, info, jarak) {
            var jarak = jarak.toString();
            var pt = new google.maps.LatLng(lat, lng);
            bounds.extend(pt);
            var marker = new google.maps.Marker({
                map: map,
                position: pt,
                icon: markerIcon,
                label: {
                  text: " "+jarak+"km",
                  color: 'white',
                  fontSize: '12px',
                }
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
          }
 
          @foreach($tambalban as $tambalban)
            @if($tambalban->jarak<=10)
            addMarker(
              {!! $tambalban->latitude !!}, 
              {!! $tambalban->longitude !!}, 
              '{{$tambalban->nama}}<br>{{$tambalban->alamat}}<br><a href="tel:{{$tambalban->telp}}">{{$tambalban->telp}}',
              {!! Round($tambalban->jarak,1).'' !!}
            );
            @endif
          @endforeach
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <div id="map-canvas"></div>
@endsection

