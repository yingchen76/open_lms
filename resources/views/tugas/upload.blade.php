@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
	<h1>Upload Tugas</h1>
@stop

<div>
	@foreach($errors->all() as $message)
		<div>{{$message}}</div>
	@endforeach
</div>

@section('content')
	<form action="{{ url('/tugas/upload/' . $tugas->id) }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div>
			<input type="hidden" name="tugas_id" value="{{ Auth::user()->id }}">
			<input type="hidden" name="user_id" value="{{ $tugas->id }}">
		</div>
		<div>
			<input type="file" name="file_tugas">
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>

@stop