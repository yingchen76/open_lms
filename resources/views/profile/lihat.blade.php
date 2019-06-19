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
			<table class="table table-bordered">
				<tr>
					<td>Nama Lengkap</td>
					<td>{{ $user->name }}</td>
				</tr>
				<tr>
					<td>NickName</td>
					<td>{{ $user->nickname}}</td>
				</tr>				
				<tr>
					<td>Email</td>
					<td>{{ $user->email }}</td>
				</tr>
				<tr>
					<td>Foto</td>
					<td><img src="/user_picture/{{ $user->profile_picture }}" height="150"></td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>{{ $user->telepon }}</td>
				</tr>
				<tr>
					<td>Deskripsi</td>
					<td>{{ $user->deskripsi }}</td>
				</tr>
				<tr>
					<td>Lokasi</td>
					<td>{{ $user->lokasi }} </td>
				</tr>
			</table>
@stop
		
      <!-- END CUSTOM TABS -->