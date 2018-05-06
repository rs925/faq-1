<?php

namespace App\Http\Middleware;

use Closure;

class userMiddleware
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
        if($request->user() && $request->user()->type != 'user')
        { return new Response(view('unauth')->with('role','user'));
        }
        return $next($request);
    }
}
