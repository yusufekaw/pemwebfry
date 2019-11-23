@extends('admin.layouts.app')

@section('content')
@php
$judul = $data['judul'];
$tambalban = $data['tambalban'];
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
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        @if(session()->get('sukses'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ session()->get('sukses') }}  
        </div>
        @endif
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">{{ $judul }}</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-striped table-bordered nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>foto</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tambalban as $tambalban)
                <tr>
                  <td>
                    <a href="{{ url('admin/tambalban/detail/'.$tambalban->id_tambal_ban) }}">{{ $tambalban->id_tambal_ban }}</a>
                  </td>
                  <td>
                    <img src="{{ asset($tambalban->foto) }}" style="width: 50px; height: 50px" />
                  </td>
                  <td>{{ $tambalban->nama }}</td>
                  <td>{{ $tambalban->alamat }}</td>
                  <td>
                  	<a href="{{ url('admin/tambalban/sunting/'.$tambalban->id_tambal_ban) }}" class="btn btn-warning">
                  		<i class="fa fa-edit"></i>
                  	</a>
                  	<a onclick="return confirm('Apakah anda yakin ingin menghapus data berikut?');" href="{{ url('admin/tambalban/hapus/'.$tambalban->id_tambal_ban) }}" class="btn btn-danger">
                  		<i class="fa fa-trash"></i>
                  	</a>
                  </td>
                </tr>
                @endforeach
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->

    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection