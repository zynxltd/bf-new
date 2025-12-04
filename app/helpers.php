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
            
            // Remove width/height from attributes string since we're adding them separately
            $cleanAttrString = preg_replace('/\s+(width|height)="[^"]*"/i', '', $attrString);
            
            return '<picture>' .
                   '<source srcset="' . asset($webpPath) . '" type="image/webp">' .
                   '<source srcset="' . asset($path) . '" type="' . $mimeType . '">' .
                   '<img src="' . asset($path) . '" alt="' . htmlspecialchars($alt, ENT_QUOTES, 'UTF-8') . '"' . $widthAttr . $heightAttr . $cleanAttrString . '>' .
                   '</picture>';
        }
        
        // Fallback to regular img tag
        return '<img src="' . asset($path) . '" alt="' . htmlspecialchars($alt, ENT_QUOTES, 'UTF-8') . '"' . $attrString . '>';
    }
}
