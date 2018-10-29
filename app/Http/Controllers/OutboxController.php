<?php

namespace App\Http\Controllers;

use App\Outbox;
use Illuminate\Http\Request;

class OutboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outboxes = Outbox::all();
        return view('outbox.show_outbox', compact('outboxes'));
    }


    public function search(Request $r)
    {
        $outboxes = Outbox::where('no_agenda', 'like', '%'.$r->q.'%')
                          ->orWhere('mail_number', 'like', '%'.$r->q.'%')
                          ->orWhere('subject', 'like', '%'.$r->q.'%')
                          ->orWhere('sended_to', 'like', '%'.$r->q.'%')
                          ->orWhere('tgl_surat', 'like', '%'.$r->q.'%')
                          ->orWhere('tgl_keluar', 'like', '%'.$r->q.'%')
                          ->orWhere('file_docx', 'like', '%'.$r->q.'%')->get();

        return view('outbox.search', compact('outboxes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('outbox.create_outbox');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $outbox  = new Outbox();

        $valid = $this->validate($request, [
            'no_agenda' => 'min:5|max:30',
            'tujuan' => 'min:5|max:30',
            'no_surat' => 'min:5|max:30',
            'subject' => 'min:5|max:225',
            'mail_docx' => 'mimes:docx'
        ]);

        if($valid){


            $docx = $request->file('mail_docx');
            $namaFile = time().'~'.$docx->getClientOriginalName();
            $outbox->no_agenda = $request->no_agenda;
            $outbox->mail_number = $request->no_surat;
            $outbox->sended_to = $request->tujuan;
            $outbox->subject = $request->subject;
            $outbox->tgl_keluar = $request->tgl_kirim;
            $outbox->tgl_surat = $request->tgl_surat;
            $outbox->file_docx = $namaFile;
            $outbox->id_users = \Auth::id();

            $outbox->save();

           //move file to local storage
           $request->file('mail_docx')->move('docx', $namaFile);


           // redirec to inbox

           return redirect('/outbox')->with('message', 'Berhasil Menmbahkan Surat Keluar');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $outbox = Outbox::findOrFail($id);

        return view('outbox.edit_outbox', compact('outbox'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $outboxUp = Outbox::findOrFail($id);

        $nameFileDb = explode("~", $outboxUp->file_docx)[1];

        $outboxUp->no_agenda = $request->no_agenda;
        $outboxUp->mail_number = $request->no_surat;
        $outboxUp->sended_to = $request->tujuan;
        $outboxUp->subject = $request->subject;
        $outboxUp->tgl_keluar = $request->tgl_kirim;
        $outboxUp->tgl_surat = $request->tgl_surat;
        //
        if($request->file_before !== $nameFileDb){
            $docx = $request->file('mail_docx');
            $path = 'docx/' .$outboxUp->file_docx;

            if(\File::delete($path)){
                $nameFile = time().'~'.$docx->getClientOriginalName();
                $outboxUp->file_docx = $nameFile;
                // dd(new \File);
                // move file to local storage
                $request->file('mail_docx')->move('docx', $nameFile);
            }

        }

        $outboxUp->save();
        return redirect('/outbox')->with('message', 'Berhasil Mengubah Surat Keluar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outbox = Outbox::findOrFail($id);

        \File::delete('docx/'.$outbox->file_docx);
        $outbox->delete();

        return redirect('/outbox');
    }
}
