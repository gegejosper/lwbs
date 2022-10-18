<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class cashierAuth
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
            if(Auth::user()->usertype == 'collector' || Auth::user()->usertype == 'Collector' || Auth::user()->usertype == 'COLLECTOR'){       
                return $next($request);
            }
            else {
                //return back();
                return redirect('/');
                //return redirect('home');
            }
        }
        return redirect('/');
        //return back();
    }
}
