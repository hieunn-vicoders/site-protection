<?php
namespace VCComponent\Laravel\Site\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class SiteProtectionController extends Controller
{
    public $account;
    public $password;
    public function __construct()
    {
        if (config('site-protection.account') && config('site-protection.password')) {
            $this->account  = config('site-protection.account');
            $this->password = config('site-protection.password');
        } else {
            $this->account  = env("ACCOUNT_SITE_PROTECTION");
            $this->password = env("PASSWORD_SITE_PROTECTION");
        }
    }
    public function checkFormLoginSiteProtection(Request $request)
    {
        if ($request->account === $this->account && $request->password === $this->password) {
            $cookie = cookie::make('site-authentication', Hash::make($this->account), 1440);
            return Redirect::to($request->route)->withCookie($cookie);
        }
        return Redirect::back()->with("errors", 'Tài khoản hoặc mật khẩu không hợp lệ !');
    }
}
