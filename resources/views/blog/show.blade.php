@extends('layouts.app')

@php
    use Illuminate\Support\Str;
    $slug = request()->route('slug');
    $article = \App\Models\Blog::where('slug', $slug)
        ->where('is_published', true)
        ->first();
    
    if (!$article) {
        abort(404);
    }
    
    $readingTime = $article->reading_time ?? max(1, ceil(str_word_count(strip_tags($article->content)) / 200));
    
    // Generate table of contents from headings and add IDs to headings
    $content = $article->content;
    preg_match_all('/<h([2-3])[^>]*>(.*?)<\/h[2-3]>/i', $content, $headings, PREG_SET_ORDER);
    $toc = [];
    
    foreach ($headings as $index => $match) {
        $level = $match[1];
        $headingText = strip_tags($match[2]);
        $id = 'heading-' . ($index + 1);
        $toc[] = [
            'id' => $id,
            'text' => $headingText,
            'level' => $level
        ];
        
        // Add ID to heading in content if not already present
        $fullMatch = $match[0];
        if (strpos($fullMatch, 'id=') === false) {
            $replacement = str_replace('<h' . $level, '<h' . $level . ' id="' . $id . '"', $fullMatch);
            $content = str_replace($fullMatch, $replacement, $content);
        }
    }
    
    $article->content = $content;
@endphp

@section('title', $article->title . ' - Blooming Fast Blog')

@push('meta')
<!-- SEO Meta Tags -->
<meta name="description" content="{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 160) }}">
<meta name="keywords" content="gardening, plant food, fertiliser, {{ $article->category ?? '' }}, Blooming Fast">
<meta name="author" content="Blooming Fast">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ url()->current() }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="article">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ $article->title }}">
<meta property="og:description" content="{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 200) }}">
@if($article->image)
<meta property="og:image" content="{{ asset($article->image) }}">
@endif
<meta property="og:site_name" content="Blooming Fast">
<meta property="article:published_time" content="{{ $article->published_date->toIso8601String() }}">
<meta property="article:modified_time" content="{{ $article->updated_at->toIso8601String() }}">
@if($article->category)
<meta property="article:section" content="{{ $article->category }}">
@endif

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $article->title }}">
<meta name="twitter:description" content="{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 200) }}">
@if($article->image)
<meta name="twitter:image" content="{{ asset($article->image) }}">
@endif

<!-- Article Schema.org JSON-LD -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "{{ addslashes($article->title) }}",
  "description": "{{ addslashes($article->excerpt ?? Str::limit(strip_tags($article->content), 200)) }}",
  "image": "{{ $article->image ? asset($article->image) : asset('images/superiorV4.png') }}",
  "datePublished": "{{ $article->published_date->toIso8601String() }}",
  "dateModified": "{{ $article->updated_at->toIso8601String() }}",
  "author": {
    "@type": "Organization",
    "name": "Blooming Fast",
    "url": "{{ url('/') }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Blooming Fast",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ asset('images/logo.png') }}"
    }
  },
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{ url()->current() }}"
  },
  @if($article->category)
  "articleSection": "{{ $article->category }}",
  @endif
  "wordCount": {{ str_word_count(strip_tags($article->content)) }},
  "timeRequired": "PT{{ $readingTime }}M"
}
</script>

<!-- Breadcrumb Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "{{ url('/') }}"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Blog",
      "item": "{{ route('blog.index') }}"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "{{ addslashes($article->title) }}",
      "item": "{{ url()->current() }}"
    }
  ]
}
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

<!-- Start .blog-post-section -->
<div class="blog-post-section section white-bg pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Blog Post Header -->
                <header class="blog-post-header mb-40">
                    <div class="blog-meta mb-20">
                        @if($article->category)
                        <span class="blog-category-badge">{{ $article->category }}</span>
                        @endif
                        <span class="blog-date"><i class="fa fa-calendar"></i> {{ $article->published_date->format('F jS, Y') }}</span>
                        <span class="blog-reading-time"><i class="fa fa-clock-o"></i> {{ $readingTime }} min read</span>
                    </div>
                    <h1 class="blog-post-title">{{ $article->title }}</h1>
                    @if($article->image)
                    <div class="blog-featured-image mt-30 mb-30">
                        <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="img-responsive" />
                    </div>
                    @endif
                </header>

                <!-- Reading Progress Bar -->
                <div class="reading-progress-container">
                    <div class="reading-progress-bar" id="readingProgress"></div>
                </div>

                <div class="row">
                    <!-- Sidebar with Table of Contents -->
                    @if(count($toc) > 0)
                    <div class="col-md-3">
                        <aside class="blog-sidebar">
                            <div class="toc-widget">
                                <h3 class="toc-title">Table of Contents</h3>
                                <nav class="toc-nav">
                                    <ul>
                                        @foreach($toc as $item)
                                        <li class="toc-level-{{ $item['level'] }}">
                                            <a href="#{{ $item['id'] }}">{{ $item['text'] }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>

                            <div class="blog-cta-widget mt-30">
                                <h4>Shop Our Products</h4>
                                <p>Discover our range of premium plant foods and fertilizers</p>
                                <a href="{{ route('home') }}#products" class="button button-primary">View Products</a>
                            </div>
                        </aside>
                    </div>
                    @endif

                    <!-- Main Content -->
                    <div class="{{ count($toc) > 0 ? 'col-md-9' : 'col-md-10 col-md-offset-1' }}">
                        <article class="blog-post-content" itemscope itemtype="https://schema.org/Article">
                            <meta itemprop="headline" content="{{ htmlspecialchars($article->title) }}">
                            <meta itemprop="datePublished" content="{{ $article->published_date->toIso8601String() }}">
                            <meta itemprop="dateModified" content="{{ $article->updated_at->toIso8601String() }}">
                            @if($article->image)
                            <meta itemprop="image" content="{{ asset($article->image) }}">
                            @endif
                            <div itemprop="articleBody">
                                {!! $article->content !!}
                            </div>
                        </article>
                    </div>
                </div>

                <!-- Back to Blog -->
                <div class="text-center mt-60">
                    <a href="{{ route('blog.index') }}" class="button button-secondary">
                        <i class="fa fa-arrow-left"></i> Back to Blog
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End .blog-post-section -->

<!-- Footer -->
@include('partials.footer')

@push('scripts')
<script>
$(document).ready(function() {
    // Reading progress indicator
    var $progressBar = $('#readingProgress');
    var $article = $('.blog-post-content');
    
    if ($progressBar.length && $article.length) {
        var articleTop = $article.offset().top;
        var articleHeight = $article.outerHeight();
        var windowHeight = $(window).height();
        var documentHeight = $(document).height();
        
        $(window).on('scroll', function() {
            var scrollTop = $(window).scrollTop();
            var scrollPercent = 0;
            
            if (scrollTop >= articleTop) {
                var scrolled = scrollTop - articleTop;
                scrollPercent = Math.min((scrolled / articleHeight) * 100, 100);
            }
            
            $progressBar.css('width', scrollPercent + '%');
        });
    }
    
    // Smooth scroll for TOC links
    $('.toc-nav a').on('click', function(e) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top - 100
            }, 600);
        }
    });
});
</script>
@endpush
@endsection

