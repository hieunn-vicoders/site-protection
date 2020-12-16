<?php

return [
    'enable'            => env('SITE_PROTECTION'),

    'minutes'           => 1440,

    'custom_or_default' => [
        'account'  => env('ACCOUNT_SITE_PROTECTION', "webpress"),
        'password' => env('PASSWORD_SITE_PROTECTION', "webpress"),
    ],

];
