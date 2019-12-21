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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $record = Auth::user();
        // print_r($record);
        return view('home',compact('record'));
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
}
