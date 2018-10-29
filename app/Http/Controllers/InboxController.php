<?php

namespace App\Http\Controllers;


use Storage;
use App\Inbox;
use App\Disposisi;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inboxes = Inbox::all();
        return view('inbox.show_inbox', compact('inboxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inbox.create_inbox');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inbox  = new Inbox();

        $valid = $this->validate($request, [
            'no_agenda' => 'min:3|max:30',
            'mail_place' => 'min:5|max:30',
            'mail_number' => 'min:5|max:30',
            'subject' => 'min:5|max:225',
            'desc' => 'min:5|max:225',
            'mail_docx' => 'mimes:docx'
        ]);
        if($valid){


            $gambar = $request->file('mail_docx');
            $namaFile = time().'~'.$gambar->getClientOriginalName();

            $inbox->no_agenda = $request->no_agenda;
            $inbox->mail_date = $request->mail_date;
            $inbox->received_at = $request->received_at;
            $inbox->mail_number = $request->mail_number;
            $inbox->mail_place = $request->mail_place;
            $inbox->subject = $request->subject;
            $inbox->desc = $request->desc;
            $inbox->mail_docx = $namaFile;
            $inbox->id_users = \Auth::id();

            $inbox->save();

           //move file to local storage
           $request->file('mail_docx')->move('docx', $namaFile);


           // redirec to inbox

           return redirect('/inbox')->with('message', 'Berhasil Menmbahkan Surat');
       }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inbox = Inbox::find($id);
        return view('inbox.edit_inbox', compact('inbox'));
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
        $inboxUp = Inbox::findOrFail($id);

        $nameFileDb = explode("~", $inboxUp->mail_docx)[1];

        $inboxUp->no_agenda = $request->no_agenda;
        $inboxUp->mail_date = $request->mail_date;
        $inboxUp->received_at = $request->received_at;
        $inboxUp->mail_number = $request->mail_number;
        $inboxUp->mail_place = $request->mail_place;
        $inboxUp->subject = $request->subject;
        $inboxUp->desc = $request->desc;
        //
        if($request->file_before !== $nameFileDb){
            $docx = $request->file('mail_docx');
            $path = 'docx/' .$inboxUp->mail_docx;
            if(\File::delete($path)){
                $nameFile = time().'~'.$docx->getClientOriginalName();
                $inboxUp->mail_docx = $nameFile;
                // dd(new \File);
                // move file to local storage
                $request->file('mail_docx')->move('docx', $nameFile);
            }

        }

        $inboxUp->save();
        return redirect('/inbox')->with('message', 'Berhasil Mengubah Surat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inboxDown = Inbox::findOrFail($id);
        $path = 'docx/'.$inboxDown->mail_docx;
        \File::delete($path);
        $inboxDown->delete();
        return redirect('/inbox')->with('massage', 'Berhasil Menghapus Surat');
    }


    public function print($id){

        $inbox = Inbox::findOrFail($id);

        $dis = Disposisi::where('id_surat', $id)->get();
        return view('inbox.print_inbox', ['dis' => $dis[0], 'inbox' => $inbox]);
    }

    public function search(Request $r)
    {
        // if($r->q !== ''){
        $inboxes = Inbox::where('no_agenda', 'like', '%'.$r->q.'%')->orWhere('mail_number', 'like', '%'.$r->q.'%')->orWhere('subject', 'like', '%'.$r->q.'%')
                        ->orWhere('mail_place', 'like', '%'.$r->q.'%')->get();
        return view('inbox.search', compact('inboxes'));
    }
}
