@extends('user.layouts.userlayout')

@section('content')
@php
  $latitude_user = $data['latitude_user'];
  $longitude_user = $data['longitude_user'];
@endphp
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<br>
<br>
<br>

<form method="post" action="{{ url('simpan-saran') }}" enctype="multipart/form-data">
@csrf
<div class="container col-lg-12">
@if(session()->get('sukses'))
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ session()->get('sukses') }}  
  </div>
@endif  
  <div class="card">
    <div class="card-header">Sarankan Lokasi</div>
    <div class="card-body">
      
        <input type="hidden" name="latitude_user" value="{{ $latitude_user }}">
        <input type="hidden" name="longitude_user" value="{{ $longitude_user }}">


        <div class="form-group row">
          <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat') }}</textarea>
            @error('alamat')
            <span>{{ $message }}</span>
            @enderror
          </div>
        </div>
        
        <div class="form-group row">
          <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="latitude" name="latitude" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="longitude" name="longitude" readonly>
          </div>
        </div>

        <div class="form-group row">
          <label for="longitude" class="col-sm-2 col-form-label">Captcha</label>
          <div class="col-sm-2">
            <div class="captcha">
              <span>{!! captcha_img() !!}</span>
              <button type="button" class="btn btn-success"><i class="fa fa-refresh" id="refresh"></i></button>
            </div>
          </div>
          <div class="col-sm-8">
            <input id="captcha" type="text" class="form-control"  placeholder="Enter Captcha" name="captcha" required>
            @error('captcha')
            <span>{{ $message }}</span>
            @enderror
          </div>
        </div>

    </div>
    <div class="card-footer">
      <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Kirim</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Cari Koordinat di Map</button>
          </div>
        </div>
    </div>
  </div>

<div class="modal fade bd-example-modal-lg" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Cari Koordinat Lokasi di Peta</h4>
        </div>
        <div class="modal-body">
          <div id="map" style="width: 100%; height: 400px;">
          </div>                 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-check"></i> Tetapkan Koordinat</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

</div>
</form>

<br>
<br>
<br>

 <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

  <script type="text/javascript">
    //* Fungsi untuk mendapatkan nilai latitude longitude
    function updateMarkerPosition(latLng) {
      document.getElementById('latitude').value = [latLng.lat()]
      document.getElementById('longitude').value = [latLng.lng()]
    }

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: new google.maps.LatLng({!! $latitude_user !!},{!! $longitude_user !!}),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
//posisi awal marker   
var latLng = new google.maps.LatLng({!! $latitude_user !!},{!! $longitude_user !!});

/* buat marker yang bisa di drag lalu 
  panggil fungsi updateMarkerPosition(latLng)
 dan letakan posisi terakhir di id=latitude dan id=longitude
 */
 var marker = new google.maps.Marker({
  position : latLng,
  title : 'lokasi',
  map : map,
  draggable : true
});

 updateMarkerPosition(latLng);
 google.maps.event.addListener(marker, 'drag', function() {
 // ketika marker di drag, otomatis nilai latitude dan longitude
 //menyesuaikan dengan posisi marker 
 updateMarkerPosition(marker.getPosition());
});
</script>

<script type="text/javascript">
$('#refresh').click(function(){
  $.ajax({
     type:'GET',
     url:'http://localhost:8000/refreshcaptcha',
     success:function(data){
        $(".captcha span").html(data.captcha);
     }
  });
});
</script>

@endsection