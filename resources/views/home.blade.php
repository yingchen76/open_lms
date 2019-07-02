@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

    <h1>Lihat Kelas</h1>
@stop

@section('content')

<h3><p>Silahkan Cari Kelas Anda</p></h3>
<form action="{{url('/home/cari') }}" method="post">
	{{ csrf_field() }}
	<input type="text" name="cari" placeholder="search..">
	<button type="submit" class="glyphicon glyphicon-search"></button>
</form>
<div class="container">
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Sample User details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Daftar Kelas</th>
               	<th>Nama Guru</th>
               	<th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $kelas)
            <tr>
                <td>{{$kelas->nama_kelas}}</td>
                <td>{{$kelas->user->name}}</td>
                <td><a href="/kelas/lihat/{{$kelas->id}}" class="btn btn-primary btn-sm col-md-2">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    
</div>
<br>
<br>

		<h4>Kelas Public</h4>
		<table class="table table-striped col-md-12">
			<tr>
				<th>Daftar Kelas</th>
				<th>Nama Guru</th>
				<th>Action</th>
				@foreach ($kelas as $kelas)
				<tr>
					@if($kelas->jenis_kelas == "public")
					<td>{{$kelas->nama_kelas}}</td>
					<td>{{$kelas->user->name}}</td>
					<td><a href="/kelas/lihat/{{$kelas->id}}" class="btn btn-primary btn-sm col-md-2">View</a></td>
					@endif
				</tr>
				@endforeach
		</table>

@stop