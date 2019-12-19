@extends('admin.layouts.app')

@section('content')
@php
$sarantambalbanverifikasi = $data['sarantambalbanverifikasi'];
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
      <li><a href="{{ url('admin/tambalban') }}"><i class="fa fa-circle-o"></i> Tambal Ban</a></li>
      <li class="active"><i class="fa fa-plus"></i> Data Tambal Ban</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      
      <div class="col-sm-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Tambal Ban Baru</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <!-- form start -->
          <form method="post" action="{{ url('admin/tambalban/simpan/saran') }}" enctype="multipart/form-data">
            
            @csrf

            <input type="hidden" name="id_saran_tambal_ban" value="{{ $sarantambalbanverifikasi->id_tambal_ban }}">

            <div class="box-body">
              <div class="form-group col-sm-12">
                <label for="nama">Nama</label>
               <input type="text" class="form-control col-sm-6" id="nama" name="nama" value="{{ old('nama') }}" required>
                @error('nama')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
              
              <div class="form-group col-sm-12">
                <label for="alamat">Alamat</label>
                <textarea class="form-control col-xs-6" id="alamat" name="alamat" required readonly>{{ $sarantambalbanverifikasi->alamat }}</textarea>
                @error('alamat')
                <span class="help-block">{{ $message }}</span>
                @enderror 
              </div>

              <div class="form-group col-sm-12">
                <label for="telp">Telp</label>
                <input type="tel" class="form-control col-xs-6" id="telp" name="telp" value="{{ old('telp') }}" required>
                @error('telp')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group col-sm-12">
                <label for="telp">Foto</label>
                <input type="file" class="form-control col-xs-6" id="foto" name="foto" value="{{ old('foto') }}" multiple accept='image/*' required>
                @error('foto')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group col-sm-12">
                <label for="deskripsi col-xs-12">Deskripsi</label>
                
                <textarea class="textarea" name="deskripsi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>
                {{ old('deskripsi') }}	
                </textarea>

                @error('deskripsi')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
              
              <div class="form-group col-sm-12">
                <label for="nama">Latitude</label>
               	<input type="text" step="any" name="latitude" id="latitude" class="form-control" value="{{ $sarantambalbanverifikasi->latitude }}" readonly="readonly" required>
               	@error('latitude')
               	<span class="help-block">{{ $message }}</span>
               	@enderror
              </div>

              <div class="form-group col-sm-12">
                <label for="nama">Longitude</label>
               <input type="text" class="form-control col-sm-6" name="longitude" id="longitude" class="form-control" value="{{ $sarantambalbanverifikasi->longitude }}" readonly="readonly" required>
                @error('longitude')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>

            
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary"><span class="fa fa-hdd-o"></span> Simpan</button>
              &nbsp;
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

  <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

  
@endsection