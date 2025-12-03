<?php

if (!function_exists('add_source_param')) {
    /**
     * Add source parameter to YouGarden URLs
     *
     * @param string $url
     * @return string
     */
    function add_source_param($url)
    {
        if (empty($url) || !filter_var($url, FILTER_VALIDATE_URL)) {
            return $url;
        }
        
        $parsedUrl = parse_url($url);
        
        // Only add parameter to yougarden.com links
        if (isset($parsedUrl['host']) && (str_contains($parsedUrl['host'], 'yougarden.com') || str_contains($parsedUrl['host'], 'www.yougarden.com'))) {
            $query = isset($parsedUrl['query']) ? $parsedUrl['query'] : '';
            parse_str($query, $queryParams);
            $queryParams['source'] = 'bloomingfast.com';
            $newQuery = http_build_query($queryParams);
            
            $newUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . (isset($parsedUrl['path']) ? $parsedUrl['path'] : '/');
            if ($newQuery) {
                $newUrl .= '?' . $newQuery;
            }
            if (isset($parsedUrl['fragment'])) {
                $newUrl .= '#' . $parsedUrl['fragment'];
            }
            return $newUrl;
        }
        
        return $url;
    }
}


