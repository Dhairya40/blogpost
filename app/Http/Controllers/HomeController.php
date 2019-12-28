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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $record  = Auth::user();
        $country = country::all();
        $blogtype = BlogpostType::all();
        return view('home',compact('record','country','blogtype'));
    }

    public function home()
    { 
        $blogtype = BlogpostType::all();
        $blogpost = blogpost::with('BlogpostType')->paginate(10);
        return view('frontend.index',compact('blogtype','blogpost'));
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
