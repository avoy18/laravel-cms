<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(Auth::check()){
            if(Auth::user()->adminCheck()){
                return $next($request);
            }
            if(Auth::user()->role == 'Editor' && Auth::user()->is_active == 1 ){
                return redirect('home');
            }
           
        } return redirect(404);
     
    }
}
