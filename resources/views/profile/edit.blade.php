@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Edit User</h1>
@stop

@section('content')
    @foreach($errors->all() as $message)
        <div>{{$message}}</div>
    @endforeach
    
    <form action="{{ url('/profile/edit/' . Auth::user()->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" >
        </div>
        <div class="form-group">
            <label>Nickname</label>
            <input type="text" name="nickname" class="form-control" value="{{ Auth::user()->nickname }}" >
        </div>
         <div class="form-group">
            <label>Foto</label>
             &nbsp; &nbsp; &nbsp;
             <img src="/user_picture/{{ Auth::user()->profile_picture }}" style="height: 150px;">
             <input type="file" class="form-control" name="profile_picture" value="{{ Auth::user()->profile_picture }}">
        </div>
         <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ Auth::user()->telepon }}" >
            @if(Auth::user()->tlp_show == 'hide')
            <input type="checkbox" name="tlp_show" value="hide" checked> hide 
            @else 
            <input type="checkbox" name="tlp_show" value="hide"> hide 
          
          @endif

        </div>
        <div class="form-group">
            <label>Deskripsi</label>
             <textarea name="deskripsi" class="form-control">{{ Auth::user()->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label>Lokasi</label>
              <input type="text" name="lokasi" class="form-control" value="{{ Auth::user()->lokasi }}" >
              @if(Auth::user()->tlp_show == 'hide')
              <input type="checkbox" name="lks_show" value="hide" checked> hide 
              @else 
              <input type="checkbox" name="lks_show" value="hide"> hide 
              @endif
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

@stop