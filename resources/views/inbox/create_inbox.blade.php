@extends('layouts.app')


@section('content')
    <div class="wrapper">
        <div class="panel-heading">
            <div class="row">
                <div class="col-3">
                    <span><i class="fa fa-envelope"></i>&nbsp;Tambah Surat Masuk</span>
                </div>
                <div class="col-2 ml-2">
                    <a href="/inbox" class="btn-add"><i class="fa fa-arrow-left">&nbsp;</i>Kembali</a>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <form class="" action="/inbox" method="POST" enctype="multipart/form-data" files="true">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-5 ml-4">
                        <div class="input-field">
                            <i class="prefix material-icons">looks_one</i>
                            <input type="text" name="no_agenda" value="{{ old('no_agenda') }}" class="validate input-effects" required>
                            <label >No agenda</label>
                            @if ($errors->has('no_agenda'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('no_agenda') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-field ">
                            <i class="prefix material-icons">place</i>
                            <input type="text" name="mail_place" value="{{ old('mail_place') }}" class="validate input-effects" required>
                            <label >Asal Surat</label>
                            @if ($errors->has('mail_place'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('mail_place') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-field">
                            <i class="prefix material-icons">looks_two</i>
                            <input type="text" name="mail_number" value="{{ old('mail_number') }}" class="validate input-effects" required>
                            <label >No Surat</label>
                            @if ($errors->has('mail_number'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('mail_number') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-field">
                            <i class="prefix material-icons">descriptions</i>
                            <textarea name="subject" class="validate input-effects" required>{{ old('subject') }}</textarea>
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
                            <input type="date" name="received_at" value="{{ old('received_at') }}" class="validate input-effects" required>
                            <label >Tangal Terima</label>
                        </div>
                        <div class="input-field">
                            <i class="prefix material-icons">date_range</i>
                            <input type="date" name="mail_date" value="{{ old('mail_date') }}" class="validate input-effects" required>
                            <label >Tangal Surat</label>
                        </div>

                        <div class="input-field">
                            <i class="prefix material-icons">text_fields</i>
                            <input type="text" name="desc" value="{{ old('desc') }}" class="validate input-effects" required>
                            <label>Keterangan</label>
                            @if ($errors->has('desc'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('desc') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="file-field input-field">
                            <div class="btn-file">
                                <span>File</span>
                                <input type="file" name="mail_docx" value="">
                            </div>
                            <div class="file-path-wrapper">
                                <input type="text" value="{{ old('mail_docx') }}" class="validate input-effects file-path" required>
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
                        <button type="submit" name="button" class="btn btn-blue">Simpan</button>
                    </div>
                    <div class="col-2">
                        <button type="reset" name="button" class="btn btn-red" onclick="document.location.href='/inbox';">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
