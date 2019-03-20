<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class consumerAuth
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
            if(Auth::user()->usertype == 'concessionaire' || Auth::user()->usertype == 'Concessionaire' || Auth::user()->usertype == 'CONCESSIONAIRE' || Auth::user()->usertype == 'CONSUMER' || Auth::user()->usertype == 'consumer' || Auth::user()->usertype == 'Consumer'){       
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
