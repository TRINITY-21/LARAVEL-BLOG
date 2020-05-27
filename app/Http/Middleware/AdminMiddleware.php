<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;
class AdminMiddleware
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
        if(!Auth::user()->admin)
        {
            Session::flash('info', 'You don\'t have permissions to perform this action');

            return redirect()->back();

        }
        return $next($request);
    }
}
