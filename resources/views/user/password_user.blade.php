@extends('layouts.app')

@section('content')
    <div class="wrapper">
        @if (session('error'))

            <div class="alert alert-danger">
                <strong>Gagal!</strong> {{ session('error') }}
            </div>

        @endif
        <div class="panel-heading">
            <div class="row">
                <div class="col-3">
                    <span><i class="fa fa-user"></i>&nbsp;Edit Profil</span>
                </div>
                <div class="col-2 ml-2">
                    <a href="/users/{{$id}}/show" class="btn-add"><i class="fa fa-arrow-left">&nbsp;</i>Kembali</a>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <form class="" action="/users/{{$id}}/password" method="post">
                {{ method_field('put') }}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-6 pull-3">
                        <div class="input-field">
                            <i class="prefix material-icons">security</i>
                            <input type="password" name="password_lama" value="" class="validate input-effects" required>
                            <label >Password Lama</label>
                            @if ($errors->has('password_lama'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('password_lama') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-field ">
                            <i class="prefix material-icons">security</i>
                            <input type="password" name="new_password" class="validate input-effects" required>
                            <label >New Password</label>
                            @if ($errors->has('new_password'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('new_password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-field">
                            <i class="prefix material-icons">security</i>
                            <input type="password" name="new_password_confirmation" value="" class="validate input-effects" required>
                            <label >Konfirmasi Password Baru</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 pull-3 mt-5">
                        <div class="ml-5 col-5">
                            <button type="submit" name="button" class="btn btn-blue">Simpan</button>
                        </div>
                        <div class="col-5">
                            <button type="reset" name="button" class="btn btn-red" onclick="document.location.href='/users/{{$id}}/show';">Batal</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
