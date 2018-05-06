<?php

namespace App\Http\Middleware;

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
        if($request->user() && $request->user()->type != 'moderator')
        { return new Response(view('unauth')->with('role','moderator'));
        }
        return $next($request);
    }
}
