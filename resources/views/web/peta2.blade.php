@extends('user.layouts.userlayout')
@section('content')
@php
  $latitude_user = $data['latitude_user'];
  $longitude_user = $data['longitude_user'];
  $tambalban = $data['tambalban'];
@endphp

<script src="http://maps.googleapis.com/maps/api/js"></script>
<style>
.my-custom-class-for-label {
  width: 50px; 
  height: 20px;

  border: 1px solid #eb3a44;
  border-radius: 5px;
  background: #fee1d7;
  text-align: center;
  line-height: 20px;
  font-weight: bold;
  font-size: 14px;
  color: #eb3a44;
}

#map {
        height: 100%;
      }
      .info-window {background-color:yellow}

</style>
  
  <script>
  function initialize() {
    var propertiPeta = {
      center:new google.maps.LatLng({!! $latitude_user !!},{!! $longitude_user !!}),
      zoom:15,
      mapTypeId:google.maps.MapTypeId.ROADMAP
    };
        var infoWindow = new google.maps.InfoWindow;      
        var bounds = new google.maps.LatLngBounds();
    
   var tambalban = {!! $tambalban !!};
   console.log(tambalban);

    var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
    
    var lokasigue=new google.maps.Marker({
        position: new google.maps.LatLng({!! $latitude_user !!},{!! $longitude_user !!}),
        map: peta,
    });

    var infoWindow = new google.maps.InfoWindow;

    // membuat Marker
    @foreach($tambalban as $tambalban)
   var nama = '{!! Round($tambalban->jarak,2)."KM" !!}';
   var markerIcon = {
    url: '{{ asset($tambalban->foto) }}',
    scaledSize: new google.maps.Size(40, 40),
    origin: new google.maps.Point(0, 0),
    anchor: new google.maps.Point(32,65),
    labelOrigin: new google.maps.Point(40,33)
  };
    var marker=new google.maps.Marker({
        position: new google.maps.LatLng({{ $tambalban->latitude }},{{ $tambalban->longitude }}),
        map: peta,
    icon: markerIcon,
    label: {
      text: nama,
    }
    });
    @endforeach
    
  }
  
  // event jendela di-load  
  google.maps.event.addDomListener(window, 'load', initialize);
  </script>
  
  <div id="googleMap" style="width:100%;height:570px;"></div>
@endsection