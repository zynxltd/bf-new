<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Helper function to add source parameter to URLs
        if (!function_exists('add_source_param')) {
            function add_source_param($url) {
                if (empty($url) || !filter_var($url, FILTER_VALIDATE_URL)) {
                    return $url;
                }
                
                $separator = strpos($url, '?') !== false ? '&' : '?';
                return $url . $separator . 'source=bloomingfast.com';
            }
        }
    }
}
