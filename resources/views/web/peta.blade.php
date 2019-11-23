<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
@php 
  $tambalban = $data['tambalban'];
@endphp

<div id="googleMap" style="max-width:100%;height:100%;"></div>
  

<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
function initialize() {
  
  var json = {!! $data['tambalban'] !!};

  var propertiPeta = {
    center:new google.maps.LatLng({!! $data['latitude'] !!},{!! $data['longitude'] !!}),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  
  // membuat Marker
  for(var i = 0; i < json.length; i++) {
  var obj = json[i];
  var marker=new google.maps.Marker({
      position: new google.maps.LatLng(obj.latitude,obj.longitude),
      map: peta
  });
}

}

google.maps.event.addDomListener(window, 'load', initialize);
</script>