<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        $this->middleware('auth')->except(['guest', 'index']);
        $this->middleware('verified')->only(['home']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    function index()
    {

       return view('index');
    }
    public function home()
    {
        return view('home');
    }

    function verificado()
    {
        return view('verificado');
    }
}
