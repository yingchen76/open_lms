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
							
							<tr>
								@if ($murid->user_id == Auth::user()->id)
								@endif
							</tr>
						</table>
	          </div>

	         
	@stop
			
	      <!-- END CUSTOM TABS -->