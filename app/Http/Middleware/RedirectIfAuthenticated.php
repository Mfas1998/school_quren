<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Symfony\Component\HttpFoundation\Response;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class RedirectIfAuthenticated
{

        public function handle($request, Closure $next)
        {
            if (auth('web')->check()) {
                return redirect(RouteServiceProvider::HOME);
            }

            if (auth('student')->check()) {
                return redirect(RouteServiceProvider::STUDENT);
            }

            if (auth('teacher')->check()) {
                return redirect(RouteServiceProvider::TEACHER);
            }

            if (auth('guardian')->check()) {
                return redirect(RouteServiceProvider::GUARDIAN);
            }

            return $next($request);
        }
}
