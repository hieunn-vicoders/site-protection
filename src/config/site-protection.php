<?php

return [
    'enable'  => env('SITE_PROTECTION'),

    'custom_or_default'  => [
        'account'  => env('ACCOUNT_SITE_PROTECTION', "webpress"),
        'password' => env('PASSWORD_SITE_PROTECTION', "webpress"),
    ],

];
