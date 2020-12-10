<?php

use Illuminate\Support\Facades\Route;


Route::post('/check-form-login-site-protection', 'VCComponent\Laravel\Site\Http\Controllers\SiteProtectionController@checkFormLoginSiteProtection')->name("site.protection");
