<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Country;
use App\BlogpostType;
use App\Blogpost;
use App\User;

class FrontendController extends Controller
{
    public function home(Request $request)
    {   
        $ip = $request->ip();
        $blogtype = BlogpostType::all();
        $blogpost = blogpost::with('BlogpostType','user')->paginate(10);
        return view('frontend.index',compact('blogtype','blogpost'));
    }
	public function filter($id)
	{ 
	    $blogtype = BlogpostType::all();
	    $blogpost = blogpost::with('BlogpostType','user')
	    ->where('blogpost_type_id',$id) 
	    ->paginate(10);

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

    public function search()
    {
        if (request()->filled('query')) {
          $query = request()->query('query');
          $searchResults = blogpost::where('slug', 'LIKE', '%'.$query.'%')
                                ->orWhere('author','LIKE','%'.$query.'%')
                                ->orWhere('title','LIKE','%'.$query.'%')
                                ->orWhere('heading','LIKE','%'.$query.'%')
                                ->with('BlogpostType','user')  
                                ->paginate(10);
           return view('frontend.search',compact('searchResults'));
        }else{
            $searchResults = array();
            $query = 'NA';
            return view('frontend.search',compact('searchResults','query'));
        }
        
        
       
    }
}
