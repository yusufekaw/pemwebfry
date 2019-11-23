<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	html, body, #map-canvas {
		height: 100%;
		margin: 0;
		padding: 0;
	}
	</style>
</head>
<body onLoad="getLocation()">
<div>
	<h1>Test</h1>
	<p>Click the button to get your coordinates.</p>


<p  id="demo"></p>
</div>
<input type="text" name="latitude" id="latitude" onchange="location.reload()">
<input type="text" name="longitude" id="longitude">
<div id="map-canvas"></div>
</body>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
	// https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false
	// //code.jquery.com/jquery-1.11.0.min.js

	var map;

	// The JSON data
	var json = {!! $data['tambalban'] !!};


	function initialize() {
	  
	  // Giving the map som options
	  var mapOptions = {
	    zoom: 10,
	    center: new google.maps.LatLng(document.getElementById("latitude").value, document.getElementById("longitude").value)
	  };
	  
	  // Creating the map
	  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	  
	  
	  // Looping through all the entries from the JSON data
	  for(var i = 0; i < json.length; i++) {
	    
	    // Current object
	    var obj = json[i];

	    // Adding a new marker for the object
	    var marker = new google.maps.Marker({
	      position: new google.maps.LatLng(obj.latitude,obj.longitude),
	      map: map,
	      title: obj.nama // this works, giving the marker a title with the correct title
	    });

	    
	    // Adding a new info window for the object
	    var clicker = addClicker(marker, obj.nama);
	    
	 



	  } // end loop
	  
	  
	  // Adding a new click event listener for the object
	  function addClicker(marker, content) {
	    google.maps.event.addListener(marker, 'click', function() {
	      
	      if (infowindow) {infowindow.close();}
	      infowindow = new google.maps.InfoWindow({content: content});
	      infowindow.open(map, marker);
	      
	    });
	  }


	  

	  
	  
	 
	  
	  
	  
	}

	// Initialize the map
	google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script>
var latitude = document.getElementById("latitude");
var longitude = document.getElementById("longitude");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  document.getElementById("latitude").value = position.coords.latitude;
  document.getElementById("longitude").value = position.coords.longitude;
}
</script>

</html>