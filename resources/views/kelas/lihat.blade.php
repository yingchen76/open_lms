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
          			<input type="text" class="form-control" name="deskripsi">
          			<input type="hidden" value="{{$kelas->id}}" name="kelas_id">
          			<div class="form-group">
          				<input type="hidden" value="{{Auth::user()->id}}" name="user_id">
          			</div>
          			<button type="submit" class="btn btn-primary">Post</button>
          		</form>
          	</div>
          	<br>

          	
		    <ul class="timeline col-md-9">
	            @foreach($tugases as $tugas)
	            @if($tugas->kelas_id == $kelas->id)
	            <li>
	             @if ($tugas->nama_tugas != null)
	              	<i class="fa fa-reorder bg-blue"></i>
	             @else
	             	<i class="fa fa-comment-o bg-blue"></i>
	             @endif 
		              <div class="timeline-item">
		                <span class="time"><i class="fa fa-clock-o"></i>{{$tugas -> created_at}}</span>
		                @if ($tugas->nama_tugas != null)
		                	@if($tugas->kelas->user->name == Auth::user()->name)
		                	<h3 class="timeline-header"><a href="#">You</a>&nbsp; added a assignment </h3>
		                	@else 
		                	<h3 class="timeline-header"><a href="#">{{$tugas->kelas->user->name}}</a>&nbsp; added a assignment </h3>
		                	@endif
		                @else 
			                @if($tugas->kelas->user->name == Auth::user()->name)
			               	<h3 class="timeline-header"><a href="#">You</a>&nbsp; added a post </h3>
			               	@else 
			               	<h3 class="timeline-header"><a href="#">{{$tugas->kelas->user->name}}</a>&nbsp; added a post </h3>
			               	@endif
		                @endif
		                <div class="timeline-body">
		                	{{$tugas->nama_tugas}}<br>
		                	{{$tugas->deskripsi}}<br>
		                	<img src="">
		                	<a href="/file/{{$tugas->file_tugas}}" src="/file/{{$tugas->file_tugas}}">{{$tugas->file_tugas}}</a><br>
		                	@if ($tugas->nama_tugas != null)
		                	<p class="btn btn-danger btn-sm">{{$tugas->deadline}}</p>
		                	@endif
		                </div>
		              </div>
	            </li>
	            @endif
	            @endforeach

        	</ul>
        	<ul class="timeline col-md-3">
            <!-- timeline time label -->
	            <!-- /.timeline-label -->
	            <!-- timeline item -->
	            @foreach($murid as $murid)
	            @if($murid->kelas_id == $kelas->id)
			        <li>
			            <i class="fa fa-user-o bg-blue"></i>
					         <div class="timeline-item">
				                <span class="time"><i class="fa fa-clock-o"></i>{{$murid -> created_at}}</span>
				                @if ($murid->kelas_id == $kelas->id)
						            @if($tugas->kelas->user->name == Auth::user()->name)
				                	<h3 class="timeline-header"><a href="#">You</a>&nbsp; added {{$murid->user->name}}</h3>
				                	@else 
				                	 	@if($murid->user->name != Auth::user()->name)
						               	<h3 class="timeline-header"><a href="#">{{$tugas->kelas->user->name}}</a>&nbsp; added {{$murid->user->name}}</h3>
						               	@else 
						               	<h3 class="timeline-header"><a href="#">{{$murid->kelas->user->name}}</a>&nbsp; added you</h3>
						               	@endif
						            @endif
				               	@endif
				            </div>
			   		</li>
			   	@endif	
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
						<tr>
							@foreach ($tugases as $tugas)
								@if ($tugas->nama_tugas != null)
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
								@endif
							@endforeach
						</tr>
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
										<br>
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
			
		</div>
	</div>
</div>


@stop