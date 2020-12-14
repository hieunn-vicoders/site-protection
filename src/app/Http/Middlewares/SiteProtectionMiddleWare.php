<?php

namespace VCComponent\Laravel\Site\Http\Middlewares;

use Closure;
use Illuminate\Support\Facades\Hash;
class SiteProtectionMiddleWare
{
    public function handle($request, Closure $next)
    {
        if (config('site-protection.enable') === true) {
            if (isset($_COOKIE['site-authentication']) && Hash::check(config('site-protection.custom_or_default.account'), $_COOKIE['site-authentication'])) {
                return $next($request);
            }
            $current_route = $request->path();
            return response()->view('protection_page::protection', compact('current_route'));
        }
        return $next($request);
    }
}
