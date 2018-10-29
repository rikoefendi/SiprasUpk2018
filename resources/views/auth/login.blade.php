@extends('layouts.app')

@section('content')
<div class="container">

{{ session('message') }}
    <div class="header">
        <div class="logo-s mt-2"><img src="../img/sipras-logo.png" height="36px" width="112px"></div>
        <div class="row">
            <div class="banner">
                <label class="banner-text-1">Sistem Informasi Pengarsipan Surat</label>
                <br>
                <label class="banner-text-2">Silahkan Login dengan akun anda!</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mt-3 login">
            <div class="icon-box">
                <i class="material-icons icon-user-login">account_circle</i>
            </div>
            <form action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                    <div class="input-field {{$errors->has('email') ? 'has-error' : ''}}">
                        <input type="text" required class="validate  input-effects" name="email" value="{{ old('email') }}">
                        <label for="text">Email atau Username</label>
                        @if ($errors->has('email'))
                            <strong>{{ $errors->first('email') }}</strong>
                        @endif
                    </div>
                    <div class="input-field">
                        <input type="password" required class="validate input-effects" name="password">
                        <label for="text">Password</label>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="forgot">
                            <a href="password/reset">Lupa Password?</a>
                        </div>
                    </div>
                    <div class="input-field mt-5">
                        <button type="submit" name="button" class="btn btn-blue">Login</button>
                    </div>
            </form>

        </div>
    </div>
</div>
<style media="screen">
.icon-user-login{
    font-size: 10em;
    color: #9e9e9e;
}
</style>
@endsection
