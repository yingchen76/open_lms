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
<a href="kelas/new" class="btn btn-primary">Edit Profile</a>
			<table class="table table-bordered">
				<tr>
					<td>Nama Lengkap</td>
					<td>{{ Auth::user()->name }}</td>
				</tr>
				<tr>
					<td>NickName</td>
					<td>{{ Auth::user()->nickname }}</td>
				</tr>				
				<tr>
					<td>Email</td>
					<td>{{ Auth::user()->email }}</td>
				</tr>
				<tr>
					<td>Foto</td>
					<td><img src="/user_picture/{{ Auth::user()->profile_picture }}" style="height: 190px;"></td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>{{ Auth::user()->telepon }}</td>
				</tr>
				<tr>
					<td>Deskripsi</td>
					<td>{{ Auth::user()->deskripsi }}</td>
				</tr>
				<tr>
					<td>Lokasi</td>
					<td>{{ Auth::user()->lokasi }} </td>
				</tr>
			</table>
@stop
		
      <!-- END CUSTOM TABS -->