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
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    @stack('styles')
</head>
<body>
    
    @yield('content')
    
    <!-- Preloader !remove please if you do not want -->
    <div id="preloader"><div id="status">&nbsp;</div></div> 
    <!-- Preloader End -->
    
    <!-- Google Map Script -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyD6cxB4idvB67_Mz1ScQn-_nBJmltUaS-g"></script> 
    <script src="{{ asset('assets/js/googleMap.js') }}"></script>

    <!-- JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="{{ asset('assets/js/jquery.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    
    @stack('scripts')
</body>
</html>

