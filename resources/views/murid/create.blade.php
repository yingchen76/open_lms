@extends('layouts.app')
@section('content')
<div>
	@foreach($errors->all() as $message)
		<div>{{$message}}</div>
	@endforeach
	
</div>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Tambah Murid
				</div>
				<div class="card-body">
					<form action="{{url('/murid/new/'.$kelas->id)}}" method="post">
						{{csrf_field()}}
						<div class="form-group">
							<label>Kelas</label>
							<input type="text" name="" class="form-control" value="{{$kelas->nama_kelas}}" readonly>
							<input type="hidden" name="kelas_id" class="form-control" value="{{$kelas->id}}" readonly>
						</div>
						<div class="form-group">
							<label>Email Murid</label>
							<input type="text" name="email" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>
				
			<div>
				<table class="table table-stripped">
					<tr>
						<td>nama kelas</td>
						<td>nama murid</td>
					</tr>
					@foreach ($murid as $mk)
					@if ($mk->kelas_id == $kelas->id)
					<tr>
						<td>{{$mk->kelas_id}}</td>
						<td>{{$mk->user_id}}</td>
					</tr>
					@endif
					@endforeach
				</table>
			</div>
			</div>

		</div>
	</div>
</div>
@endsection