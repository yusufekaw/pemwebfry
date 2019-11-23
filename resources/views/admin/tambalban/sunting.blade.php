@extends('admin.layouts.app')

@section('content')
@php
  $tambalban = $data['tambalban']; 
  $judul = $data['judul']; 
@endphp
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ $judul }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li><a href="{{ url('admin/tambalban') }}"> Tambal Ban</a></li>
      <li class="active">Sunting</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-sm-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">{{ $judul }}</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <!-- form start -->
          <form method="post" action="{{ url('admin/tambalban/perbarui/'.$tambalban->id_tambal_ban) }}">
            
            @csrf

            <div class="box-body">
              <div class="form-group col-sm-12">
                <label for="nama">Nama</label>
               <input type="text" class="form-control col-sm-6" id="nama" name="nama" value="{{ $tambalban->nama }}" required>
                @error('nama')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
              
              <div class="form-group col-sm-12">
                <label for="alamat">Alamat</label>
                <textarea class="form-control col-xs-6" id="alamat" name="alamat" required>{{ $tambalban->alamat }}</textarea>
                @error('alamat')
                <span class="help-block">{{ $message }}</span>
                @enderror 
              </div>

              <br><br>
              <div class="form-group col-sm-12">
                <label for="telp">Telp</label>
                <input type="tel" class="form-control col-xs-6" id="telp" name="telp" value="{{ $tambalban->telp }}" required>
                @error('telp')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group col-sm-12">
                <label for="deskripsi col-xs-12">Deskripsi</label>
                <textarea class="textarea" name="deskripsi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{ $tambalban->deskripsi }}</textarea> 
                @error('deskripsi')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>

              
              <div class="form-group col-sm-12">
                <label for="nama">Latitude</label>
                <input type="text" name="latitude" id="latitude" class="form-control" value="{{  $tambalban->latitude }}" readonly="readonly" required>
                @error('latitude')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group col-sm-12">
                <label for="nama">Longitude</label>
               <input type="text" class="form-control col-sm-6" name="longitude" id="longitude" class="form-control" value="{{ $tambalban->latitude }}" readonly="readonly" required>
                @error('longitude')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
            
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary"><span class="fa fa-hdd-o"></span> Simpan Perubahan </button>
              
              <div class="pull-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                <span class="fa fa-map"></span> Cari Koordinat di Map
                </button>
              </div>
              
            </div>

          </form>

        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade modal-lg" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Default Modal</h4>
        </div>
        <div class="modal-body">
          <div id="map" style="max-width: 750px; height: 400px;">
          </div>                 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tetapkan Koordinat</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <script type="text/javascript">
    //* Fungsi untuk mendapatkan nilai latitude longitude
    function updateMarkerPosition(latLng) {
      document.getElementById('latitude').value = [latLng.lat()]
      document.getElementById('longitude').value = [latLng.lng()]
    }

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: new google.maps.LatLng({{ $tambalban->latitude }},{{ $tambalban->longitude }}),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
//posisi awal marker   
var latLng = new google.maps.LatLng({{ $tambalban->latitude }},{{ $tambalban->longitude }});

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
@endsection