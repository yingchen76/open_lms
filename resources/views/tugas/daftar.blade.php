
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
	<h1>Dokumen</h1>
@stop


@section('content')
<!-- START CUSTOM TABS -->
<div>
	@foreach($errors->all() as $message)
		<div>{{$message}}</div>
	@endforeach
	
</div>
		<table class="table table-striped col-md-12">
			<tr>
				<th>Nama</th>
				<th>File</th>
				<th>Action</th>
				@foreach ($uploads as $upload)
				<tr>
					<td>{{$upload->tugas->nama_tugas}}</td>
					<td>{{$upload->tugas->file_tugas}}</td>
					<td><a href="/file/{{$upload->tugas->file_tugas}}" class="btn btn-primary btn-sm col-md-5">Download</a>
											<div class="container-box rotated">	
											</div>
										</td>
				</tr>
						
							@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>

		</table>
	
@stop
		
      <!-- END CUSTOM TABS -->