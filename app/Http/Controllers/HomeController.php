<?php

namespace App\Http\Controllers;
use App\User;
use App\Inbox;
use App\Outbox;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = new User();

        $inbox = Inbox::count();
        $outbox = Outbox::count();

        return view('home', compact('inbox', 'outbox', 'users'));
    }
}
