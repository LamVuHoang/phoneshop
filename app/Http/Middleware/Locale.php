<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Session;


class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $locale='vi';
        if(\Session::has('locale')) {
            $locale = \Session::get('locale', \Config::get('app.locale'));
        }
        \App::setLocale($locale);
        return $next($request);
    }
}
