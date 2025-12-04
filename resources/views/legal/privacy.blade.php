@extends('layouts.app')

@section('title', 'Privacy Policy - Blooming Fast')

@push('meta')
<meta name="description" content="Privacy Policy for Blooming Fast. Learn how we collect, use, and protect your personal information.">
<meta name="robots" content="index, follow">
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
                <h1 class="mb-40">Privacy Policy</h1>
                <p class="lead mb-40">Last updated: {{ date('F j, Y') }}</p>

                <div class="legal-content">
                    <h2>1. Introduction</h2>
                    <p>Blooming Fast ("we", "our", or "us") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website.</p>

                    <h2>2. Information We Collect</h2>
                    <p>We may collect information about you in a variety of ways. The information we may collect on the site includes:</p>
                    <ul>
                        <li><strong>Personal Data:</strong> Personally identifiable information, such as your name, email address, and telephone number, that you voluntarily give to us when you contact us or use certain features of the site.</li>
                        <li><strong>Derivative Data:</strong> Information our servers automatically collect when you access the site, such as your IP address, browser type, operating system, access times, and the pages you have viewed.</li>
                        <li><strong>Cookies:</strong> Data files that are placed on your device or computer and often include an anonymous unique identifier. For more information about cookies, please see our Cookie Policy.</li>
                    </ul>

                    <h2>3. How We Use Your Information</h2>
                    <p>We may use information collected about you via the site to:</p>
                    <ul>
                        <li>Respond to your inquiries and provide customer support</li>
                        <li>Send you marketing and promotional communications</li>
                        <li>Improve our website and user experience</li>
                        <li>Monitor and analyze usage and trends</li>
                        <li>Prevent fraudulent transactions and monitor against theft</li>
                    </ul>

                    <h2>4. Disclosure of Your Information</h2>
                    <p>We may share information we have collected about you in certain situations:</p>
                    <ul>
                        <li><strong>By Law or to Protect Rights:</strong> If we believe the release of information about you is necessary to respond to legal process, to investigate or remedy potential violations of our policies, or to protect the rights, property, and safety of others.</li>
                        <li><strong>Third-Party Service Providers:</strong> We may share your information with third parties that perform services for us or on our behalf, including payment processing, data analysis, email delivery, hosting services, and customer service.</li>
                    </ul>

                    <h2>5. Security of Your Information</h2>
                    <p>We use administrative, technical, and physical security measures to help protect your personal information. While we have taken reasonable steps to secure the personal information you provide to us, please be aware that despite our efforts, no security measures are perfect or impenetrable.</p>

                    <h2>6. Your Rights</h2>
                    <p>Depending on your location, you may have the following rights regarding your personal information:</p>
                    <ul>
                        <li>The right to access – You have the right to request copies of your personal data</li>
                        <li>The right to rectification – You have the right to request that we correct any information you believe is inaccurate</li>
                        <li>The right to erasure – You have the right to request that we erase your personal data</li>
                        <li>The right to restrict processing – You have the right to request that we restrict the processing of your personal data</li>
                        <li>The right to object to processing – You have the right to object to our processing of your personal data</li>
                    </ul>

                    <h2>7. Contact Us</h2>
                    <p>If you have questions or comments about this Privacy Policy, please contact us at:</p>
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

