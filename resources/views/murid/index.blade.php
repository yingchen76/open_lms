@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-cinter">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Murid Saya
				</div>
				<div class="card-body">
					<table class="table table-stripped">
						<tr>
							<th>Nama</th>
							<th>Email</th>
							<th>Pengajar</th>
						</tr>
						<tr>
							@foreach ($murid as $m)
							<td>{{$m->id_kelas}}</td>
							<td>{{$m->id_murid}}</td>
							@endforeach
						</tr>
						
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection