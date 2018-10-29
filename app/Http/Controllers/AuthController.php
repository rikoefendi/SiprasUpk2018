<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate()
    {
        if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }else{
            return redirect('/')->with('message', 'akun anda belum aktif');
        }
    }
}
