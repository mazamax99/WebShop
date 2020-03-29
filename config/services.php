<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'vkontakte' => [
        'client_id' => env('7370582'),
        'client_secret' => env('IoNq16Ihqu5t4TCu1gC0'),
        'redirect' => env('/social-auth/vkontakte/callback')
    ],
    'facebook' => [
        'client_id' => '739534509783816',
        'client_secret' => 'c5cf6432c080055385bc96442ea18160',
        'redirect' => '/social-auth/facebook/callback',
    ],

'github' => [
    'client_id' => '7a10e13d296ea8490e55',
    'client_secret' => '1d121d0cc0f64bafb09153b030b4ce95af93d87f',
    'redirect' => 'http://localhost:8000/social-auth/github/callback', //Ссылка на перенаправление при удачной авторизации (3)
],
];
