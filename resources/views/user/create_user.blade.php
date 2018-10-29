@extends('layouts.app')


@section('content')
    <div class="wrapper">
        <div class="panel-heading">
            <div class="row">
                <div class="col-3">
                    <span><i class="fa fa-user"></i>&nbsp;Tambah data pengguna</span>
                </div>
                <div class="col-2 ml-2">
                    <a href="/users" class="btn-add"><i class="fa fa-arrow-left">&nbsp;</i>Kembali</a>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <form class="" action="/users" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-5 ml-4">
                        <div class="input-field">
                            <i class="prefix material-icons">text_fields</i>
                            <input type="text" name="name" value="{{ old('name') }}" class="validate input-effects" required>
                            <label >Nama Lengkap</label>
                            @if ($errors->has('name'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-field ">
                            <i class="prefix material-icons">email</i>
                            <input type="text" name="email" value="{{ old('email') }}" class="validate input-effects" required>
                            <label >Email</label>
                            @if ($errors->has('email'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-5 mt-5 pb-5" style="margin: 0 auto; float:right; padding:0;">
                            <button type="submit" name="button" class="btn btn-blue">Simpan</button>
                        </div>
                    </div>
                    <div class="col-5 ml-4">
                        <div class="input-field">
                            <i class="prefix material-icons">security</i>
                            <input type="password" name="password" value="" class="validate input-effects" required>
                            <label >Password</label>
                            @if ($errors->has('password'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-field ">
                            <i class="prefix material-icons">security</i>
                            <input type="password" name="password_confirmation" value="" class="validate input-effects" required>
                            <label >Ulangi Password</label>
                            @if ($errors->has('mail_place'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('mail_place') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-5 mt-5 pb-5" style="margin: 0 auto; padding:0;">
                            <button type="reset" name="button" class="btn btn-red" onclick="document.location.href='/users';">Batal</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
