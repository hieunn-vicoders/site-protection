<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/check-form-login-site-protection', 'VCComponent\Laravel\Site\Http\Controllers\SiteProtectionController@checkFormLoginSiteProtection')->name("site.protection");
Route::get('/login-internal', 'VCComponent\Laravel\Site\Http\Controllers\SiteProtectionController@showFormLoginSiteProtection')->name('show.protection');

Route::fallback(function (Request $request) {
    if (config('site-protection.enable') === true) {
        if (isset($_COOKIE['site-authentication'])) {
            return abort(404);
        }
        $route = $request->path();
        return redirect()->route('show.protection', ['route' => $route]);
    }
    return abort(404);
});
