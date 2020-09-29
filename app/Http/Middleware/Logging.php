<?php

namespace App\Http\Middleware;

use Closure;
use \App\Models\Logs;

class Logging
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
        $url = $request->url();
        $method = $request->method();

        Logs::create([
            'url' => $url,
            'method' => $method,
            'visitor' => $request->ip(),
            'status' => 200
        ]);

        return $next($request);
    }
}
