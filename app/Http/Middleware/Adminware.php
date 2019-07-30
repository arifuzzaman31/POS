<?php

namespace App\Http\Middleware;
use Session;
use Auth;
use Closure;

class Adminware
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
        if (Session::has('admin')) {
            return $next($request);
        } else {
            return redirect('/backend');
        }
    }
}
