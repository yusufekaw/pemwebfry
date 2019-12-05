@extends('user.layouts.userlayout')
@section('content')
<div class="container">
  <h1> DAFTAR LOKASI TAMBAL BAN DI SURABAYA</h1>
  
  <table class="table table-hover table-responsive">
  <thead>
    <tr class="table-primary">
      <th scope="col">Foto</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Telp</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
  <tbody>
  @foreach($peta as $p)
    <tr>
      <td><img src="{{ asset($p->foto) }}" style="width: 50px; height: 50px" /></td>
      <td>{{$p->nama}}</td>
      <td>{{$p->alamat}}</td>
      <td>{{$p->telp}}</td>
      <td>{!!$p->deskripsi!!}</td>
      <td>
        <a class="btn btn-primary" href="#" role="button"><i class="fab fa-whatsapp"></i> Panggil</a>
        <a class="btn btn-success" href="#" role="button"><i class="fas fa-map-marker-alt"></i> Peta</a>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $peta->links() }}


</div>
@endsection