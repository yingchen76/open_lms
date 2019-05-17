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
	@foreach($errors->all() as $message)
		<div>{{$message}}</div>
	@endforeach
</div>
          	<div>
          		<div>
					@foreach($errors->all() as $message)
						<div>{{$message}}</div>
					@endforeach
				</div>
          		<form action="{{ url('/kelas/post/' .$kelas->id) }}" method="post">
          			{{ csrf_field() }}
          			<input type="text" class="form-control" name="isi">
          			<input type="hidden" value="{{$kelas->id}}" name="kelas_id">
          			<div class="form-group">
          				<input type="hidden" value="{{Auth::user()->id}}" name="user_id">
          			</div>
          			<button type="submit" class="btn btn-primary">Post</button>
          		</form>
          	</div>
			<div>
				<div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
	              <ul class="todo-list">
	              	@foreach($post as $post)
	                <li>
	                  <!-- drag handle -->
	                  <span class="handle">
	                        <i class="fa fa-ellipsis-v"></i>
	                  </span>
	                  <!-- todo text -->
	                  <span class="text">{{$post->isi}}</span>
	                  <!-- Emphasis label -->
	                  <small class="label label-primary"><i class="fa fa-user-o"></i> {{$post->user->name}}</small>
	                </li>
	             @endforeach
	             @foreach($tugases as $tgs)
	                <li>
	                  <!-- drag handle -->
	                  <span class="handle">
	                        <i class="fa fa-ellipsis-v"></i>
	                  </span>
	                  <!-- todo text -->
	                  <span class="text">{{$tgs->nama_tugas}}</span>
	                  <!-- Emphasis label -->
	                  <small class="label label-success"><i class="fa fa-clock-o"></i> {{$tgs->created_at}}</small>
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
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="card">
							<div class="card-body">
								<form action="{{url('/murid/new/'.$kelas->id)}}" method="post">
									{{csrf_field()}}
										<input type="hidden" name="kelas_id" class="form-control" value="{{$kelas->id}}">
									<div class="form-group">
										<label>Email Murid :</label>
										<input type="text" name="email" class="form-control">
									</div>
									<button type="submit" class="btn btn-primary">Simpan</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		    <br>
			<table class="table table-striped col-md-12">
				<tr>
					<th>Nama Kelas</th>
					<th>Nama Murid</th>
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