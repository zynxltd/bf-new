@extends('layouts.app')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', $article->title . ' - Blooming Fast Blog')

@push('meta')
<!-- SEO Meta Tags -->
<meta name="description" content="{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 160) }}">
<meta name="keywords" content="gardening, plant food, fertiliser, {{ $article->category ?? '' }}, Blooming Fast, {{ Str::limit(strip_tags($article->title), 50) }}">
<meta name="author" content="Blooming Fast">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<meta name="googlebot" content="index, follow">
<meta name="bingbot" content="index, follow">
<link rel="canonical" href="{{ url()->current() }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="article">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ $article->title }}">
<meta property="og:description" content="{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 200) }}">
@if($article->image)
<meta property="og:image" content="{{ url($article->image) }}">
<meta property="og:image:secure_url" content="{{ url($article->image) }}">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
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
<meta name="twitter:image" content="{{ url($article->image) }}">
<meta name="twitter:image:alt" content="{{ $article->title }}">
@endif

<!-- Article Schema.org JSON-LD -->
<script type="application/ld+json">
@php
// Use custom JSON schema if provided, otherwise generate default
if (!empty($article->json_schema)) {
    // Validate and output custom schema
    $customSchema = json_decode($article->json_schema, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        echo json_encode($customSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    } else {
        // If invalid JSON, fall back to default
        $schema = [
          "@context" => "https://schema.org",
          "@type" => "Article",
          "headline" => $article->title,
          "description" => $article->excerpt ?? Str::limit(strip_tags($article->content), 200),
          "image" => $article->image ? asset($article->image) : asset('images/superiorV4.png'),
          "datePublished" => $article->published_date->toIso8601String(),
          "dateModified" => $article->updated_at->toIso8601String(),
          "author" => [
            "@type" => "Organization",
            "name" => "Blooming Fast",
            "url" => url('/')
          ],
          "publisher" => [
            "@type" => "Organization",
            "name" => "Blooming Fast",
            "logo" => [
              "@type" => "ImageObject",
              "url" => asset('images/logo.png')
            ]
          ],
          "mainEntityOfPage" => [
            "@type" => "WebPage",
            "@id" => url()->current()
          ],
          "wordCount" => str_word_count(strip_tags($article->content)),
          "timeRequired" => "PT" . $readingTime . "M"
        ];
        if ($article->category) {
          $schema["articleSection"] = $article->category;
        }
        echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }
} else {
    // Default schema
    $schema = [
      "@context" => "https://schema.org",
      "@type" => "Article",
      "headline" => $article->title,
      "description" => $article->excerpt ?? Str::limit(strip_tags($article->content), 200),
      "image" => $article->image ? asset($article->image) : asset('images/superiorV4.png'),
      "datePublished" => $article->published_date->toIso8601String(),
      "dateModified" => $article->updated_at->toIso8601String(),
      "author" => [
        "@type" => "Organization",
        "name" => "Blooming Fast",
        "url" => url('/')
      ],
      "publisher" => [
        "@type" => "Organization",
        "name" => "Blooming Fast",
        "logo" => [
          "@type" => "ImageObject",
          "url" => asset('images/logo.png')
        ]
      ],
      "mainEntityOfPage" => [
        "@type" => "WebPage",
        "@id" => url()->current()
      ],
      "wordCount" => str_word_count(strip_tags($article->content)),
      "timeRequired" => "PT" . $readingTime . "M"
    ];
    if ($article->category) {
      $schema["articleSection"] = $article->category;
    }
    echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}
@endphp
</script>

<!-- Breadcrumb Schema -->
<script type="application/ld+json">
@php
$breadcrumbSchema = [
  "@context" => "https://schema.org",
  "@type" => "BreadcrumbList",
  "itemListElement" => [
    [
      "@type" => "ListItem",
      "position" => 1,
      "name" => "Home",
      "item" => url('/')
    ],
    [
      "@type" => "ListItem",
      "position" => 2,
      "name" => "Blog",
      "item" => route('blog.index')
    ],
    [
      "@type" => "ListItem",
      "position" => 3,
      "name" => $article->title,
      "item" => url()->current()
    ]
  ]
];
@endphp
{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
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

<!-- Desktop Slide-Out Menu Overlay -->
<div class="desktop-slide-menu-overlay" id="desktopMenuOverlay"></div>

<!-- Desktop Slide-Out Menu -->
<div class="desktop-slide-menu" id="desktopSlideMenu">
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

<!-- Start .blog-post-section -->
<div class="blog-post-section section white-bg pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Blog Post Header -->
                <header class="blog-post-header mb-40">
                    <!-- Breadcrumb Navigation -->
                    <nav aria-label="breadcrumb" class="mb-20">
                        <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList" style="margin-bottom: 0; background: transparent; padding: 0;">
                            <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <a href="{{ route('home') }}" itemprop="item"><span itemprop="name">Home</span></a>
                                <meta itemprop="position" content="1" />
                            </li>
                            <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <a href="{{ route('blog.index') }}" itemprop="item"><span itemprop="name">Blog</span></a>
                                <meta itemprop="position" content="2" />
                            </li>
                            @if($article->category)
                            <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <a href="{{ route('blog.index', ['category' => $article->category_slug]) }}" itemprop="item"><span itemprop="name">{{ $article->category }}</span></a>
                                <meta itemprop="position" content="3" />
                            </li>
                            @endif
                            <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" aria-current="page">
                                <span itemprop="name">{{ $article->title }}</span>
                                <meta itemprop="position" content="{{ $article->category ? '4' : '3' }}" />
                            </li>
                        </ol>
                    </nav>
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
                        @php
                            $imagePath = $article->image;
                            $imageUrl = asset($imagePath);
                            // Generate high DPI version path (assuming @2x naming convention)
                            $imagePath2x = str_replace(['.jpg', '.png', '.jpeg'], ['@2x.jpg', '@2x.png', '@2x.jpeg'], $imagePath);
                            $imageUrl2x = file_exists(public_path($imagePath2x)) ? asset($imagePath2x) : $imageUrl;
                        @endphp
                        <img 
                            src="{{ $imageUrl }}" 
                            srcset="{{ $imageUrl }} 1x, {{ $imageUrl2x }} 2x"
                            alt="{{ $article->title }}" 
                            class="img-responsive" 
                            loading="eager"
                            decoding="async"
                            width="1200"
                            height="675"
                        />
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
                                @if($article->template)
                                    @include('blog.articles.' . str_replace('.blade.php', '', $article->template))
                                @else
                                    {!! $article->content !!}
                                @endif
                            </div>
                        </article>
                    </div>
                </div>

                <!-- Share Buttons -->
                <div class="blog-share-section mt-60 pt-40 border-top-light">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-20">Share this article</h4>
                            <ul class="social-links">
                                <li><a href="https://www.facebook.com/YouGardenUK" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCLMujNspgKbXY3oAQ4qUvYg" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="https://www.instagram.com/yougardenuk/" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://uk.pinterest.com/yougardenltd/" target="_blank" rel="noopener noreferrer" aria-label="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('blog.index') }}" class="button button-secondary">
                                <i class="fa fa-arrow-left"></i> Back to Blog
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Related Articles -->
                @if($relatedArticles->count() > 0)
                <div class="related-articles-section mt-60 pt-60 border-top-light">
                    <h3 class="mb-40 text-center">Related Articles</h3>
                    <div class="row">
                        @foreach($relatedArticles as $related)
                        <div class="col-md-4 mb-30">
                            <article class="related-article-card">
                                @if($related->image)
                                <div class="related-article-image">
                                    <a href="{{ route('blog.show', ['category_slug' => $related->category_slug, 'slug' => $related->slug]) }}">
                                        <img src="{{ asset($related->image) }}" alt="{{ $related->title }}" class="img-responsive" loading="lazy" decoding="async" />
                                    </a>
                                </div>
                                @endif
                                <div class="related-article-content p-20">
                                    @if($related->category)
                                    <span class="related-article-category">{{ $related->category }}</span>
                                    @endif
                                    <h4 class="related-article-title">
                                        <a href="{{ route('blog.show', ['category_slug' => $related->category_slug, 'slug' => $related->slug]) }}">{{ $related->title }}</a>
                                    </h4>
                                    <div class="related-article-meta">
                                        <span><i class="fa fa-calendar"></i> {{ $related->published_date->format('M j, Y') }}</span>
                                        <span><i class="fa fa-clock-o"></i> {{ $related->reading_time }} min read</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
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

