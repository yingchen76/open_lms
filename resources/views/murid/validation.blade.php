@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Tambah Murid
				</div>
				<div class="card-body">
					
				</div>
				<div>
					@foreach ($user as $user)
					@if(Session::get('kls_id') == $kelas->id) 
					<form action="{{ url('/murid/new/ .$kelas->id') }}" method="post">
						{{ csrf_field() }}
						<label>Nama Kelas</label>
							<p>{{$kelas->nama_kelas}}</p>
							<label>id kelas</label><br>
							<input type="text" name="kelas_id" class="form-control" value="{{$kelas->id}}">
						<label>id user</label><br>
							<input type="text" name="user_id" class="form-control" value="{{$user->id}}">
					</form>
					@endif
					@endforeach
				</div>
			<div>
			</div>
			</div>

		</div>
	</div>
</div>
@endsection