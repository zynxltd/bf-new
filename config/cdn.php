<?php

return [
    /*
    |--------------------------------------------------------------------------
    | CDN Configuration
    |--------------------------------------------------------------------------
    |
    | Configure CDN settings for static assets. Set CDN_URL in .env file
    | to enable CDN. Leave empty to use local assets.
    |
    */

    'enabled' => env('CDN_ENABLED', false),
    'url' => env('CDN_URL', ''),
    
    /*
    |--------------------------------------------------------------------------
    | CDN Paths
    |--------------------------------------------------------------------------
    |
    | Define which asset paths should use CDN
    |
    */
    
    'paths' => [
        'images' => 'images',
        'css' => 'assets/css',
        'js' => 'assets/js',
        'fonts' => 'assets/fonts',
    ],
];

