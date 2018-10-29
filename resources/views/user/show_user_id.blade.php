@extends('layouts.app')

@section('content')

    <div class="wrapper">

        @if (session('message'))

            <div class="alert alert-succes">
                <strong>Berhasil!</strong> {{ session('message') }}
            </div>

        @endif
        <div class="panel-heading">
            <div class="row">
                <div class="col-2">
                    <span><i class="fa fa-user"></i>&nbsp;Profil</span>
                </div>
            </div>
        </div>
        <div class="panel-body">

            <div class="row profil  ml-5 pt-2">
                <div class="col-7">
                    <div class="row">
                        <div class="col-3 pb-1">
                            Nama Lengkap
                        </div>
                        <div class="col-9 pb-1">
                            : {{$user->name}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-3 pb-1 pt-1">
                            Email
                        </div>
                        <div class="col-9 pb-1 pt-1">
                            : {{$user->email}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-3 pb-1 pt-1">
                            Telepon
                        </div>
                        <div class="col-9 pb-1 pt-1">
                            : @if (isset($user->telp))
                                {{$user->telp}}
                            @else
                                -
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-3 pb-1 pt-1">
                            Alamat
                        </div>
                        <div class="col-9 pb-1 pt-1">
                             : @if (isset($user->alamat))
                                {{$user->alamat}}
                            @else
                                -asdfasdjfalksdjf asdjf lasdjfl jlasdjf ladfsldlfhalsdfjh lhalskdfh afsdh
                            @endif
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="col-3 pull-1">
                    <div class="row">
                        <div class="col-12">
                            <img src="../../img/{{$user->foto}}" alt="" id="foto">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="/users/{{$user->id}}/edit" class="action-profil">Edit Profil</a>
                        </div>
                        <div class="col-12">
                            <a href="/users/{{$user->id}}/password" class="action-profil">Ganti Password</a>
                        </div>
                    </div>
                </div>
            </div>

@endsection

<style media="screen">
    .action-profil{
        background: #37869e;
        color: #fff;
        width: 100%;
        display: block;
        text-align: center;
        padding-bottom: 10px;
        padding-top: 10px;
        font-size: 0.8em;
        margin-top: 10px;
        text-decoration: none;
    }
    .action-profil:hover{
        background: #2e7084;
    }
    img#foto{
        height: 100px;
        width: 100%;
    }
</style>
