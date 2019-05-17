@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop
<div>
    @foreach($errors->all() as $message)
        <div>{{$message}}</div>
    @endforeach
</div>
@section('body_class', 'register-page')

@section('body')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{ trans('adminlte::adminlte.register_message') }}</p>
            <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                           placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('nickname') ? 'has-error' : '' }}">
                    <input type="text" name="nickname" class="form-control" value="{{ old('nickname') }}"
                           placeholder="Nickname">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('nickname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nickname') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                 <div class="form-group{{ $errors->has('profile_picture') ? ' has-error' : '' }}">
            <label for="name" class="col-md-6 control-label">Profile Picture</label>
        <input id="profilePicture" type="file" class="form-control" name="profile_picture">

        @if ($errors->has('profile_picture'))
            <span class="help-block">
                <strong>{{ $errors->first('profile_picture') }}</strong>
            </span>
        @endif
    </div>
                 <div class="form-group has-feedback {{ $errors->has('telepon') ? 'has-error' : '' }}">
                    <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}"
                           placeholder="Telepon">
                    <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                    @if ($errors->has('telepon'))
                        <span class="help-block">
                            <strong>{{ $errors->first('telepon') }}</strong>
                        </span>
                    @endif
                </div>

                 <div class="form-group has-feedback {{ $errors->has('deskripsi') ? 'has-error' : '' }}">
                    <textarea name="deskripsi" class="form-control"
                           placeholder="Deskripsi">
                    @if ($errors->has('deskripsi')) 
                        <span class="help-block">
                            <strong>{{ $errors->first('deskripsi') }}</strong>
                        </span>
                    @endif
                    </textarea>
                </div>
                <div class="form-group has-feedback {{ $errors->has('lokasi') ? 'has-error' : '' }}">
                    <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}"
                    placeholder="Lokasi">
                    <span class="glyphicon glyphicon-road form-control-feedback"></span>
                    @if ($errors->has('lokasi'))
                        <span class="help-block">
                            <strong>{{ $errors->first('lokasi') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit"
                        class="btn btn-primary btn-block btn-flat"
                >{{ trans('adminlte::adminlte.register') }}</button>
            </form>
            <div class="auth-links">
                <a href="{{ url(config('adminlte.login_url', 'login')) }}"
                   class="text-center">{{ trans('adminlte::adminlte.i_already_have_a_membership') }}</a>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

@section('adminlte_js')
    @yield('js')
@stop
