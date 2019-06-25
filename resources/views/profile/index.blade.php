@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
	<h1>Profile Setting</h1>
@stop


@section('content')
<!-- START CUSTOM TABS -->
<div>
	@foreach($errors->all() as $message)
		<div>{{$message}}</div>
	@endforeach
	
</div>
<div class="col-md-4">
		<img src="/user_picture/{{ Auth::user()->profile_picture }}" height="350" width="300">
		<div class="col-md-2">
		</div>
		<div class="col-md-10">
			<br>
			<a href="profile/edit/{{ Auth::user()->id }}" class="btn btn-primary">Edit Profile</a>
			<a href="profile/editakun/{{ Auth::user()->id }}" class="btn btn-primary">Edit Akun</a>
		</div>
	</div>
<br><br>
<tr>
	<div class="col-md-8" style="font-family : Halvetica; ">
	Nama: {{Auth::user()->name}}
	<br><br>
	Nickname: {{Auth::user()->nickname}}
	<br><br>
	Email: {{ Auth::user()->email}}
	<br><br>
	Telepon: {{ Auth::user()->telepon}}
	<br><br>
	Deskripsi: {{ Auth::user()->deskripsi}}
	<br><br>
	Lokasi: {{ Auth::user()->lokasi}}
	</div>
</tr>
					
@stop
		
      <!-- END CUSTOM TABS -->