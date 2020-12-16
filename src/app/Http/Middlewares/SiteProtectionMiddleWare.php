<?php

namespace VCComponent\Laravel\Site\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiteProtectionMiddleWare
{
    protected $route;

    public function __construct(Request $request)
    {
        $this->route = $request->path();
    }

    public function handle($request, Closure $next)
    {
        if (config('site-protection.enable') === true) {
            if (isset($_COOKIE['site-authentication']) && Hash::check(config('site-protection.custom_or_default.password'), $_COOKIE['site-authentication'])) {
                return $next($request);
            }
            if ($this->route == "/") {
                return redirect()->route('show.protection', ['route' => "home"]);
            } else {
                return redirect()->route('show.protection', ['route' => $this->route]);
            }
        }
        return $next($request);
    }
}
