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

    'currency_conversion' => [
        'base_uri' => env('CURRENCY_CONVERSION_BASE_URI'),
        'api_key' => env('CURRENCY_CONVERSION_API_KEY'),
    ],
    'mailgun' => [
        'domain' => env('sandboxb80d12032c914943839f610a732faf61.mailgun.org'),
        'secret' => env('314a819af73aa4953622ab53e5f5a359-e5e67e3e-6345cc49'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'mercadopago' => [
        'base_uri' => env('MERCADOPAGO_BASE_URI'),
        'key' => env('MERCADOPAGO_KEY'),
        'secret' => env('MERCADOPAGO_SECRET'),
        'base_currency' => 'ars',
        'class' => App\Services\MercadoPagoService::class,
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
