<?php

return [
    'client_id' => env('ISAMS_REST_CLIENT_ID'),
    'client_secret' => env('ISAMS_REST_CLIENT_SECRET'),
    'base_url' => env('ISAMS_BASE_URL', env('IASMS_BASE_URL')),

    'connections' => [],

    'timeouts' => [
        'connect' => env('ISAMS_CONNECT_TIMEOUT', 10),
        'request' => env('ISAMS_REQUEST_TIMEOUT', 30),
    ],

    'retries' => [
        'times' => env('ISAMS_RETRIES'),
        'interval_ms' => 500,
    ],

    'reauthenticate' => env('ISAMS_REAUTHENTICATE', false),

    'cache' => [
        'enabled' => env('ISAMS_CACHE', false),
        'store' => env('ISAMS_CACHE_STORE'),
        'seconds' => 3600,
    ],

    'circuit_breaker' => [
        'enabled' => env('ISAMS_CIRCUIT_BREAKER', false),
        'failures' => 5,
        'window_seconds' => 60,
        'cooldown_seconds' => 60,
    ],
];
