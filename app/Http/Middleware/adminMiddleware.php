<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Response;
use Auth;

class adminMiddleware
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
        if($request->user() && $request->user()->role != 'administrator')
        { return new Response(view('unauth')->with('role','administrator'));
        }
        return $next($request);
    }
}
