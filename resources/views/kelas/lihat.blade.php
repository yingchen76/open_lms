@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
	<h1>Lihat</h1>
@stop


@section('content')
<div class="container">
  <div class="row">
    <div class="col-6">
      <div class="card mt-3 tab-card">
        <div class="card-header tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Timeline</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Tugas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Murid</a>
            </li>
          </ul>
        </div>
    </div>
</div>
</div>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane" id="one" role="tabpanel" aria-labelledby="one-tab">
          	<br>
			<div>
				<div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
	              <ul class="todo-list">
	             @foreach($tugases as $tgs)
	                <li>
	                  <!-- drag handle -->
	                  <span class="handle">
	                        <i class="fa fa-ellipsis-v"></i>
	                  </span>
	                  <!-- todo text -->
	                  <span class="text">{{$tgs->nama_tugas}}</span>
	                  <!-- Emphasis label -->
	                  <small class="label label-danger"><i class="fa fa-clock-o"></i> {{$tgs->created_at}}</small>
	                  <!-- General tools such as edit or delete-->
	                  @if ($kelas->user_id == Auth::user()->id)
	                  <div class="tools">
	                    <i class="fa fa-edit"></i>
	                    <i class="fa fa-trash-o"></i>
	                  </div>
	                  @endif
	                </li>
	             @endforeach
	              </ul>
	            </div>
			</div>
</div>
		<div class="tab-pane" id="two" role="tabpanel" aria-labelledby="two-tab">
          	<br>
       	<a href="/tugas/index/{{$kelas->id}}" class="btn btn-primary">Tambah Tugas</a>
          		<form action="{{ url('/tugas/lihat/' . $kelas->id) }}" method="post">
		{{ csrf_field() }}
		<table class="table table-striped col-md-12">
						<tr>
							<th>Nama Tugas</th>
							<th>Deskripsi</th>
							<th>file Tugas</th>
							<th>Deadline</th>
							<th>Action</th>
						</tr>
			</tr>
			@foreach ($tugases as $tugas)
			<tr>
		@if ($kelas->id == $tugas->kelas_id)
		<td>{{$tugas->nama_tugas}}</td>
		<td>{{$tugas->deskripsi}}</td>
		<td>{{$tugas->file_tugas}}</td>
		<td>{{$tugas->deadline}}</td>
		<td>
			<a href="/file/{{$tugas->file_tugas}}" class="btn btn-primary btn-sm col-md-5">Download</a>
			<a href="/tugas/upload/{{$tugas->id}}" class="btn btn-primary btn-sm col-md-5">Upload</a>
		</td>
		@endif
		</tr>
		@endforeach
</table>
	</form>   
</div>
<div class="tab-pane" id="three" role="tabpanel" aria-labelledby="three-tab">
          	<br>
          	<a href="/murid/create/{{$kelas->id}}" class="btn btn-success">Tambah Siswa</a>
		<table class="table table-stripped">
					<tr>
						<td>nama kelas</td>
						<td>nama murid</td>
					</tr>
					@foreach ($murid as $mk)
					@if ($mk->kelas_id == $kelas->id)
					<tr>
						<td>{{$mk->kelas->nama_kelas}}</td>
						<td>{{$mk->user->name}}</td>
					</tr>
					@endif
					@endforeach
				</table>
			</div>
			</div>
          	</div>


@stop