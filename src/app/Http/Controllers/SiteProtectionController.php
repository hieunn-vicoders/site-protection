<?php
namespace VCComponent\Laravel\Site\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class SiteProtectionController extends Controller
{
    protected $account;
    protected $password;

    public function __construct()
    {
        if (config('site-protection.custom_or_default.account') && config('site-protection.custom_or_default.password')) {
            $this->account  = config('site-protection.custom_or_default.account');
            $this->password = config('site-protection.custom_or_default.password');
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
