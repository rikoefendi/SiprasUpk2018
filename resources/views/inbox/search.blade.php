@if (count($inboxes) > 0)
        @foreach ($inboxes as $inbox)
        <tr>
            <td>{{ $inbox->no_agenda }}</td>
            <td>{{ $inbox->mail_number }}</td>
            <td>{{ $inbox->subject }}</td>
            <td>{{ $inbox->mail_place }}</td>
            <td>{{ $inbox->mail_date }}</td>
            <td>
                <a href="/inbox/{{ $inbox->id }}/edit" title="edit"><i class="fa fa-edit"></i></a>|
                <a href="/inbox/{{ $inbox->id }}" title="hapus"><i class="fa fa-trash-alt"></i></a>|
                <a href="/inbox/{{ $inbox->id }}/print" title="print"><i class="fa fa-print"></i></a>|
                <a href="/inbox/{{ $inbox->id }}/disposisi" title="Disposisi"><i class="fa fa-file-alt"></i></a>
                <form action="{{ $inbox->id }}" method="delete" id="delete-form" style="display:none;">
                    {{ csrf_field() }}
                </form>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="6" align="center">Data yang anda cari tidak ditemukan</td>
    </tr>
@endif
