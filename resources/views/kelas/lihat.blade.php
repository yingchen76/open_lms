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
            <li class="nav-item">
                <a class="nav-link" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="Four" aria-selected="false">Info</a>
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
          		<form action="{{ url('/kelas/post/' .$kelas->id) }}" method="post" enctype="multipart/form-data">
          			{{ csrf_field() }}
          			<input type="text" class="form-control" name="deskripsi">
          			<input type="file" name="file_tugas" class="form-control">
          			<input type="hidden" value="{{$kelas->id}}" name="kelas_id">
          			<div class="form-group">
          				<input type="hidden" value="{{Auth::user()->id}}" name="user_id">
          			</div>
          			<button type="submit" class="btn btn-primary">Post</button>
          		</form>
          	</div>
          	<br>

          	<div class="col-md-12">
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
		                	<h3 class="timeline-header">You&nbsp; added a assignment </h3>
		                	@else 
		                	<h3 class="timeline-header"><a href="/profile/lihat/{{$tugas->kelas->user->id}}">{{$tugas->kelas->user->name}}</a>&nbsp; added a assignment </h3>
		                	@endif
		                @else 
			                @if($tugas->kelas->user->name == Auth::user()->name)
			               	<h3 class="timeline-header">You&nbsp; added a post </h3>
			               	@else 
			               	<h3 class="timeline-header"><a href="/profile/lihat/{{$tugas->kelas->user->id}}">{{$tugas->kelas->user->name}}</a>&nbsp; added a post </h3>
			               	@endif
			               
		                @endif
		                <div class="timeline-body" style="padding-bottom: 50px;">
		                	{{$tugas->nama_tugas}}<br>
		                	{{$tugas->deskripsi}}<br>
		                	<img src="">
		                	<a href="/file/{{$tugas->file_tugas}}" src="/file/{{$tugas->file_tugas}}">{{$tugas->file_tugas}}</a><br>
		                	@if ($tugas->nama_tugas != null)
		                	<p class="btn btn-danger col-md-2" style="margin-top: 10px;">{{$tugas->deadline}}</p>
		                	<div class="container-box rotated col-md-3" style="margin-top: 10px;">						
								<button type="button" class="btn btn-primary col-md-5 btn-upload" data-toggle="modal" data-target="#myModal">Upload</button>				
							</div>
		                	@endif
		                </div>
		              </div>
	            </li>
	            @endif
	            @endforeach
        	</ul>
        	<ul class="timeline col-md-3 box-body">
            <!-- timeline time label -->
	            <!-- /.timeline-label -->
	            <!-- timeline item -->
	            @foreach($murids as $murid)
	            @if($murid->kelas_id == $kelas->id)
			        <li>
			            <i class="fa fa-user-o bg-blue"></i>
					         <div class="timeline-item">
				                <span class="time"><i class="fa fa-clock-o"></i>{{$murid -> created_at}}</span>
				                @if ($murid->kelas_id == $kelas->id)
						            @if($murid->kelas->user->name == Auth::user()->name)
				                	<h3 class="timeline-header">You &nbsp; added <a href="/profile/lihat/{{$murid->user->id}}">{{$murid->user->name}}</a></h3>
				                	@else 
				                	 	@if($murid->user->name != Auth::user()->name)
						               	<h3 class="timeline-header"><a href="/profile/lihat/{{$murid->user->id}}">{{$murid->kelas->user->name}}</a>&nbsp; added <a href="/profile/lihat/{{$murid->user->id}}">{{$murid->user->name}}</a></h3>
						               	@else 
						               	<h3 class="timeline-header"><a href="/profile/lihat/{{$murid->user->id}}">{{$murid->kelas->user->name}}</a>&nbsp; added you</h3>
						               	@endif
						            @endif
				               	@endif
				            </div>
			   		</li>
			   	@endif	
		        @endforeach
		    </ul>
		   </div>`
</div>
		<div class="tab-pane" id="two" role="tabpanel" aria-labelledby="two-tab">
          	<br>
          	@if($kelas->user_id == Auth::user()->id)
       		<a href="/tugas/index/{{$kelas->id}}" class="btn btn-primary">Tambah Tugas</a>
       		@endif
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
						@foreach ($tugases as $tugas)
						<tr>
							
								@if ($tugas->nama_tugas != null)
									@if ($kelas->id == $tugas->kelas_id)
										<td>{{$tugas->nama_tugas}}</td>
										<td>{{$tugas->deskripsi}}</td>
										<td>{{$tugas->file_tugas}}</td>
										<td>{{$tugas->deadline}}</td>
										<td>
											<a href="/file/{{$tugas->file_tugas}}" class="btn btn-primary btn-sm col-md-5">Download</a>
											<div class="container-box rotated">						
												<button type="button" href="/tugas/lihat/{{$tugas->id}}" class="btn btn-primary btn-sm col-md-5 btn-upload" id="q" data-toggle="modal" data-target="#myModal">Upload</button>				
											</div>
											<a href="/tugas/daftar/{{$tugas->id}}" class="btn btn-primary btn-sm col-md-5">Lihat Dokumen</a>
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
								@if($kelas->user->id == Auth::user()->id)
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
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		    <br>
			<label>&nbsp; &nbsp; &nbsp;Daftar Murid</label>
					<table class="table table-striped">
						<tr>
							<th>Murid</th>
							<th>Email</th>
							
						</tr> 
							
						@foreach ($murids as $m)
						<tr>
							
								<td><a href="/profile/lihat/{{$m->user->id}}"><img src="/user_picture/{{$m->user->profile_picture}}" height="50">{{$m->user->name}}</a></td>
								<td>{{$m->user->email}} </td>
							
						</tr>
						@endforeach
							
					</table>
		</div>
		<div class="tab-pane" id="four" role="tabpanel" aria-labelledby="four-tab">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="card">
							<div class="card-body">
								{{$kelas->deskripsi}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">×</button>
							<h2 class="modal-title">Upload</h2>
					</div>
					<div class="modal-body">
			       		<form action="{{ url('/tugas/upload/' . $tugas->id) }}" method="post" enctype="multipart/form-data">
			        		{{ csrf_field() }}
			 				<div class="form-group">
								<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
								<input type="hidden" name="tugas_id" id="tugas_id">
							</div>
							<div class="form-group">
								<input type="file" name="file_tugas">
							</div>
							<button type="submit" class="btn btn-lg btn-success btn-block" id="btnContactUs" >UPLOAD</button>
		    			</form>
					</div>	
				</div>
			</div>
		</div>

@stop
@section('custom_js')
<script type="text/javascript">
	$('.btn-upload').click(function(){
		tugas_id = $(this).attr("id");
		// alert($(this).attr("id"));
		$('#tugas_id').val(tugas_id);
	})
</script>
@stop