	@extends('adminlte::page')

	@section('title', 'AdminLTE')

	@section('content_header')
		<h1>Kelas Saya</h1>
	@stop


	@section('content')
	<!-- START CUSTOM TABS -->


							<table class="table table-striped col-md-12">
							<tr>
								<th>Nama Kelas</th>
								<th>Jenis Kelas</th>
								<th>Nama Guru</th>
								<th>Action</th>
							</tr>
							
								@foreach($murids as $murid)
							<tr>
			     					@if($murid->user_id == Auth::user()->id)   	
			     					<td>{{$murid->kelas->nama_kelas}}</td>
			     					<td>{{$murid->kelas->jenis_kelas}}</td>
			     					<td>{{$murid->kelas->user->name}}</td>
			     					<td>
			     						<a href="/kelassaya/lihat/{{$murid->kelas_id}}" class="btn btn-primary btn-sm col-md-2">View</a>
			     					</td>
			     					@endif
							</tr>
		       					@endforeach
						</table>
	          </div>

	         
	@stop
			
	      <!-- END CUSTOM TABS -->