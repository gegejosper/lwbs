<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class meterAuth
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
            if(Auth::user()->usertype == 'Meter Reader' || Auth::user()->usertype == 'reader' || Auth::user()->usertype == 'meterreader' ||Auth::user()->usertype == 'meter' ){       
                return $next($request);
            }
            else {
                return back();
                //return redirect('home');
            }
        }
        return back();
    }
}
