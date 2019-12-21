<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Blogpost;
class AdminController extends Controller
{
	public function __construct()
	{
 
		$this->middleware(['auth','admin']);
	}

    public function index()
    {
        $users = user::all();
        $allposts = blogpost::paginate(20);
    	return view('backend.admin.index',compact('users','allposts'));
    }
}
