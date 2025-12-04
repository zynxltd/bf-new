@extends('layouts.app')

@section('title', 'Terms of Service - Blooming Fast')

@push('meta')
<meta name="description" content="Terms of Service for Blooming Fast. Read our terms and conditions for using our website and services.">
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
                <h1 class="mb-40">Terms of Service</h1>
                <p class="lead mb-40">Last updated: {{ date('F j, Y') }}</p>

                <div class="legal-content">
                    <h2>1. Agreement to Terms</h2>
                    <p>By accessing or using the Blooming Fast website, you agree to be bound by these Terms of Service and all applicable laws and regulations. If you do not agree with any of these terms, you are prohibited from using or accessing this site.</p>

                    <h2>2. Use License</h2>
                    <p>Permission is granted to temporarily download one copy of the materials on Blooming Fast's website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
                    <ul>
                        <li>Modify or copy the materials</li>
                        <li>Use the materials for any commercial purpose or for any public display</li>
                        <li>Attempt to reverse engineer any software contained on the website</li>
                        <li>Remove any copyright or other proprietary notations from the materials</li>
                    </ul>

                    <h2>3. Product Information</h2>
                    <p>We strive to provide accurate product descriptions and information. However, we do not warrant that product descriptions or other content on this site is accurate, complete, reliable, current, or error-free. If a product offered by us is not as described, your sole remedy is to return it in unused condition.</p>

                    <h2>4. Third-Party Links</h2>
                    <p>Our website may contain links to third-party websites or services that are not owned or controlled by Blooming Fast. We have no control over, and assume no responsibility for, the content, privacy policies, or practices of any third-party websites or services.</p>

                    <h2>5. Disclaimer</h2>
                    <p>The materials on Blooming Fast's website are provided on an 'as is' basis. Blooming Fast makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</p>

                    <h2>6. Limitations</h2>
                    <p>In no event shall Blooming Fast or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on Blooming Fast's website.</p>

                    <h2>7. Revisions</h2>
                    <p>Blooming Fast may revise these terms of service for its website at any time without notice. By using this website you are agreeing to be bound by the then current version of these terms of service.</p>

                    <h2>8. Contact Information</h2>
                    <p>If you have any questions about these Terms of Service, please contact us at:</p>
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

