<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="description" content="Blooming Fast Garden Supplements – Bigger & Better Flowering displays">
    <meta name="theme-color" content="#537550">
    <meta name="format-detection" content="telephone=no">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    <meta name="distribution" content="global">
    <meta name="rating" content="general">
    
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ cdn_asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ cdn_asset('images/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ cdn_asset('images/favicon.png') }}">
    
    <!-- Site Title  -->
    <title>@yield('title', 'Blooming Fast Plant Foods')</title>
    
    <!-- SEO Meta Tags -->
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="sitemap" type="application/xml" href="{{ route('sitemap') }}">
    
    @stack('meta')
    <!-- Vendor Bundle CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.bundle.css') }}">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/theme-blue-green.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-new.css') }}?v={{ filemtime(public_path('assets/css/custom-new.css')) }}" rel="stylesheet" media="all">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Feefo Widget Stylesheets -->
    <link class="feefo-widget-styles" rel="stylesheet" type="text/css" href="https://register.feefo.com//feefo-widget-v2/js/service-carousel-service-carousel-jsx.css">
    <link class="feefo-widget-styles" rel="stylesheet" type="text/css" href="https://register.feefo.com//feefo-widget-v2/js/product-stars-widget-product-stars-widget-jsx.css">
    @stack('styles')
</head>
<body style="overflow: hidden;">
    
    @yield('content')
    
    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader-content">
            <div class="preloader-logo">
                <div class="preloader-dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader End -->
    
    <!-- Inline preloader script - runs immediately without jQuery -->
    <script>
    (function() {
        var preloader = document.getElementById('preloader');
        var hidden = false;
        var hide = function() {
            if (hidden || !preloader) return;
            hidden = true;
            preloader.classList.add('fade-out');
            setTimeout(function() {
                if (preloader && preloader.parentNode) {
                    preloader.remove();
                }
                document.body.style.overflow = 'visible';
            }, 150);
        };
        
        // Hide after page fully loads (minimum 800ms for smooth transition)
        setTimeout(hide, 800);
        
        // Hide on load
        if (document.readyState === 'complete') {
            setTimeout(hide, 50);
        } else {
            window.addEventListener('load', function() {
                setTimeout(hide, 50);
            });
        }
        
        // Hide when DOM ready
        if (document.readyState !== 'loading') {
            setTimeout(hide, 200);
        } else {
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(hide, 200);
            });
        }
    })();
    </script>
    
    <!-- Google Map Script - Only load if map element exists -->
    @if(View::hasSection('google-map'))
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyD6cxB4idvB67_Mz1ScQn-_nBJmltUaS-g&loading=async" async defer></script> 
    <script src="{{ asset('assets/js/googleMap.js') }}" defer></script>
    @endif

    <!-- JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="{{ asset('assets/js/jquery.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    
    <!-- Feefo Widget Scripts -->
    <script async="async" src="//register.feefo.com//feefo-widget-v2/js/feefo-widget.js" type="text/javascript"></script>
    <script async="async" src="https://api.feefo.com/feefo-widgets-data/loader/widgets/you-garden" type="text/javascript"></script>
    <script type="text/javascript" id="feefo-loader-lib" src="https://register.feefo.com/feefo-widgets-app/feefo_widgets_loader.js"></script>
    <script type="text/javascript" id="reevoo_badges" src="https://register.feefo.com/badge-ui/feefo_adaptive_badges.js"></script>
    <!-- Main Feefo Widget Script -->
    <script src="https://api.feefo.com/api/javascript/you-garden" async></script>
    
    @stack('scripts')
</body>
</html>

