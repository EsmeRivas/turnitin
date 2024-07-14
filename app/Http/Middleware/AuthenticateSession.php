<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class AuthenticateSession extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        $usernameCookie = FacadesRequest::cookie('username');

        if ($usernameCookie === '' || $usernameCookie === null)
        {
            return redirect('/login');
        }

        return $next($request);
    }
}
