@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="row panel-body">
        <div class="col-3 ml-5 mt-5">
            @php
                $user = $users->where('id', Auth::id())->get()[0];
            @endphp

            <div class="foto-h col-8 pull-2">
                @if (isset($user->foto))
                    <img src="../img/{{ $user->foto}}" alt="">
                @else
                    <img src="img/admin.png" alt="">
                @endif
            </div>
            <div class="text-h col-12">
                <div class="row">
                    <div class="col-2">
                        Name
                    </div>
                    <div class="col-10">
                        : {{$user->name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Email
                    </div>
                    <div class="col-10">
                        : {{$user->email}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8 pul-1 mt-5">
            <div class="col-4 bg-e">
                <div class="col-6">
                    <i class="fa fa-envelope fa-lg"></i>
                </div>
                <div class="col-6">
                    Total Surat Masuk
                    <br>
                    <br>
                    {{$inbox}}
                    <br>
                    <a href="/inbox" class="link-e">More</a>
                </div>
            </div>
            <div class="col-4 bg-e ml-1">
                <div class="col-6">
                    <i class="fa fa-envelope fa-lg"></i>
                </div>
                <div class="col-6">
                    Total Surat Keluar
                    <br>
                    <br>
                    {{$outbox}}
                    <br>
                    <a href="/outbox" class="link-e">More</a>
                </div>
            </div>
            @if (Auth::user()->level == 1)
                <div class="col-4 bg-e mt-1">
                    <div class="col-6">
                        <i class="fa fa-user fa-lg"></i>
                    </div>
                    <div class="col-6">
                        Total Pengguna
                        <br>
                        <br>
                        {{$users->count()}}
                        <br>
                        <a href="/users" class="link-e">More</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>


<style media="screen">
    .foto-h img{
        margin: 0 auto;
        height: 150px;
        width: 100%;
        border-radius: 50%;
    }
    .text-h{
        line-height: 30px;
        font-size: 1.2em;
        margin-top: 1em;
    }
    .fa-lg{
        font-size: 7em;
    }
    .bg-e{
        background: #beefdb;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .bg-e:first-child{
        margin-left: 0;
    }
    .link-e{
        float: right;
        text-decoration: none;
    }
    .link-e:hover{
        text-decoration: underline;
    }
</style>

@endsection
