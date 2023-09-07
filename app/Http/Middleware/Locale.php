<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ( 
            $request->route()->getPrefix() == 'api' 
            && $request->hasHeader("Accept-Language") 
            && key_exists($request->header("Accept-Language"), config('app.site_locales')) ) {
            /**
             * If Accept-Language header found then set it to the default locale
             */
            App::setLocale($request->header("Accept-Language"));
        }else{
            if( session()->has('locale') ) {
                app()->setLocale(session()->get('locale'));
            }
        }

        return $next($request);
    }
}
