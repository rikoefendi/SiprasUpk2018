@extends('layouts.app')


@section('content')
    <div class="wrapper">
        {{ session('message') }}
        <a href="/inbox/show/asdf">asdf</a>
        <div class="panel-heading">

            <div class="row">
                <div class="col-2">
                    <span><i class="fa fa-user-alt"></i>&nbsp;Surat Masuk</span>
                </div>
                <div class="col-2">
                    <a href="/users/create" class="btn-add"><i class="fa fa-plus-circle"></i>&nbsp;Tambah User</a>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table style="width:100%; margin: 0 auto;">
                <thead>
                    <tr>
                        <th width="3%">No</th>
                        <th width="18%">Nama Lengkap</th>
                        <th width="17%">Email</th>
                        <th width="15%">Telp</th>
                        <th width="25%">Alamat</th>
                        <th width="7%">Status</th>
                        <th width="5%">Aksi</th>
                    </tr>
                </thead>

                <tbody id="view-search">
                    <span style="display:none;">{{$no = 1}}</span>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->telp }}</td>
                            <td>{{ $user->alamat }}</td>
                            <td>{{ $user->status}}</td>
                            <td style="text-align:center;">
                                <a href="/users/{{ $user->id }}" title="hapus"><i class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <span style="display:none;">{{$no++}}</span>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
