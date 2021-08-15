<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Activated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()->active()) {
            return $request->expectsJson() 
                ? abort(403, 'Your account is not activate')
                : redirect()->guest(route('activate'));
        }
        return $next($request);
    }
}
