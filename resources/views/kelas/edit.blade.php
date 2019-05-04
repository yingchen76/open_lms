@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
	<h1>Ubah Kelas</h1>
@stop

@section('content')
	<form action="{{ url('/kelas/edit/' . $kelas->id) }}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label>Nama Kelas</label>
			<input type="text" name="nama_kelas" value="{{$kelas->nama_kelas}}" class="form-control">
			</div>
			<div class="form-group">
			<label>Jenis Kelas</label><br>
			<input type="radio" name="jenis_kelas" value="private"  @if(@$kelas->jenis_kelas == "private") checked @endif>&nbsp;&nbsp;Private Class&nbsp;&nbsp;
			<input type="radio" name="jenis_kelas" value="public" @if(@$kelas->jenis_kelas == "public") checked @endif> &nbsp;&nbsp;Public Class&nbsp;&nbsp;
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>

@stop