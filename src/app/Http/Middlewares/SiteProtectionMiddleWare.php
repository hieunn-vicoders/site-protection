<?php

namespace VCComponent\Laravel\Site\Http\Middlewares;

use Closure;

class SiteProtectionMiddleWare
{
    public function handle($request, Closure $next)
    {
        if (config('site-protection.enable') === true) {
            if (isset($_COOKIE['site-authentication'])) {
                return $next($request);
            }
            $current_route = $request->path();
            return response()->view('protection_page::protection', compact('current_route'));
        }
        return $next($request);
    }
}
