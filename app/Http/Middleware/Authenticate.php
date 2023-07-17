<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request)
    {
        if(!$request->expectsJson()){
            if (Request::is(app()->getLocale() . '/student/master')) {
                return route('selection');
            }
            elseif(Request::is(app()->getLocale() . '/teacher/master')) {
                return route('selection');
            }
            elseif(Request::is(app()->getLocale() . '/guardain/master')) {
                return route('selection');
            }
            else {
                return route('selection');
            }
        }
        else{
            return $request->expectsJson() ? null : route('login');
        }
        return response()->json(message:' login your app');
    }
}
