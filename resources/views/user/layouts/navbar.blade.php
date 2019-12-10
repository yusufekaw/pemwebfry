@php
  $latitude_user = $data['latitude_user'];
  $longitude_user = $data['longitude_user'];
@endphp
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark navbar-fixed-top">
  <a class="navbar-brand text-white" href="#"><b>Tambal Ban Online</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('peta') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('daftarlokasi?latitude='.$latitude_user.'&longitude='.$longitude_user) }}">Daftar Lokasi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0" action="{{url('/peta/cari')}}" method="GET">
      <input class="form-control mr-sm-2" type="search" placeholder="Cari Lokasi" name="cari" aria-label="Search" value="{{ old('cari') }}">
      <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="CARI">
    </form>
  </div>
</nav>