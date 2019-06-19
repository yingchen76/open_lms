
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
@if ($uploads->tugas->id == $uploads->tugas_id)
	<h1> {{$tugas->id}} </h1> 
@endif
@stop


@section('content')
<!-- START CUSTOM TABS -->
<div>
	@foreach($errors->all() as $message)
		<div>{{$message}}</div>
	@endforeach
	
</div>

			<table class="table table-bordered">

				

			</table>
	
@stop
		
      <!-- END CUSTOM TABS -->