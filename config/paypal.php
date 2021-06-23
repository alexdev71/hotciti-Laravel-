<?php
/**
 * PayPal Setting & API Credentials
 */

return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'username'    => env('PAYPAL_SANDBOX_API_USERNAME', 'sb-b1u8g5212534_api1.business.example.com'),
        'password'    => env('PAYPAL_SANDBOX_API_PASSWORD', 'LXU573PGE93QKK7Y'),
        'secret'      => env('PAYPAL_SANDBOX_API_SECRET', 'AQD94ybZW7zkN.y794NgSHhr0onvA3H4EUsULunBm6-DHh3Tvf0pPSB7'),
        'certificate' => env('PAYPAL_SANDBOX_API_CERTIFICATE', ''),
        'app_id'      => 'APP-80W284485P519543T', // Used for testing Adaptive Payments API in sandbox mode
    ],
    'live' => [
        'username'    => env('PAYPAL_SANDBOX_API_USERNAME', 'admin_api1.hotciti.com'),
        'password'    => env('PAYPAL_SANDBOX_API_PASSWORD', 'U5MM4DY7CCMY7YHU'),
        'secret'      => env('PAYPAL_SANDBOX_API_SECRET', 'AoKLkkURQ1NzYHPCjff9iTobsltxA7YLtLD5OQ1NQmxh3do8XlwYT2Ez'),
        'certificate' => env('PAYPAL_SANDBOX_API_CERTIFICATE', ''),
        'app_id'      => 'APP-80W284485P519543T', // Used for testing Adaptive Payments API in sandbox mode
    ],

    'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
    'currency'       => 'USD',
    'notify_url'     => '', // Change this accordingly for your application.
    'locale'         => '', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
    'validate_ssl'   => true, // Validate SSL when creating api client.
];
