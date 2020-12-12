<?php

return [
    'enable'  => env('SITE_PROTECTION'),

    'custom'  => [
        'account'  => env('ACCOUNT_SITE_PROTECTION'),
        'password' => env('PASSWORD_SITE_PROTECTION'),
    ],

    'default' => [
        'account'  => 'webpress',
        'password' => 'webpress',
    ],

];
