<?php

namespace VCComponent\Laravel\Site\Http\Middlewares;

use Closure;
use Illuminate\Http\Response;

// use Symfony\Component\HttpFoundation\Cookie;
class SiteProtectionMiddleWare
{
    public function handle($request, Closure $next)
    {
        if (env('SITE_PROTECTION') == true) {
            if (isset($_COOKIE['site-authentication'])) {
                return $next($request);
            }
            $current_route = $request->path();
            return response()->view('protection_page::protection', compact('current_route'));
        }
        return $next($request);
    }
}
