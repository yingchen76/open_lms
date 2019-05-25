@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Edit Akun</h1>
@stop

@section('content')
    @foreach($errors->all() as $message)
        <div>{{$message}}</div>
    @endforeach
    
    <form action="{{ url('/profile/editakun/' . Auth::user()->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" >
        </div>
         <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
        </div>
         <div class="form-group">
            <label>Retype Password</label>
             <input type="password" class="form-control" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

@stop