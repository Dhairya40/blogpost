<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Country;
use App\BlogpostType;
use App\Blogpost;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $record    = Auth::user();
        $country   = country::all();
        $blogtype  = BlogpostType::all();
        return view('home',compact('record','country','blogtype'));
    }

    
}
