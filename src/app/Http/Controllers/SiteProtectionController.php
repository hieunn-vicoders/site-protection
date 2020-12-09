<?php
namespace VCComponent\Laravel\Site\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class SiteProtectionController extends Controller
{
    public function checkFormLoginSiteProtection(Request $request)
    {
        if (env('ACCOUNT_SITE_PROTECTION') && env('PASSWORD_SITE_PROTECTION')) {

            $account = env('ACCOUNT_SITE_PROTECTION');
            $password = env('PASSWORD_SITE_PROTECTION');

            if ($request->account == $account && $request->password == $password) {
                $cookie = cookie::make('site-authentication',$account, 1440);
                return Redirect::to($request->route)->withCookie($cookie);
            }
            return redirect()->back()->with('errors','Tài khoản và mật khẩu không chính xác !');
        } else {
            if ($request->account == "webpress" && $request->password == "webpress") {
                $cookie = cookie::make('site-authentication', "webpress", 1440);
                return Redirect::to($request->route)->withCookie($cookie);
            }
            return redirect()->back()->with('errors','Tài khoản và mật khẩu không chính xác !');
        }
    }
}
