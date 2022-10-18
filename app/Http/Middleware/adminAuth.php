<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class adminAuth
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
        if(Auth::check()){
            if(Auth::user()->usertype == 'admin'){       
                return $next($request);
            }
            else {
                //return back();
                return redirect('/');
            }
        }
        return redirect('/');
        //return back();
    }
}
