@if (count($outboxes) > 0)
    @foreach ($outboxes as $outbox)
        <tr>
            <td>{{ $outbox->no_agenda }}</td>
            <td>{{ $outbox->mail_number }}</td>
            <td>{{ $outbox->subject }} <br><br> <hr> <br><a href="docx/{{$outbox->file_docx}}">{{explode("~", $outbox->file_docx)[1]}}</a> </td>
            <td>{{ $outbox->sended_to }}</td>
            <td>{{ $outbox->tgl_surat }} <br><br> <hr> <br>{{ $outbox->tgl_keluar }}</td>
            <td>
                <a href="/outbox/{{ $outbox->id }}/edit" title="edit"><i class="fa fa-edit"></i></a>|
                <a href="/outbox/{{ $outbox->id }}" title="hapus"><i class="fa fa-trash-alt"></i></a>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="6" align="center">Data yang anda cari tidak ditemukan</td>
    </tr>
@endif
