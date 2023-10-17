<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;


class Autenticador
{
    
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            throw new AuthenticationException();
        }
        return $next($request);
    }
}
