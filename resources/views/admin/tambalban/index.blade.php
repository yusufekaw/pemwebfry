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
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tambal_ban_all as $tambalban)
                <tr>
                  <td><a href="{{ url('admin/tambalban/detail/'.$tambalban->id_tambal_ban) }}">{{ $tambalban->id_tambal_ban }}</a></td>
                  <td>{{ $tambalban->nama }}</td>
                  <td>{{ $tambalban->alamat }}</td>
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
                <label for="nama">Nama</label>
                <br>
                <br>
                <input type="text" class="form-control col-sm-6" id="nama" name="nama" >
              </div>
                <br>
                <br>
              <div class="form-group col-sm-12">
                <label for="alamat">Alamat</label>
                <br>
                <br>
                <textarea class="form-control col-xs-6" id="alamat" name="alamat"></textarea> 
              </div>
                <br>
                <br>
              <div class="form-group col-sm-12">
                <label for="telp">Telp</label>
                <br>
                <br>
                <input type="text" class="form-control col-xs-6" id="telp" name="telp" >
              </div>
                <br>
                <br>
              <div class="form-group col-sm-12">
                <label for="deskripsi col-xs-12">Deskripsi</label>
                <br>
                <br>
                <textarea class="form-control col-xs-6" id="deskripsi" name="deskripsi"></textarea> 
              </div>
                <br>
                <br>
              <div class="row">
              <div class="form-group col-sm-12">
                <div class="col-sm-4">
                  <label for="latitude">Latitude</label>
                </div>
                <div class="col-sm-4">
                  <label for="longitude">Longitude</label>
                </div>
              </div>
              </div>
              <div class="row">
              <div class="form-group col-sm-12">
                <div class="col-sm-4">
                  <input type="text" name="latitude" id="latitude" class="form-control" >
                </div>
                <div class="col-sm-4">
                  <input type="text" name="longitude" id="longitude" class="form-control" >
                </div>
                <div class="col-sm-2">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    <span class="fa fa-map"></span> Map
                  </button>
                </div>
              </div>
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary"><span class="fa fa-hdd-o"></span> Submit</button>
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

<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
@endsection