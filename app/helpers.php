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

if (!function_exists('webp_picture')) {
    /**
     * Generate picture element with WebP source and fallback
     *
     * @param  string  $path
     * @param  string  $alt
     * @param  array   $attributes
     * @return string
     */
    function webp_picture($path, $alt = '', $attributes = [])
    {
        // If path is already a full URL (route or external), use it directly
        if (strpos($path, 'http://') === 0 || strpos($path, 'https://') === 0 || strpos($path, '//') === 0) {
            // Build attributes string
            $attrString = '';
            foreach ($attributes as $key => $value) {
                $attrString .= ' ' . $key . '="' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . '"';
            }
            return '<img src="' . htmlspecialchars($path, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($alt, ENT_QUOTES, 'UTF-8') . '"' . $attrString . '>';
        }
        
        $webpPath = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $path);
        $webpFullPath = public_path($webpPath);
        $originalPath = public_path($path);
        
        // Build attributes string
        $attrString = '';
        foreach ($attributes as $key => $value) {
            if ($key === 'width' || $key === 'height') {
                // Ensure width/height are preserved for aspect ratio
                $attrString .= ' ' . $key . '="' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . '"';
            } else {
                $attrString .= ' ' . $key . '="' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . '"';
            }
        }
        
        // If WebP exists, use picture element
        if (file_exists($webpFullPath) && file_exists($originalPath)) {
            $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
            $mimeType = $ext === 'jpg' || $ext === 'jpeg' ? 'image/jpeg' : 'image/png';
            
            // Get actual image dimensions for proper aspect ratio
            $imageInfo = @getimagesize($originalPath);
            $widthAttr = isset($attributes['width']) ? ' width="' . htmlspecialchars($attributes['width'], ENT_QUOTES, 'UTF-8') . '"' : '';
            $heightAttr = isset($attributes['height']) ? ' height="' . htmlspecialchars($attributes['height'], ENT_QUOTES, 'UTF-8') . '"' : '';
            
            // If dimensions provided, use them; otherwise use actual dimensions
            if (!$widthAttr && $imageInfo) {
                $widthAttr = ' width="' . $imageInfo[0] . '"';
            }
            if (!$heightAttr && $imageInfo) {
                $heightAttr = ' height="' . $imageInfo[1] . '"';
            }
            
            // Handle fetchpriority attribute
            $fetchpriorityAttr = isset($attributes['fetchpriority']) ? ' fetchpriority="' . htmlspecialchars($attributes['fetchpriority'], ENT_QUOTES, 'UTF-8') . '"' : '';
            
            // Extract style attribute separately to apply to img tag
            $styleAttr = '';
            if (isset($attributes['style'])) {
                $styleAttr = ' style="' . htmlspecialchars($attributes['style'], ENT_QUOTES, 'UTF-8') . '"';
            }
            
            // Remove width/height/fetchpriority/style from attributes string since we're adding them separately
            $cleanAttrString = preg_replace('/\s+(width|height|fetchpriority|style)="[^"]*"/i', '', $attrString);
            
            return '<picture>' .
                   '<source srcset="' . asset($webpPath) . '" type="image/webp">' .
                   '<source srcset="' . asset($path) . '" type="' . $mimeType . '">' .
                   '<img src="' . asset($path) . '" alt="' . htmlspecialchars($alt, ENT_QUOTES, 'UTF-8') . '"' . $widthAttr . $heightAttr . $fetchpriorityAttr . $styleAttr . $cleanAttrString . '>' .
                   '</picture>';
        }
        
        // Fallback to regular img tag
        return '<img src="' . asset($path) . '" alt="' . htmlspecialchars($alt, ENT_QUOTES, 'UTF-8') . '"' . $attrString . '>';
    }
}

if (!function_exists('adjust_brightness')) {
    /**
     * Adjust the brightness of a hex color
     *
     * @param  string  $hex
     * @param  int     $steps
     * @return string
     */
    function adjust_brightness($hex, $steps)
    {
        // Remove # if present
        $hex = ltrim($hex, '#');
        
        // Convert to RGB
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        
        // Adjust brightness
        $r = max(0, min(255, $r + $steps));
        $g = max(0, min(255, $g + $steps));
        $b = max(0, min(255, $b + $steps));
        
        // Convert back to hex
        return '#' . str_pad(dechex($r), 2, '0', STR_PAD_LEFT) . 
                   str_pad(dechex($g), 2, '0', STR_PAD_LEFT) . 
                   str_pad(dechex($b), 2, '0', STR_PAD_LEFT);
    }
}
