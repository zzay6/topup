<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Buyyer
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
            if(Auth::user()->level == 'Admin'){
                return redirect('admin');
            }
        }

        return $next($request);
    }
}
