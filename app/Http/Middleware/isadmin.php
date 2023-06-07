<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role=="user" || Auth::user()->role=="superadmin" || Auth::user()->role=="moderator"){
         return $next($request);

        }else{
            return redirect('/')->with('error4',"You have no permission");
        }

    }
}
