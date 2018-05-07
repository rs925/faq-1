<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Auth;

use Closure;

class moderatorMiddleware
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
        if($request->user() && $request->user()->role != 'moderator')
        { return new Response(view('unauth')->with('role','moderator'));
        }
        return $next($request);
    }
}
