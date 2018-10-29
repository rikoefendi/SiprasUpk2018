@extends('layouts.app')


@section('content')
    <div class="wrapper">
        <div class="panel-heading">
            <div class="row">
                <div class="col-3">
                    <span><i class="fa fa-envelope"></i>&nbsp;Edit Surat Keluar</span>
                </div>
                <div class="col-2 ml-2">
                    <a href="/outbox" class="btn-add"><i class="fa fa-arrow-left">&nbsp;</i>Kembali</a>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <form action="/outbox/{{ $outbox->id }}" method="POST" enctype="multipart/form-data" files="true">
                {{ method_field('put')}}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-5 ml-4">
                        <div class="input-field">
                            <i class="prefix material-icons">looks_one</i>
                            <input type="text" name="no_agenda" value="{{ $outbox->no_agenda }}" class="validate input-effects" required>
                            <label >No agenda</label>
                            @if ($errors->has('no_agenda'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('no_agenda') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-field ">
                            <i class="prefix material-icons">place</i>
                            <input type="text" name="tujuan" value="{{ $outbox->sended_to }}" class="validate input-effects" required>
                            <label >Tujuan</label>
                            @if ($errors->has('tujuan'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('tujuan') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-field">
                            <i class="prefix material-icons">looks_two</i>
                            <input type="text" name="no_surat" value="{{ $outbox->mail_number }}" class="validate input-effects" required>
                            <label >No Surat</label>
                            @if ($errors->has('no_surat'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('no_surat') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-field">
                            <i class="prefix material-icons">descriptions</i>
                            <textarea name="subject" class="validate input-effects" required>{{ $outbox->subject }}</textarea>
                            <label >Isi Ringkas Surat</label>
                            @if ($errors->has('subject'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('subject') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-5 pull-1">
                        <div class="input-field">
                            <i class="prefix material-icons">date_range</i>
                            <input type="date" name="tgl_kirim" value="{{ $outbox->tgl_keluar }}" class="validate input-effects" required>
                            <label >Tangal Keluar</label>
                        </div>
                        <div class="input-field">
                            <i class="prefix material-icons">date_range</i>
                            <input type="date" name="tgl_surat" value="{{ $outbox->tgl_surat }}" class="validate input-effects" required>
                            <label >Tangal Surat</label>
                        </div>
                        <div class="file-field input-field">
                            <div class="btn-file">
                                <span>File</span>
                                <input type="file" name="mail_docx" value="">
                            </div>
                            <div class="file-path-wrapper">
                                <input type="text" name="file_before" value="{{ explode("~",$outbox->file_docx)[1] }}" class="validate input-effects file-path" required>
                            </div>

                        </div>
                        @if ($errors->has('mail_docx'))
                            <span class="has-error">
                                <strong>{{ $errors->first('mail_docx') }}</strong>
                            </span>
                        @else
                            <span>
                                <strong>* Hanya file Ms. Word</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row pull-1 mt-5 pb-5">
                    <div class="col-2">
                        <button type="submit" name="button" class="btn btn-blue">Update</button>
                    </div>
                    <div class="col-2">
                        <button type="reset" name="button" class="btn btn-red" onclick="document.location.href='/outbox';">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
