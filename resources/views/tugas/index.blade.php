@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
	<h1>Kelas</h1>
@stop


@section('content')
	<div>
		<a href="/tugas/lihat/{{$kelas->id}}" class="btn btn-primary">Lihat Tugas</a>
	</div>
	<form action="{{ url('/tugas/new/'.$kelas->id) }}" enctype='multipart/form-data' method="post">
		{{csrf_field()}}
		<div>
			<label>Kelas</label>
			<input type="text" name="namakelas" value ="{{$kelas->nama_kelas}}" readonly>
			<input type="hidden" name="kelas_id" value="{{$kelas->id}}">
		</div>
		<div>
			<label>Nama Tugas</label>
			<input type="text" name="nama_tugas">
		</div>
		<div>
			<label>Deskripsi Tugas</label>
			<textarea name="deskripsi"> </textarea>
		</div>
		<div>
			<label>File Tugas</label>
			<input type="file" name="file_tugas">
		</div>
		<div>
			<label>Deadline Tugas</label>
			<input type="date" name="deadline">
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
		
		
	</form>
					
@stop