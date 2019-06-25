@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
	<h1>Profile </h1>
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
					@if($user->tlp_show == 'show')
					<td>{{ $user->telepon }}</td>
					@else <td style="color: red;">{{"hidden"}}</td>
					@endif
				</tr>
				<tr>
					<td>Deskripsi</td>
					<td>{{ $user->deskripsi }}</td>
				</tr>
				<tr>
					<td>Lokasi</td>
					@if($user->lks_show == 'show')
					<td>{{ $user->lokasi }}</td>
					@else <td style="color: red;">{{"hidden"}}</td>
					@endif
				</tr>
			</table>
@stop
		
      <!-- END CUSTOM TABS -->