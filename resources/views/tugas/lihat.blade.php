@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
	<h1>Lihat</h1>
@stop


@section('content')
	<form action="{{ url('/tugas/lihat/' . $kelas->id) }}" method="post">
		{{ csrf_field() }}
		<table class="table table-striped col-md-12">
						<tr>
							<th>Nama Tugas</th>
							<th>Deskripsi</th>
							<th>file Tugas</th>
							<th>Deadline</th>
							<th>Action</th>
						</tr>
			</tr>
			@foreach ($tugas as $tugas)
			<tr>
		@if ($kelas->id == $tugas->kelas_id)
		<td>{{$tugas->nama_tugas}}</td>
		<td>{{$tugas->deskripsi}}</td>
		<td>{{$tugas->file_tugas}}</td>
		<td>{{$tugas->deadline}}</td>
		<td>
			<a href="/file/{{$tugas->file_tugas}}" class="btn btn-primary btn-sm col-md-5">Download</a>
			<a href="/tugas/upload/{{$tugas->id}}" class="btn btn-primary btn-sm col-md-5">Upload</a>
		</td>
		@endif
		</tr>
		@endforeach
</table>
	</form>


@stop