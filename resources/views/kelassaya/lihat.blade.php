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
								@foreach($kelas as $kelas)
								<td>{{ $kelas->nama_kelas }}</td>
								<td>{{ $kelas->jenis_kelas }}</td>
								<td>{{ $kelas->user->name }}</td>
								<td>
									
									<a href="/kelas/edit/{{$kelas->id}}" class="btn btn-primary btn-sm col-md-2">Edit</a>
									<a href="/kelas/lihat/{{$kelas->id}}" class="btn btn-primary btn-sm col-md-2">View</a>
									<form action="/kelas/delete/{{$kelas->id}}" method="post">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button type="submit" class="btn btn-danger btn-sm col-md-2">Hapus</button>

									</form>
								</td>
								@endforeach
							</tr>
						</table>
	          </div>

	         
	@stop
			
	      <!-- END CUSTOM TABS -->