@extends('admin.layouts.app')

@section('content')
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
@php 
  $tambalban = $data['tambalban'];
  $judul = $data['judul'];
@endphp
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ $judul }}
    </h1>
    <ol class="breadcrumb">
      <li class="active"><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    
  	<div class="row">
  		<div class="col-xs-12">
  			<div class="callout callout-success">
  				<h4>Hai {{ Auth::user()->name }}</h4>

  				<p>Selamat Datang di halaman dashboard admin</p>
  			</div>
  		</div>
  	</div>
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Lokasi Tambal Ban Anda</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div id="googleMap" style="max-width:100%;height:500px;"></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


  <!-- /.modal -->

  

<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
function initialize() {
  
  var json = {!! $data['tambalban'] !!};

  var propertiPeta = {
    center:new google.maps.LatLng({!! $data['rata_latitude'] !!},{!! $data['rata_longitude'] !!}),
    zoom:9,
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

@endsection