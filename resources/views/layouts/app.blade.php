<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blooming Fast Garden Supplements – Bigger & Better Flowering displays">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <!-- Site Title  -->
    <title>@yield('title', 'Blooming Fast Plant Foods')</title>
    <!-- Vendor Bundle CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.bundle.css') }}">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/theme-blue-green.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @stack('styles')
</head>
<body style="overflow: hidden;">
    
    @yield('content')
    
    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader-content">
            <div class="preloader-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Blooming Fast Logo" class="preloader-logo-img" />
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
        
        // Hide after 300ms maximum
        setTimeout(hide, 300);
        
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
    
    @stack('scripts')
</body>
</html>

