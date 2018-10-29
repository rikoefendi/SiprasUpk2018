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
                    <span><i class="fa fa-envelope"></i>&nbsp;Surat Keluar</span>
                </div>
                <div class="col-2">
                    <a href="/outbox/create" class="btn-add"><i class="fa fa-plus-circle"></i>&nbsp;Tambah Data</a>
                </div>
                <div class="col-3 pull-4 search-field">
                    <input type="search" class="input-search" placeholder="" id="search-surat-keluar">
                    <label for="search"><i class="fa fa-search"></i></label>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table style="width:100%; margin: 0 auto;">
                <thead>
                    <tr>
                        <th width="15%">No Agenda</th>
                        <th width="15%">No Surat</th>
                        <th width="30%">Isi Ringkas Surat <br> <br>File</th>
                        <th width="15%">Tujuan</th>
                        <th width="15%">Tanggal Surat <br> <br> Tanggal Kirim</th>
                        <th width="%">Aksi</th>
                    </tr>
                </thead>

                <tbody id="view-search">
                    @if (count($outboxes)>0)
                        @foreach ($outboxes as $outbox)
                            <tr>
                                <td>{{ $outbox->no_agenda }}</td>
                                <td>{{ $outbox->mail_number }}</td>
                                <td>{{ $outbox->subject }} <br><br> <hr> <br><a href="docx/{{$outbox->file_docx}}">{{explode("~", $outbox->file_docx)[1]}}</a> </td>
                                <td>{{ $outbox->sended_to }}</td>
                                <td>{{ $outbox->tgl_surat }} <br><br> <hr> <br>{{ $outbox->tgl_keluar }}</td>
                                @if (Auth::user()->level == 1 || $outbox->id_surat == Auth::id())
                                    <td>
                                        <a href="/outbox/{{ $outbox->id }}/edit" title="edit"><i class="fa fa-edit"></i></a>|
                                        <a href="/outbox/{{ $outbox->id }}" title="hapus"><i class="fa fa-trash-alt"></i></a>
                                    </td>
                                @else
                                    <td>No Action</td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" align="center">Data Kosong <a href="/inbox/create">Tambah Data</a> </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
