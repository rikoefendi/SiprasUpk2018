@extends('layouts.app')


@section('content')
    <div class="wrapper">
        <div class="panel-heading">
            <div class="row">
                <div class="col-2">
                    <span><i class="fa fa-file-alt"></i>&nbsp;Tambah Disposisi</span>
                </div>
                <div class="col-2 ml-2">
                    <a href="/disposisi/{{ $id }}/show" class="btn-add"><i class="fa fa-arrow-left">&nbsp;</i>Kembali</a>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <form class="" action="/disposisi/{{$id}}" method="POST" enctype="multipart/form-data" files="true">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-5 ml-4">
                        <div class="input-field">
                            <i class="prefix material-icons">place</i>
                            <input type="text" name="tujuan_disposisi" value="{{ old('tujuan_disposisi') }}" class="validate input-effects" required>
                            <label >Tujuan Disposisi</label>
                            @if ($errors->has('tujuan_disposisi'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('tujuan_disposisition') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-field">
                            <i class="prefix material-icons">descriptions</i>
                            <textarea name="isi_disposisi" class="validate input-effects" required>{{ old('isi_disposisi') }}</textarea>
                            <label >Isi Disposisi</label>
                            @if ($errors->has('isi_disposisi'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('isi_disposisi') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-5 pull-1">
                        <div class="input-field">
                            <i class="prefix material-icons">alarm</i>
                            <input type="date" name="batas_waktu" value="{{ old('batas_waktu') }}" class="validate input-effects" required>
                            <label >Batas Waktu</label>
                        </div>
                        <div class="input-field">
                            <i class="prefix material-icons">featured_play_list</i>
                            <input type="text" name="catatan" value="{{ old('catatan') }}" class="validate input-effects" required>
                            <label >Catatan</label>
                            @if ($errors->has('catatan'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('catatan') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">low_priority</i>
                            <select class="input-effects" name="sifat_disposisi">
                                <option value="">Pilih Sifat Disposisi</option>
                                <option value="Biasa">Biasa</option>
                                <option value="Penting">Penting</option>
                                <option value="Segera">Segera</option>
                                <option value="Rahasia">Rahasia</option>
                            </select>
                            @if ($errors->has('sifat_disposisi'))
                                <span class="has-error">
                                    <strong>{{ $errors->first('sifat_disposisi') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row pull-1 mt-5 pb-5">
                    <div class="col-2">
                        <button type="submit" name="button" class="btn btn-blue">Simpan</button>
                    </div>
                    <div class="col-2">
                        <button type="reset" name="button" class="btn btn-red" onclick="document.location.href='/disposisi/{{$id}}/show';">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
