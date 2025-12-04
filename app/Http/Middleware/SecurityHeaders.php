<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Generate nonces for CSP
        $scriptNonce = base64_encode(Str::random(32));
        $styleNonce = base64_encode(Str::random(32));
        
        // Store nonces in view for use in templates
        view()->share('scriptNonce', $scriptNonce);
        view()->share('styleNonce', $styleNonce);
        
        $response = $next($request);

        // Add security headers
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=(), camera=()');
        
        // COOP (Cross-Origin-Opener-Policy) for better isolation
        $response->headers->set('Cross-Origin-Opener-Policy', 'same-origin');
        
        // HSTS (only on HTTPS)
        if ($request->secure()) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
        }
        
        // CSP Header - using nonces for better XSS protection
        // Note: We still need 'unsafe-eval' for some third-party scripts (Feefo), but nonces are more secure than 'unsafe-inline'
        $csp = "default-src 'self'; " .
               "script-src 'self' 'nonce-{$scriptNonce}' 'strict-dynamic' 'unsafe-eval' https://register.feefo.com https://api.feefo.com https://fonts.googleapis.com https://maps.googleapis.com; " .
               "style-src 'self' 'nonce-{$styleNonce}' 'unsafe-inline' https://fonts.googleapis.com https://maxcdn.bootstrapcdn.com https://register.feefo.com; " .
               "font-src 'self' https://fonts.gstatic.com https://maxcdn.bootstrapcdn.com data:; " .
               "img-src 'self' data: https:; " .
               "connect-src 'self' https://register.feefo.com https://api.feefo.com https://collect.feefo.com; " .
               "frame-src https://register.feefo.com https://player.vimeo.com https://www.youtube.com; " .
               "object-src 'none'; " .
               "base-uri 'self'; " .
               "form-action 'self'; " .
               "upgrade-insecure-requests;";
        $response->headers->set('Content-Security-Policy', $csp);

        return $response;
    }
}

