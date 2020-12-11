<?php

use Illuminate\Support\Facades\Route;

Route::post('/check-form-login-site-protection', 'VCComponent\Laravel\Site\Http\Controllers\SiteProtectionController@checkFormLoginSiteProtection')->name("site.protection");
Route::fallback(function () {
    if (isset($_COOKIE['site-authentication']) || env('SITE_PROTECTION') === false) {
        return abort(404);
    }
    return view('protection_page::protection', ['current_route' => "/"]);
});
