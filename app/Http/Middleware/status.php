<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class status
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
        if(!Auth::check()){
            return redirect('login');
        }

        if(auth()->user()->status == $role){
            return $next($request);
        }

        return redirect('login')->with('error',"You don't have admin access.");
    }
}