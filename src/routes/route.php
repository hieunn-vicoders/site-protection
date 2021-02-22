<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/check-form-login-site-protection', 'VCComponent\Laravel\Site\Http\Controllers\SiteProtectionController@checkFormLoginSiteProtection')->name("site.protection");
Route::get('/login-internal', 'VCComponent\Laravel\Site\Http\Controllers\SiteProtectionController@showFormLoginSiteProtection')->name('show.protection');

