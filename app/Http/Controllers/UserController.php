<?php

namespace App\Http\Controllers;

use \Auth;
use \Hash;
use App\User;
use App\Mail\VerifyEmailRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', Auth::id() )->get();

        return view('user.show_users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'name' => 'required|min:5|max:50',
            'password' => 'required|min:5|max:50|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);

        if($user->save()){
            Mail::to($user->email)->send(new VerifyEmailRegister($user));
            return redirect('/users');

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

        $user = User::findOrFail($id);

        return view('user.show_user_id', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit_user', compact('user'));
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
        $user = User::findOrFail($id);

        $valid = $this->validate($request, [
            'name' => 'required|min:5|max:50',
            'telp' => 'numeric',
            'foto' => 'mimes:jpeg,png'
        ]);
        // get name foto from db

        $user->name = $request->name;
        $user->telp = $request->telp;
        $user->alamat = $request->alamat;
        $fotoName = $request->file('foto')->getClientOriginalName();
        if(isset($user->foto)){
            $fotoDb = explode("~", $user->foto)[1];
            if($fotoDb !== $fotoName){
                \File::delete('img/'.$user->foto);
            }

        }
        $user->foto = time().'~'.$fotoName;
        $request->file('foto')->move('img', time().'~'.$fotoName);


        $user->save();

        return redirect('/users/'.$id.'/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/users')->with('massage', 'berhasil menghapus user');
    }

    public function editPassword($id)
    {

        return view('user.password_user', compact('id'));
    }

    public function updatePassword(Request $r, $id)
    {

        $user = User::findOrFail($id);
        // menguji password_lama
        if (!(Hash::check($r->password_lama, Auth::user()->password))) {
            return redirect()->back()->with('error', 'Password lama anda tidak sesuai, Ulangi lagi!');
        }

        //

        $valid = $this->validate($r, [
            'new_password' => 'min:6|confirmed'
        ]);

        if($valid){
            $user->password = bcrypt($r->new_password);

            $user->save();

            return redirect('/users/'.$id.'/show')->with('massage', 'Berhasil Mengubah Password');
        }


    }

    public function verify($id, $token)
    {

        // loda data from database
        $email = \Crypt::deCrypt($token);

        $user = User::where('id', $id)->where('email', '=', $email)->get()[0];

        if($user->email == $email){
            $user->status = 1;
            $user->save();

            return redirect('/')->with('massage', 'Berhasil menverifivaksi akun');
        }
    }
}
