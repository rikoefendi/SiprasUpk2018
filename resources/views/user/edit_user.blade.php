@extends('layouts.app')


@section('content')
    <div class="wrapper">
        <div class="panel-heading">
            <div class="row">
                <div class="col-3">
                    <span><i class="fa fa-user"></i>&nbsp;Edit Profil</span>
                </div>
                <div class="col-2 ml-2">
                    <a href="/users/{{$user->id}}/show" class="btn-add"><i class="fa fa-arrow-left">&nbsp;</i>Kembali</a>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <form class="" action="/users/{{$user->id}}" method="post" enctype="multipart/form-data">
                {{ method_field('put') }}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-5 ml-4">
                        <div class="input-field">
                            <i class="prefix material-icons">text_fields</i>
                            <input type="text" name="name" value="{{ $user->name }}" class="validate input-effects" required>
                            <label >Nama Lengkap</label>
                            @if ($errors->has('name'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-field ">
                            <i class="prefix material-icons">place</i>
                            <textarea name="alamat" class="validate input-effects">{{$user->alamat}}</textarea>
                            <label >Alamat</label>
                            @if ($errors->has('alamat'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('telp') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-5 ml-4">
                        <div class="input-field">
                            <i class="prefix material-icons">looks_one</i>
                            <input type="text" name="telp" value="{{$user->telp}}" class="validate input-effects">
                            <label >Telepon</label>
                            @if ($errors->has('telp'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('telp') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="file-field input-field">
                            <div class="btn-file">
                                <span>File</span>
                                <input type="file" name="foto" value="">
                            </div>
                            <div class="file-path-wrapper">
                                <input type="text" value="@if(isset($user->foto)){{ explode("~", $user->foto)[1] }}@endforeach" class="validate input-effects file-path">
                            </div>

                        </div>
                        @if ($errors->has('foto'))
                            <span class="has-error">
                                <strong>{{ $errors->first('foto') }}</strong>
                            </span>
                        @else
                            <span>
                                <strong>* Hanya file jpg, png</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-2 mt-5 pb-5 ml-5">
                        <button type="submit" name="button" class="btn btn-blue">Simpan</button>
                    </div>
                    <div class="col-2 mt-5 pb-5 ml-5">
                        <button type="reset" name="button" class="btn btn-red" onclick="document.location.href='/users/{{$user->id}}/show';">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
