<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Cache;
use Carbon\Carbon;
class LastUserActivity
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
        if (Auth::check()) {
            $expireAt = Carbon::now()->addMinutes('10');
            Cache::put('user_is_online_' . Auth::user()->id, true, $expireAt);
        }
        return $next($request);
    }
}
