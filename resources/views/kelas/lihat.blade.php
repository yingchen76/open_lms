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
            <li class="nav-item active">
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
          <div class="tab-pane active" id="one" role="tabpanel" aria-labelledby="one-tab">
          	<br>
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
          	<br>

          	<ul class="timeline">
            <!-- timeline time label -->
	            <!-- /.timeline-label -->
	            <!-- timeline item -->
	            @foreach($post as $post)
	            <li>
	              <i class="fa fa-envelope bg-blue"></i>

	              <div class="timeline-item">
	                <span class="time"><i class="fa fa-clock-o"></i>{{$post -> created_at}}</span>

	                <h3 class="timeline-header"><a href="#">{{$post->user->name}}</a>&nbsp; write a new post</h3>

	                <div class="timeline-body">
	                	{{$post->isi}}
	                </div>
	                <div class="timeline-footer">
	                  <a class="btn btn-primary btn-xs">Read more</a>
	                  <a class="btn btn-danger btn-xs">Delete</a>
	                </div>
	              </div>
	            </li>
	            @endforeach
	            @foreach($tugases as $tugas)
	            <li>
	              <i class="fa fa-envelope bg-blue"></i>

	              <div class="timeline-item">
	                <span class="time"><i class="fa fa-clock-o"></i>{{$tugas -> created_at}}</span>

	                <h3 class="timeline-header"><a href="#">{{$tugas->kelas->user->name}}</a>&nbsp; added a new assignment </h3>

	                <div class="timeline-body">
	                	<a href="/file/{{$tugas->file_tugas}}">{{$tugas->nama_tugas}}</a>
	                </div>
	                <div class="timeline-footer">
	                  <a class="btn btn-primary btn-xs">Read more</a>
	                  <a class="btn btn-danger btn-xs">Delete</a>
	                </div>
	              </div>
	            </li>
	            @endforeach
        	</ul>
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