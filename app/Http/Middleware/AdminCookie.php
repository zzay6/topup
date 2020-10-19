<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Cookie;
use App\User;

class AdminCookie
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
        if(isset($_COOKIE['zvcaytpy'])){

            $email = Cookie::where('cookie',$_COOKIE['zvcaytpy'])->first()->email;
            $level = User::where('email',$email)->first('level')->level;

            if($level == 'Admin'){

                return $next($request);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
