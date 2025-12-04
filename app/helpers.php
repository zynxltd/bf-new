<?php

if (!function_exists('cdn_asset')) {
    /**
     * Generate an asset URL with CDN support
     *
     * @param  string  $path
     * @return string
     */
    function cdn_asset($path)
    {
        $cdnEnabled = config('cdn.enabled', false);
        $cdnUrl = config('cdn.url', '');
        
        if ($cdnEnabled && $cdnUrl) {
            // Remove leading slash if present
            $path = ltrim($path, '/');
            return rtrim($cdnUrl, '/') . '/' . $path;
        }
        
        return asset($path);
    }
}

if (!function_exists('webp_image')) {
    /**
     * Generate WebP image path with fallback
     *
     * @param  string  $path
     * @return string
     */
    function webp_image($path)
    {
        $webpPath = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $path);
        $webpFullPath = public_path($webpPath);
        
        // Check if WebP version exists
        if (file_exists($webpFullPath)) {
            return asset($webpPath);
        }
        
        // Fallback to original
        return asset($path);
    }
}
