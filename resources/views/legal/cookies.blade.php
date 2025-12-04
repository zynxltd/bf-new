@extends('layouts.app')

@section('title', 'Cookie Policy - Blooming Fast')

@push('meta')
<meta name="description" content="Cookie Policy for Blooming Fast. Learn about how we use cookies on our website.">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<meta name="googlebot" content="index, follow">
<meta name="bingbot" content="index, follow">
<link rel="canonical" href="{{ url()->current() }}">
@endpush

@section('content')
<!-- Navigation -->
<div id="navigation" class="navigation is-transparent" data-spy="affix" data-offset-top="5">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#site-collapse-nav" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img class="logo logo-light" src="{{ asset('images/logo.png') }}" alt="logo" />
                    <img class="logo logo-color" src="{{ asset('images/logo.png') }}" alt="logo" />
                </a>
            </div>
            <div class="collapse navbar-collapse" id="site-collapse-nav">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('home') }}#home" class="nav-item">Home</a></li>
                    <li><a href="{{ route('home') }}#about" class="nav-item">About</a></li>
                    <li><a href="{{ route('home') }}#features" class="nav-item">Features</a></li>
                    <li><a href="{{ route('home') }}#products" class="nav-item">Products</a></li>
                    <li><a href="{{ route('home') }}#videos" class="nav-item">Videos</a></li>
                    <li><a href="{{ route('home') }}#faq" class="nav-item">FAQ</a></li>
                    <li><a href="{{ route('blog.index') }}" class="nav-item">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!-- Legal Content Section -->
<div class="section white-bg pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="mb-40">Cookie Policy</h1>
                <p class="lead mb-40">Last updated: {{ date('F j, Y') }}</p>

                <div class="legal-content">
                    <h2>1. What Are Cookies</h2>
                    <p>Cookies are small text files that are placed on your computer or mobile device when you visit a website. They are widely used to make websites work more efficiently and provide information to the owners of the site.</p>

                    <h2>2. How We Use Cookies</h2>
                    <p>We use cookies for the following purposes:</p>
                    <ul>
                        <li><strong>Essential Cookies:</strong> These cookies are necessary for the website to function properly. They enable core functionality such as security, network management, and accessibility.</li>
                        <li><strong>Analytics Cookies:</strong> These cookies help us understand how visitors interact with our website by collecting and reporting information anonymously.</li>
                        <li><strong>Functional Cookies:</strong> These cookies enable the website to provide enhanced functionality and personalization.</li>
                    </ul>

                    <h2>3. Third-Party Cookies</h2>
                    <p>In addition to our own cookies, we may also use various third-party cookies to report usage statistics of the service, deliver advertisements, and so on. These third-party cookies include:</p>
                    <ul>
                        <li>Google Analytics</li>
                        <li>Feefo review widgets</li>
                        <li>Social media platforms (if applicable)</li>
                    </ul>

                    <h2>4. Managing Cookies</h2>
                    <p>You can control and/or delete cookies as you wish. You can delete all cookies that are already on your computer and you can set most browsers to prevent them from being placed. However, if you do this, you may have to manually adjust some preferences every time you visit a site and some services and functionalities may not work.</p>

                    <h2>5. Contact Us</h2>
                    <p>If you have any questions about our use of cookies, please contact us at:</p>
                    <p>
                        Blooming Fast<br>
                        Email: info@bloomingfast.com
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.footer')
@endsection

