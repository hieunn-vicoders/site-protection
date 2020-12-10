<?php
namespace VCComponent\Laravel\Site\Http\Validators;

use Illuminate\Http\Request;

class SiteProtectionValidator
{

    public function isValid(Request $request)
    {
        $validatedData = $request->validate(
            [
                'account'    => 'required',
                'password'      => 'required',
            ],
            [
                'account.required'    => "Họ tên không được để trống",
                'password.required'      => "Mật khẩu không được để trống",
            ]
        );
    }
}
