<?php

namespace App\Http\Middleware;

use Closure;

class ClientAssistant
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
        if($request->user()->type==='client' or $request->user()->type==='client-assistant'){
            return $next($request);
        }
        flash("Sorry, you don't have sufficient rights to view this page!!")->error();
        return back();
    }
}
