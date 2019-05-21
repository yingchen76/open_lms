@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
	<h1>Kelas</h1>
@stop


@section('content')
<!-- START CUSTOM TABS -->

            <a href="kelas/new" class="btn btn-primary">Buat Kelas</a>
						<table class="table table-striped">
						<tr>
							<th>Nama Kelas</th>
							<th>Jenis Kelas</th>
							<th>Nama Guru</th>
							<th>Action</th>
						</tr>
						
						<tr>
							@foreach($kelas as $kelas)
							@if ($kelas->user->name == Auth::user()->name )
							<td>{{ $kelas->nama_kelas }}</td>
							<td>{{ $kelas->jenis_kelas }}</td>
							<td>{{ $kelas->user->name }}</td>
							<td>
								
								<a href="/kelas/edit/{{$kelas->id}}" class="btn btn-primary btn-sm col-md-2">Edit</a>
								<a href="/kelas/lihat/{{$kelas->id}}" class="btn btn-primary btn-sm col-md-2">View</a>
								<button class="btn btn-danger btn-sm remove">Delete</button>
							</td>
							@endif
							@endforeach
						</tr>
					</table>
          </div>

<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: '/kelas/delete/{{$kelas->id}',
               type: 'delete',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Record removed successfully");  
               }
            });
        }
    });


</script>
@stop
		
      <!-- END CUSTOM TABS -->