<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class Authenticate extends Middleware
{
    public function authSession(Request $request, Closure $next)
    {
        $usernameCookie = FacadesRequest::cookie('username');

        if ($usernameCookie === '' || $usernameCookie === null)
        {
            return redirect('/login');
        }

        return $next($request);
    }
}
