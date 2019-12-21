<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminAutnenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {    
        if (Auth::user()->role->name == 'customer') {
            return redirect('/home')->with('error_message','OPPS!! Your are not allow to access this Page!!!');
        }
        return $next($request);
    }
}
