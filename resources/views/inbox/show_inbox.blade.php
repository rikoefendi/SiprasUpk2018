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
                    <span><i class="fa fa-envelope"></i>&nbsp;Surat Masuk</span>
                </div>
                <div class="col-2">
                    <a href="/inbox/create" class="btn-add"><i class="fa fa-plus-circle"></i>&nbsp;Tambah Data</a>
                </div>
                <div class="col-3 pull-4 search-field">
                    <input type="search" class="input-search" placeholder="" id="search-surat-masuk">
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
                        <th width="30%">Isi Ringkas Surat <br> <br> File</th>
                        <th width="15%">Pengirim</th>
                        <th width="15%">Tanggal Surat <br> <br> Tanggal Terima</th>
                        <th width="%">Aksi</th>
                    </tr>
                </thead>

                <tbody id="view-search">
                    @if (count($inboxes) > 0)
                        @foreach ($inboxes as $inbox)
                            <tr>
                                <td>{{ $inbox->no_agenda }}</td>
                                <td>{{ $inbox->mail_number }}</td>
                                <td>{{ $inbox->subject }}
                                    <br>
                                    <br>
                                    <hr>

                                    <br>
                                    <br>
                                    <strong>File: </strong> <a href="docx/{{$inbox->mail_docx}}">{{explode("~", $inbox->mail_docx)[1]}}</a>
                                </td>
                                <td>{{ $inbox->mail_place }}</td>
                                <td>{{ $inbox->mail_date }}

                                                                        <br>
                                                                        <br>
                                                                                                    <hr>

                                                                        <br>
                                                                        <br>
                                                                        {{$inbox->received_at}}
                                </td>
                                @if (Auth::user()->level == 1 || $inbox->id_surat == Auth::id())
                                    <td>
                                        <a href="/inbox/{{ $inbox->id }}/edit" title="edit"><i class="fa fa-edit"></i></a>|
                                        <a href="/inbox/{{ $inbox->id }}" title="hapus"><i class="fa fa-trash-alt"></i></a>|
                                        <a href="/disposisi/{{$inbox->id}}/show" title="Disposisi"><i class="fa fa-file-alt"></i></a>|
                                        <a href="/inbox/{{ $inbox->id }}/print" title="print" target="_blank"><i class="fa fa-print"></i></a>
                                    </td>
                                @else
                                    <td><a href="/inbox/{{ $inbox->id }}/print" title="print" target="_blank"><i class="fa fa-print"></i></a></td>
                                @endif
                            </tr>
                        @endforeach

                    @else
                        <tr>
                            <td colspan="6">Data Surat Masku Kosong <a href="/inbox/create">Tambah Data</a></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
