@extends('layouts.app')

@php
use Illuminate\Support\Str;
@endphp

@section('title', 'Blog - Blooming Fast Plant Foods')

@push('meta')
<!-- SEO Meta Tags -->
<meta name="description" content="Expert gardening tips, plant care guides, and insights to help you grow a thriving garden with Blooming Fast plant foods and fertilizers.">
<meta name="keywords" content="gardening blog, plant care tips, fertiliser guides, gardening advice, Blooming Fast">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ url()->current() }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="Blog - Blooming Fast Plant Foods">
<meta property="og:description" content="Expert gardening tips, plant care guides, and insights to help you grow a thriving garden with Blooming Fast plant foods and fertilizers.">
<meta property="og:site_name" content="Blooming Fast">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="Blog - Blooming Fast Plant Foods">
<meta name="twitter:description" content="Expert gardening tips, plant care guides, and insights to help you grow a thriving garden with Blooming Fast plant foods and fertilizers.">

<!-- Blog Schema.org JSON-LD -->
<script type="application/ld+json">
@php
$blogSchema = [
  "@context" => "https://schema.org",
  "@type" => "Blog",
  "name" => "Blooming Fast Blog",
  "description" => "Expert gardening tips, plant care guides, and insights to help you grow a thriving garden",
  "url" => route('blog.index'),
  "publisher" => [
    "@type" => "Organization",
    "name" => "Blooming Fast",
    "logo" => [
      "@type" => "ImageObject",
      "url" => asset('images/logo.png')
    ]
  ]
];
@endphp
{!! json_encode($blogSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
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
                <!-- Desktop Hamburger Menu Button -->
                <button type="button" class="desktop-menu-toggle" id="desktopMenuToggle" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
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

<!-- Desktop Slide-Out Menu -->
<div class="desktop-slide-menu" id="desktopSlideMenu">
    <div class="desktop-slide-menu-overlay" id="desktopMenuOverlay"></div>
    <div class="desktop-slide-menu-content">
        <button class="desktop-slide-menu-close" id="desktopMenuClose" aria-label="Close menu">
            <span></span>
            <span></span>
        </button>
        <ul class="desktop-slide-menu-nav">
            <li><a href="{{ route('home') }}#home" class="nav-item">Home</a></li>
            <li><a href="{{ route('home') }}#about" class="nav-item">About</a></li>
            <li><a href="{{ route('home') }}#features" class="nav-item">Features</a></li>
            <li><a href="{{ route('home') }}#products" class="nav-item">Products</a></li>
            <li><a href="{{ route('home') }}#videos" class="nav-item">Videos</a></li>
            <li><a href="{{ route('home') }}#faq" class="nav-item">FAQ</a></li>
            <li><a href="{{ route('blog.index') }}" class="nav-item">Blog</a></li>
            <li class="desktop-menu-divider"><span></span></li>
            <li class="desktop-menu-store-links">
                <a href="https://www.yougarden.com?source=bloomingfast.com" class="nav-item store-link" target="_blank" rel="noopener">
                    <img src="{{ asset('images/yglogosmall.png') }}" alt="YouGarden" />
                </a>
                <a href="https://www.amazon.co.uk/stores/page/5D2120F1-F052-4812-AAF7-6FE644404EC7/search?lp_asin=B0D44VQZ1S&ref_=ast_bln&store_ref=bl_ast_dp_brandLogo_sto&terms=blooming%20fast" class="nav-item store-link" target="_blank" rel="noopener">
                    <img src="{{ asset('images/amazoncolour.png') }}" alt="Amazon" />
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Start .blog-section -->
<div class="blog-section section white-bg pt-120 pb-120">
    <div class="container">
        <div class="section-head text-center mb-60">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="heading">Blooming Fast <span>Blog</span></h1>
                    <p class="lead">Expert gardening tips, plant care guides, and insights to help you grow a thriving garden</p>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse($articles as $article)
            <div class="col-md-6 mb-40">
                <article class="blog-card white-bg" itemscope itemtype="https://schema.org/BlogPosting">
                    <div class="blog-image">
                        <a href="{{ route('blog.show', $article->slug) }}">
                            <img src="{{ $article->image ? asset($article->image) : asset('images/superiorV4.png') }}" alt="{{ $article->title }}" class="img-responsive" />
                        </a>
                        @if($article->category)
                        <div class="blog-category">{{ $article->category }}</div>
                        @endif
                    </div>
                    <div class="blog-content p-30">
                        @if($article->published_date)
                        <meta itemprop="datePublished" content="{{ $article->published_date->toIso8601String() }}">
                        @endif
                        @if($article->updated_at)
                        <meta itemprop="dateModified" content="{{ $article->updated_at->toIso8601String() }}">
                        @endif
                        @if($article->image)
                        <meta itemprop="image" content="{{ asset($article->image) }}">
                        @endif
                        <div class="blog-meta mb-15">
                            @if($article->published_date)
                            <span class="blog-date"><i class="fa fa-calendar"></i> <time itemprop="datePublished" datetime="{{ $article->published_date->toIso8601String() }}">{{ $article->published_date->format('F jS, Y') }}</time></span>
                            @endif
                            <span class="blog-reading-time"><i class="fa fa-clock-o"></i> {{ $article->reading_time }} min read</span>
                        </div>
                        <h2 class="blog-title mb-15" itemprop="headline">
                            <a href="{{ route('blog.show', $article->slug) }}" itemprop="url">{{ $article->title }}</a>
                        </h2>
                        <p class="blog-excerpt mb-20" itemprop="description">{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 150) }}</p>
                        <a href="{{ route('blog.show', $article->slug) }}" class="button button-primary" itemprop="url">Read More</a>
                    </div>
                </article>
            </div>
            @empty
            <div class="col-md-12">
                <p class="text-center">No blog posts available yet. Check back soon!</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- End .blog-section -->

<!-- Footer -->
@include('partials.footer')
@endsection

