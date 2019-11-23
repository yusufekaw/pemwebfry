@extends('admin.layouts.app')

@section('content')
@php

$jam_operasional=$data['jam_operasional'];

@endphp
<div class="content-wrapper">
	<section class="content-header">
	  <h1>
	    {{ $data['judul'] }}
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
	    <li><a href="{{ url('admin/tambalban') }}"> Tambal Ban</a></li>
	  </ol>
	</section>

	 <section class="content">
	 	<div class="box">
	 	  <div class="box-header with-border">
	 	    <h3 class="box-title">{{ $data['judul'] }}</h3>
	 	    <div class="pull-right">
	 	    </div>
	 	  </div>
	 	  <!-- /.box-header -->
	 	  <div class="box-body">
	 	    <div class="box-body">
	 	    	<form method="post" action="{{ url('admin/tambalban/jam_operasional/perbarui/') }}">
	 	    	@csrf
	 	    	@foreach($jam_operasional as $jam_operasional)
	 	    		
	 	    		<input type="hidden" name="id_jam_operasional[]" value="{{ $jam_operasional->id_jam_operasional }}">
	 	    		<input type="hidden" name="id_tambal_ban[]" value="{{ $jam_operasional->id_tambal_ban }}">
	 	    	<div class="row">
	 	    		<div class="col-xs-4">
	 	    			<label for="jam_buka" class="col-sm-4 control-label">Hari Buka</label>
	 	    			<div class="input-group ">
	 	    				<span class="input-group-addon">
	 	    					<i class="fa fa-calendar"></i>
	 	    				</span>
	 	    				<input id="hari" type="text" name="hari[]" value="{{ $jam_operasional->hari }}" class="form-control">
	 	    			</div>
	 	    			@error('jam_buka')
	 	    			<p class="text-danger">{{ $message }}</p>
	 	    			@enderror
	 	    		</div>
	 	    		<div class="col-xs-4">
	 	    			<label for="jam_buka" class="col-sm-4">Jam Buka</label>
	 	    			<div class="input-group ">
	 	    				<span class="input-group-addon">
	 	    					<i class="glyphicon glyphicon-time"></i>
	 	    				</span>
	 	    				<input  type="time" name="jam_buka[]" value="{{ $jam_operasional->jam_buka }}" class="form-control">
	 	    			</div>
	 	    			@error('jam_buka')
	 	    			<p class="text-danger">{{ $message }}</p>
	 	    			@enderror
	 	    		</div>
	 	    		<div class="col-xs-4">
	 	    			<label for="jam_tutup" class="col-sm-4 control-label">Jam Tutup</label>
	 	    			<div class="input-group ">
	 	    				<span class="input-group-addon">
	 	    					<i class="glyphicon glyphicon-time"></i>
	 	    				</span>
	 	    				<input  type="time" name="jam_tutup[]" value="{{ $jam_operasional->jam_tutup }}" class="form-control">
	 	    			</div>
	 	    			@error('jam_tutup')
	 	    			<p class="text-danger">{{ $message }}</p>
	 	    			@enderror
	 	    		</div>
	 	    	</div>
	 	    	<br>
	 	    	@endforeach
	 	  	</div>
	 	  <!-- /.box-body -->
	 	  	<div class="box-footer">
             	<button type="submit" class="btn btn-primary"><span class="fa fa-hdd-o"></span> Simpan Perubahan </button>
            </div>
            </form>
	 	</div>
	 	<!-- /.box -->
	 </section>
</div>

@endsection