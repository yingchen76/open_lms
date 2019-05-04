@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
	<h1>Lihat</h1>
@stop


@section('content')
	<div>
		<a href="/tugas/index/{{$kelas->id}}" class="btn btn-primary">Tambah Tugas</a>
		<a href="/murid/create/{{$kelas->id}}" class="btn btn-success">Lihat siswa</a>
	</div>
	<form action="{{ url('/kelas/lihat/' . $kelas->id) }}" method="post">
	{{ csrf_field() }}
	<label>Nama Kelas</label>
		<p>{{$kelas->nama_kelas}}</p>
	<label>Jenis Kelas</label><br>
		@if(@$kelas->jenis_kelas == "private")
		    Private Class
		@endif
		@if(@$kelas->jenis_kelas == "public")
			Public Class
		@endif
	</form>
@stop