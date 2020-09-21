<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SOTK SERVER
    |--------------------------------------------------------------------------
    |
    | setup SOTK server credentials here
    |
    */

    'client_uri' => env('SOTK_CLIENT_URI', 'https://api.sotk.bkpsdm.karawangkab.go.id'),
    'client_id' => env('SOTK_CLIENT_ID'),
    'client_secret' => env('SOTK_CLIENT_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | SOTK Routes
    |--------------------------------------------------------------------------
    |
    | Here you can define SOTK route as you need.
    |
    */

    'prefix' => 'sotk', // nullable
    'middleware' => ['auth']
];
