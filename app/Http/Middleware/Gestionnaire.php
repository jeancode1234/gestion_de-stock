<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Gestionnaire
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if (Auth()->check()) {
            if (Auth::user()->type == 1) {

                return $next($request);
            }
            else {
                return redirect()->route('home')->with('status','vous n\'avez pas accès a cette page car vous etes pas admin');
            }
        }
        else {
            return redirect()->route('login')->with('status','vous n\'etes pas authentifier');
        }
    }
}
