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
        <div class="col-xs-7">
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
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tambal_ban_all as $tambalban)
                <tr>
                  <td><a href="{{ url('admin/tambalban/detail/'.$tambalban->id_tambal_ban) }}">{{ $tambalban->id_tambal_ban }}</a></td>
                  <td>{{ $tambalban->nama }}</td>
                  <td>
                  	<a href="{{ url('admin/tambalban/edit/'.$tambalban->id_tambal_ban) }}" class="btn btn-warning">
                  		<i class="fa fa-edit"></i>
                  	</a>
                  	<a href="{{ url('admin/tambalban/hapus/'.$tambalban->id_tambal_ban) }}" class="btn btn-danger">
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
        <div class="col-sm-5">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!-- form start -->
                        <form role="form">
                          <div class="box-body">
                            <div class="form-group col-sm-12">
                              <label for="id_tambal_ban">ID Tambal Ban</label>
                              <input type="text" class="form-control col-xs-6" id="id_tambal_ban" name="id_tambal_ban" placeholder="ID">
                            </div>
                            <div class="form-group col-sm-12">
                              <label for="nama">Nama</label>
                              <input type="text" class="form-control col-xs-6" id="nama" name="nama" placeholder="nama">
                            </div>
                            <div class="form-group col-sm-12">
                              <label for="alamat">Alamat</label>
                              <textarea class="form-control col-xs-6" id="alamat" name="alamat"></textarea> 
                            </div>
                            <div class="form-group col-sm-12">
                              <label for="telp">Telp</label>
                              <input type="text" class="form-control col-xs-6" id="telp" name="telp" placeholder="Telp">
                            </div>
                            <div class="form-group col-sm-12">
                              <label for="deskripsi">Deskripsi</label>
                              <textarea class="form-control col-xs-6" id="deskripsi" name="deskripsi"></textarea> 
                            </div>
                            <div class="row col-sm-12">
                                            <div class="col-xs-6">
                                              <input type="text" class="form-control" placeholder="Latitude">
                                            </div>
                                            <div class="col-xs-6">
                                              <input type="text" class="form-control" placeholder="Longitude">
                                            </div>
                                          </div>
                          </div>
                          <!-- /.box-body -->

                          <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
@endsection