@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
	<h1>Kelas</h1>
@stop

<div>
	@foreach($errors->all() as $message)
		<div>{{$message}}</div>
	@endforeach
</div>
@section('content')
	<form action="{{ url('/tugas/new/'.$kelas->id) }}" enctype='multipart/form-data' method="post">
		{{csrf_field()}}
		<div>
			<label>Kelas</label>
			<input type="text" name="namakelas" value ="{{$kelas->nama_kelas}}" readonly class="form-control">
			<input type="hidden" name="kelas_id" value="{{$kelas->id}}">
		</div>
		<div>
			<label>Nama Tugas</label>
			<input type="text" name="nama_tugas" class="form-control">
		</div>
		<div>
			<label>Deskripsi Tugas</label>
			<textarea name="deskripsi" class="form-control"> </textarea>
		</div>
		<div>
			<label>File Tugas</label>
			<input type="file" name="file_tugas" class="form-control">
		</div>
		<div>
			<label>Deadline Tugas</label>
			<input type="date" name="deadline" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
		
		
	</form>
					
@stop
 