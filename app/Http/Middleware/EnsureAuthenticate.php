<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class ensureauthenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        $usernameCookie = FacadesRequest::cookie('username');

        if ($usernameCookie !== '' && $usernameCookie !== null)
        {
            return redirect('/');
        }

        return $next($request);
    }
}
