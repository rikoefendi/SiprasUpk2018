@extends('layouts.app')


@section('content')
    <div class="wrapper">
        {{ session('message') }}
        <a href="/inbox/show/asdf">asdf</a>
        <div class="panel-heading">

            <div class="row">
                <div class="col-2">
                    <span><i class="fa fa-file-alt"></i>&nbsp;Disposisi</span>
                </div>
                <div class="col-2 ml-2">
                    <a href="/inbox" class="btn-add"><i class="fa fa-arrow-left">&nbsp;</i>Kembali</a>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table style="width:100%; margin: 0 auto;">
                <thead>
                    <tr>
                        <th width="20%">Tujuan Disposisi</th>
                        <th width="25%">Isi Disposisi</th>
                        <th width="10%">Sifat</th>
                        <th width="15%">Batas Waktu</th>
                        <th width="20%">Catatan</th>
                        <th width="7%">Aksi</th>
                    </tr>
                </thead>

                <tbody id="view-search">
                    @if (count($diss) > 0)
                        @foreach ($diss as $dis)
                            <tr>
                                <td>{{ $dis->tujuan_disposisi }}</td>
                                <td>{{ $dis->isi_disposisi}}</td>
                                <td>{{ $dis->sifat_disposisi }}</td>
                                <td>{{ $dis->batas_waktu }}</td>
                                <td>{{ $dis->catatan }}</td>
                                <td>
                                    <a href="/disposisi/{{ $dis->id }}/edit" title="edit"><i class="fa fa-edit"></i></a>|
                                    <a href="/disposisi/{{ $dis->id }}" title="hapus"><i class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" align="center">Data Disposisi Kosong. <a href="/disposisi/{{$id}}/create">Tmbah Diposisi</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
