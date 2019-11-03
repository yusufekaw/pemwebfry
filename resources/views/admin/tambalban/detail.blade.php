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
      <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li><a href="{{ url('admin/tambalban') }}"> Tambal ban</a></li>
      <li class="active">Detail</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">{{ $judul }}</h3>
            <div class="pull-right">
              <a href="{{ url('admin/tambalban/sunting/'.$tambalban->id_tambal_ban) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table  class="table table-bordered table-striped">
              <tr>
                <th>Nama</th>
                <td>{{ $tambalban->nama }}</td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td>{{ $tambalban->alamat }}</td>
              </tr>
              <tr>
                <th>Telp</th>
                <td>{{ $tambalban->telp }}</td>
              </tr>
              <tr>
                <th>Deskripsi</th>
                <td>{{ $tambalban->deskripsi }}</td>
              </tr>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Data Tambal Ban</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div id="googleMap" style="width:100%;height:380px;"></div>
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
  var propertiPeta = {
    center:new google.maps.LatLng({{ $tambalban->latitude }},{{ $tambalban->longitude }}),
    zoom:9,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  
  // membuat Marker
  var marker=new google.maps.Marker({
      position: new google.maps.LatLng({{ $tambalban->latitude }},{{ $tambalban->longitude }}),
      map: peta
  });

}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection