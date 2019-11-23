@extends('admin.layouts.app')
@section('content')
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
@php 
  $tambalban = $data['tambalban'];
  $jam_operasional = $data['jam_operasional'];
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
      <div class="col-sm-12 col-xs-12">
         @if(session()->get('sukses'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ session()->get('sukses') }}  
        </div>
        @endif
      </div>

      <div class="col-sm-3 col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Foto {{ $tambalban->nama }}</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <p>Klik gambar untuk mengganti foto</p>
            <form method="post" action="{{ url('admin/tambalban/update_foto') }}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id_tambal_ban" value="{{ $tambalban->id_tambal_ban }}">
              <label>
                <img src="{{ asset($tambalban->foto) }}" style="max-width: 100%; max-height: 100%">
                <input type="file" name="foto" class="btn btn-default" style="display: none" onchange="form.submit()">
              </label>
            </form>
          </div>
          <!-- /.box-body -->
        </div>          
      </div>
      <div class="col-sm-5 col-xs-12">

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
                <td>{!! $tambalban->alamat !!}</td>
              </tr>
              <tr>
                <th>Telp</th>
                <td>{{ $tambalban->telp }}</td>
              </tr>
              <tr>
                <th>Deskripsi</th>
                <td>{!! $tambalban->deskripsi !!}</td>
              </tr>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>

       <div class="col-sm-4 col-xs-12">

        <div class="box">
          <form method="post" class="form-horizontal" action="{{ url('admin/tambalban/jam_operasional/simpan') }}">
            @csrf
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Jam Operasional</h3>
            <div class="pull-right">
              <button type="submit" class="btn btn-info"><span class="fa fa-plus"></span></button> 
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            
            <div class="form-group">
              <label for="hari" class="col-sm-4 control-label">Hari</label>
              <div class="col-sm-8">              
                <div class="input-group ">
                  <span class="input-group-addon">
                    <i class="fa fa-calendar-minus-o "></i>
                  </span>
                  <select class="form-control" name="hari" id="hari">
                    <option>-</option>
                    <option value="senin">Senin</option>
                    <option value="selasa">Selasa</option>
                    <option value="rabu">Rabu</option>
                    <option value="kamis">Kamis</option>
                    <option value="jumat">Jumat</option>
                    <option value="sabtu">Sabtu</option>
                    <option value="minggu">Minggu</option>
                  </select>
                </div>
                @error('hari')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            
            <div class="form-group">
              <label for="jam_buka" class="col-sm-4 control-label">Jam Buka</label>
              <div class="col-sm-8">              
                <div class="input-group ">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-time"></i>
                  </span>
                  <input id="jam_buka" type="text" name="jam_buka" class="form-control input-small">
                </div>
                @error('jam_buka')
                <p class="text-danger">{{ $message }}</p>
                @enderror 
              </div>
            </div>

            <div class="form-group">
              <label for="jam_tutup" class="col-sm-4 control-label">Jam Tutup</label>
              <div class="col-sm-8">              
                <div class="input-group ">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-time"></i>
                  </span>
                  <input id="jam_tutup" type="text" name="jam_tutup" class="form-control input-small">
                </div>
                @error('jam_tutup')
                <p class="text-danger">{{ $message }}</p>
                @enderror 
              </div>
            </div>

          </div>
          <!-- /.box-body -->
          <input type="hidden" name="id_tambal_ban" value="{{ $tambalban->id_tambal_ban }}">
          </form>
        </div>
        <!-- /.box -->
        
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Jam Operasional</h3>
            <div class="pull-right">
              <a href="{{ url('admin/tambalban/jam_operasional/sunting/'.$tambalban->id_tambal_ban) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table  class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Hari</th>
                  <th>Jam</th>
                  <th>Hapus</th>
                </tr>  
              </thead>
              <tbody>
                @foreach($jam_operasional as $jam_operasional)
                <tr>
                  <td>{{ ucfirst($jam_operasional->hari) }}</td>
                  <td>
                    {{ date('H:i',strtotime($jam_operasional->jam_buka)) }} - {{ date('H:i',strtotime($jam_operasional->jam_tutup)) }}
                  </td>
                  <td>
                    <a onclick="confirm('Apa anda yakin')" href="{{ url('admin/tambalban/jam_operasional/hapus/'.$jam_operasional->id_jam_operasional) }}" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
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
            <h3 class="box-title">Lokasi {{ $tambalban->nama }}</h3>
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
    center:new google.maps.LatLng({!! $tambalban->latitude !!},{!! $tambalban->longitude !!}),
    zoom:9,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  
  // membuat Marker
  var marker=new google.maps.Marker({
      position: new google.maps.LatLng({!! $tambalban->latitude !!},{!! $tambalban->longitude !!}),
      map: peta
  });

}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection