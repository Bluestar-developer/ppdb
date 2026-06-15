<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Midtrans Configuration
    |--------------------------------------------------------------------------
    |
    | Store Midtrans keys and mode here so views and controllers use
    | `config('midtrans.*')` instead of calling `env()` directly.
    |
    */

    'server_key' => env('MIDTRANS_SERVER_KEY'),
    'client_key' => env('MIDTRANS_CLIENT_KEY'),
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
];
