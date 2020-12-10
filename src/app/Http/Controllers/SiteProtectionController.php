<?php
namespace VCComponent\Laravel\Site\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class SiteProtectionController extends Controller
{
    public function checkFormLoginSiteProtection(Request $request)
    {
        if (env('ACCOUNT_SITE_PROTECTION') && env('PASSWORD_SITE_PROTECTION')) {
            $account  = env('ACCOUNT_SITE_PROTECTION');
            $password = env('PASSWORD_SITE_PROTECTION');
            if ($request->account == $account && $request->password == $password) {
                $cookie = cookie::make('site-authentication', Hash::make($account), 1440);
                return Redirect::to($request->route)->withCookie($cookie);
            }
            return Redirect::back()->with("errors", 'Tài khoản hoặc mật khẩu không hợp lệ !');
        } else {
            if ($request->account == "webpress" && $request->password == "webpress") {
                $cookie = cookie::make('site-authentication', Hash::make("webpress"), 1440);
                return Redirect::to($request->route)->withCookie($cookie);
            }
            return Redirect::back()->with('errors', 'Tài khoản hoặc mật khẩu không hợp lệ !');
        }
    }
}
