<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;


class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (auth('web')->check()) {
            return redirect(RouteServiceProvider::HOME);
        }
        if (auth('admin')->check()) {
            return redirect(RouteServiceProvider::ADMIN);
        }
        return $next($request);
    }
}
