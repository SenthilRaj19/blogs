<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            if(Auth::viaRemember()){
                $login=1;
            } else {
                $login=0;
            }
            $user =Auth::user();
            return view('home')->withUser($user)->withLogin($login);

    }
}
