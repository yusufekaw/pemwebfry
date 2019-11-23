<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Coming Soon - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
  <link href="{{ asset('start-bootstrap/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="{{ asset('start-bootstrap/css/coming-soon.min.css') }}" rel="stylesheet">

</head>

<body>

<form method="post" id="kirim" action="{{ url('peta') }}">
@csrf
<input type="hidden" name="latitude" id="latitude">
<input type="hidden" name="longitude" id="longitude">
</form>

  <div class="overlay"></div>

  <div class="masthead">
    <div class="masthead-bg"></div>
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-12 my-auto">
          <div class="masthead-content text-white py-5 py-md-0">
            <h4 class="mb-3">Selamat Datang di <small>Tambal Ban Finder</small></h4>
            <p class="mb-5">Kamu lagi nyari tambal ban terdekat di sekitarmu? Aktifin GPS kamu dengan menekan tombol share di bawah ini, kami akan bantu kamu nyari tambal ban terdekat.</p>
            <!--div class="input-group input-group-newsletter">
              <div class="input-group-append">
                <button class="btn btn-secondary" type="button">Notify Me!</button>
              </div>
            </div-->
            <button class="btn btn-secondary" type="button" onclick="getLocation()">Share Lokasi Saya</button>
            <hr/>
            <p class="mb-5">Kamu pemilik usaha tambal ban? share lokasi tambal banmu <a class="text text-success" href="">disini</a>.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="social-icons">
    <ul class="list-unstyled text-center mb-0">
      <li class="list-unstyled-item">
        <a href="#">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
      <li class="list-unstyled-item">
        <a href="#">
          <i class="fab fa-facebook-f"></i>
        </a>
      </li>
      <li class="list-unstyled-item">
        <a href="#">
          <i class="fab fa-instagram"></i>
        </a>
      </li>
    </ul>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="{{ asset('start-bootstrap/js/coming-soon.min.js') }}"></script>

</body>

<script>
var x = document.getElementById("demo");
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
  //x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
  document.getElementById("latitude").value = position.coords.latitude;
  document.getElementById("longitude").value = position.coords.longitude;
  document.getElementById("kirim").submit();
}
</script>

</html>