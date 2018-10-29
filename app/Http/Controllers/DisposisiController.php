<?php

namespace App\Http\Controllers;

use App\Disposisi;
use Illuminate\Http\Request;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('disposisi.create_disposisi', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $dis  = new Disposisi();
        $valid = $this->validate($request, [
            'tujuan_disposisi' => 'min:5|max:50',
            'isi_disposisi' => 'min:5|max:30',
            'batas_waktu' => 'min:5|max:225',
            'catatan' => 'min:5|max:225',
            'sifat_disposisi' => 'required'
        ]);
        //
        if($valid){



            $dis->tujuan_disposisi = $request->tujuan_disposisi;
            $dis->isi_disposisi = $request->isi_disposisi;
            $dis->batas_waktu = $request->batas_waktu;
            $dis->catatan = $request->catatan;
            $dis->sifat_disposisi = $request->sifat_disposisi;
            $dis->id_surat = $request->id;

            $dis->save();

           //move file to local storage


           // redirec to inbox

           return redirect('/disposisi/'.$request->id.'/show')->with('message', 'Berhasil Menmbahkan disposisi');
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
        $diss = Disposisi::where('id_surat', $id)->get();
            return view('disposisi.show_disposisi', compact('diss', 'id'));
        // return view('disposisi.show_disposisi', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dis = Disposisi::findOrfail($id);
        return view('disposisi.edit_disposisi', compact('dis'));
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
        $dis  = Disposisi::findOrFail($id);
        $valid = $this->validate($request, [
            'tujuan_disposisi' => 'min:5|max:50',
            'isi_disposisi' => 'min:5|max:30',
            'batas_waktu' => 'min:5|max:225',
            'catatan' => 'min:5|max:225',
            'sifat_disposisi' => 'required'
        ]);
        //
        if($valid){



            $dis->tujuan_disposisi = $request->tujuan_disposisi;
            $dis->isi_disposisi = $request->isi_disposisi;
            $dis->batas_waktu = $request->batas_waktu;
            $dis->catatan = $request->catatan;
            $dis->sifat_disposisi = $request->sifat_disposisi;

            $dis->save();

            }
           return redirect('/disposisi/'.$id.'/show')->with('message', 'Berhasil mengubah disposisi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dis  = Disposisi::findOrFail($id);
        $dis->delete();
        return back()->with('message', 'Berhasil menghapus disposisi');
    }
}
