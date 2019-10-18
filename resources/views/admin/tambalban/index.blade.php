@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data
        <small>tambal ban</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Tambal ban</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Tambal Ban</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Telp</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tambal_ban_all as $tambalban)
                <tr>
                  <td>{{ $tambalban->id_tambal_ban }}</td>
                  <td>{{ $tambalban->nama }}</td>
                  <td>{{ $tambalban->alamat }}</td>
                  <td>{{ $tambalban->telp }}</td>
                  <td>
                  	<a href="{{ url('admin/tambalban/ubah'.$tambalban->id_tambal_ban) }}" class="btn btn-warning">
                  		<i class="fa fa-edit"></i>
                  	</a>
                  	<a href="{{ url('admin/tambalban/hapus'.$tambalban->id_tambal_ban) }}" class="btn btn-danger">
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