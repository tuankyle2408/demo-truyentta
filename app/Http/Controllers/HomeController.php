<?php

namespace App\Http\Controllers;

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
        $this->middleware('permission:manager',['only' => ['index','show']]);
        $this->middleware('permission:manager', ['only' => ['create','store']]);
        $this->middleware('permission:manager', ['only' => ['edit','update']]);
        $this->middleware('permission:manager', ['only' => ['destroy']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {


        return view('home');
    }



}
