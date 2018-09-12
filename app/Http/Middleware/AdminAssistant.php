<?php

namespace App\Http\Middleware;

use Closure;

class AdminAssistant
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
        if($request->user()->type==='admin' or $request->user()->type==='admin-assistant'){
            return $next($request);
        }
    }
}
