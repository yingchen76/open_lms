@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
	<h1>Kelas</h1>
@stop

@section('content')
					<form action="{{ url('/kelas/new') }}" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<label>Nama Kelas</label>
							<input type="text" name="nama_kelas" class="form-control">
						</div>
						<div class="form-group">
							<label>Jenis Kelas</label><br>
							<input type="radio" name="jenis_kelas" value="private">&nbsp;&nbsp;Private Class&nbsp;&nbsp;
							<input type="radio" name="jenis_kelas" value="public"> &nbsp;&nbsp;Public Class&nbsp;&nbsp;
						</div>
						<div class="form-group">
							<label>Nama Guru</label>
							<input type="text" name="" value="{{ Auth::user()->name }}" class="form-control">
							<input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}" readonly>
						</div>						
						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
@stop