@extends('user.layouts.userlayout')
@section('content')
<br>
<br>
<br>
<div class="container col-lg-12">
  <nav aria-label="breadcrumb bg-success">
    <div class="p-3 mb-2 bg-info text-white"><h3>Daftar Lokasi Tambal Ban</h3></div>
  </nav>
      <div class="accordion" id="accordionExample">
        @foreach($data['tambalban'] as $tambalban)
        <div class="card">
          <div class="card-header" id="headingOne">
           <span class="badge badge-info float-right m-2">{!! Round($tambalban->jarak,2) !!} KM</span> 
           <span class="float-left"><img src="{{ asset($tambalban->foto) }}" style="width: 60px;">&nbsp;</span>    
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{ $tambalban->id_tambal_ban }}" aria-expanded="true" aria-controls="{{ $tambalban->id_tambal_ban }}">
                <h5>{!! $tambalban->nama !!}</h5>
              </button>
              <p><a class="btn btn-success" href="tel:{{$tambalban->telp}}"><i class="fa fa-phone"></i> {!! $tambalban->telp !!}</a></p>
            </div>
          <div id="{{ $tambalban->id_tambal_ban }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">{!! $tambalban->deskripsi !!}</div>
          </div>
        </div> 
        @endforeach
      </div>
</div>

<br>
<br>
<br>
@endsection