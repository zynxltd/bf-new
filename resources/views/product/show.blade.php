@extends('layouts.app')

@php
use Illuminate\Support\Str;

// Define specific solid colors for each product page
$isUltimateRose = str_contains(request()->path(), 'ultimate-rose-bloom-booster');
$isSwellGellFeed = str_contains(request()->path(), 'swell-gell-feed');
$isSuperiorSoluble = str_contains(request()->path(), 'superior-soluble-fertiliser');
$isClematisFeed = str_contains(request()->path(), 'clematis-feed');
$isCitrusFeed = str_contains(request()->path(), 'citrus-feed');
$isFishBloodBone = str_contains(request()->path(), 'fish-blood-bone');
$isAcerFeed = str_contains(request()->path(), 'acer-feed');

// Set product-specific solid color
$productColor = '#70D969'; // Default
if ($isUltimateRose) {
    $productColor = '#537550';
} elseif ($isSwellGellFeed) {
    $productColor = '#337ab7';
} elseif ($isSuperiorSoluble) {
    $productColor = '#2d5016';
} elseif ($isClematisFeed) {
    $productColor = '#7d4f9a';
} elseif ($isCitrusFeed) {
    $productColor = '#f49e00';
} elseif ($isFishBloodBone) {
    $productColor = '#d9534f'; // Red/blood orange color
} elseif ($isAcerFeed) {
    $productColor = '#4a7c59'; // Green color matching acer/maple leaves
} else {
    // Fallback to package color if available
    $packageColor = $product->package_color ?? '#70D969';
    if (!empty($packageColor) && $packageColor[0] !== '#') {
        $packageColor = '#' . $packageColor;
    }
    $productColor = $packageColor;
}

// Get product image path for color extraction
if ($isUltimateRose) {
    $heroImagePath = 'images/bloom-booster-hero-no-bg.png';
} elseif ($isClematisFeed) {
    $heroImagePath = 'images/clematis-feed-p1-n-bg-front.png';
} elseif ($isSwellGellFeed) {
    $heroImagePath = 'images/swel-gel-heor-no-bg.png';
} elseif ($isCitrusFeed) {
    $heroImagePath = 'images/cirtus-feed-hero-image-no-bg.png';
} elseif ($isFishBloodBone) {
    $heroImagePath = 'images/fish-blood-bone-hero-no-bg.png';
} elseif ($isAcerFeed) {
    $heroImagePath = 'images/acer-feed-hero-no-bg.png';
} elseif ($isSuperiorSoluble) {
    $heroImagePath = 'images/superior-hero-no-bg.png';
} else {
    $heroImagePath = $product->image ?? 'images/superiorV4.png';
}
$productImagePath = $product->image ? asset($product->image) : asset('images/superiorV4.png');

// Clean product title - remove "1.5Kg tub" and similar weight/size suffixes
$displayTitle = $product->title;
if ($isFishBloodBone) {
    // Remove "1.5Kg tub" or similar patterns from title
    $displayTitle = preg_replace('/\s*1\.?5\s*[Kk][Gg]\s*[Tt]ub\s*/i', '', $displayTitle);
    $displayTitle = trim($displayTitle);
}

// Customize available sizes per product
$availableSizes = [
    ['label' => '1.25kg', 'scroll' => 'products'],
    ['label' => '500g', 'scroll' => 'products'],
    ['label' => '50g Trial', 'scroll' => 'products']
];
$sizeLabel = 'Available in 3 sizes:';

if ($isUltimateRose) {
    $availableSizes = [
        ['label' => '750g', 'scroll' => 'products']
    ];
    $sizeLabel = 'Available in 1 size:';
} elseif ($isSwellGellFeed) {
    $availableSizes = [
        ['label' => '250g', 'scroll' => 'products']
    ];
    $sizeLabel = 'Available in 1 size:';
} elseif ($isClematisFeed) {
    $availableSizes = [
        ['label' => '900g', 'scroll' => 'products']
    ];
    $sizeLabel = 'Available in 1 size:';
} elseif ($isAcerFeed) {
    $availableSizes = [
        ['label' => '900g', 'scroll' => 'products']
    ];
    $sizeLabel = 'Available in 1 size:';
} elseif ($isCitrusFeed) {
    $availableSizes = [
        ['label' => '150g', 'scroll' => 'products']
    ];
    $sizeLabel = 'Available in 1 size:';
} elseif ($isSuperiorSoluble) {
    $availableSizes = [
        ['label' => '500g', 'scroll' => 'products'],
        ['label' => '50g Trial', 'scroll' => 'products']
    ];
    $sizeLabel = 'Available in 2 sizes:';
} elseif ($isFishBloodBone) {
    $availableSizes = [
        ['label' => '1.5kg tub', 'scroll' => 'products']
    ];
    $sizeLabel = 'Available in 1 size:';
}
@endphp

@section('title', $product->title . ' - Blooming Fast')

@push('meta')
<!-- SEO Meta Tags -->
<meta name="description" content="{{ $product->description ?? 'Premium plant food and fertiliser from Blooming Fast' }}">
<meta name="keywords" content="{{ $product->title }}, plant food, fertiliser, garden supplements, Blooming Fast">
<link rel="canonical" href="{{ url()->current() }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="product">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ $product->title }} - Blooming Fast">
<meta property="og:description" content="{{ $product->description ?? '' }}">
<meta property="og:image" content="{{ $product->image ? asset($product->image) : webp_image('images/superiorV4.png') }}">

<!-- Product Schema.org JSON-LD -->
<script type="application/ld+json">
@php
$productSchema = [
  "@context" => "https://schema.org",
  "@type" => "Product",
  "name" => $product->title,
  "description" => $product->description ?? '',
  "image" => $product->image ? asset($product->image) : webp_image('images/superiorV4.png'),
  "brand" => [
    "@type" => "Brand",
    "name" => "Blooming Fast"
  ],
  "offers" => [
    "@type" => "Offer",
    "availability" => "https://schema.org/InStock",
    "url" => $product->yg_link ?? url()->current()
  ]
];
@endphp
{!! json_encode($productSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>

<style>
:root {
    --product-color: {{ $productColor }};
    --divider-bg-color: {{ $productColor }};
    --divider-gradient: none;
    --product-hero-bg: {{ $productColor }};
}

/* Product pages use solid colors, not gradients */
.product-page-hero.gradiant-background,
.features-section.gradiant-background,
.products-section.gradiant-background,
.video-overlay.gradiant-background {
    background: {{ $productColor }} !important;
    background-color: {{ $productColor }} !important;
    background-image: none !important;
}

.product-page-hero .gradiant-background::before,
.product-page-hero .gradiant-background::after,
.features-section .gradiant-background::before,
.features-section .gradiant-background::after,
.products-section .gradiant-background::before,
.products-section .gradiant-background::after {
    background: {{ $productColor }} !important;
    background-image: none !important;
}

/* Hide gradient overlay on product pages - it shows green/blue gradients */
.product-page-hero .gradiant-overlay {
    display: none !important;
    background: none !important;
    background-image: none !important;
}

/* Remove hero background animations on product pages */
.product-page-hero #hero-spotlight-animation.hero-spotlight-bg,
.product-page-hero .hero-spotlight-bg {
    display: none !important;
    visibility: hidden !important;
    animation: none !important;
    -webkit-animation: none !important;
}

.product-page-hero .gradiant-background {
    animation: none !important;
    -webkit-animation: none !important;
}

/* Section titles on white backgrounds - use product color */
.product-page-hero ~ .section:not(.gradiant-background) .section-head h2 span,
.product-page-hero ~ .section:not(.gradiant-background) .section-head .heading span {
    color: {{ $productColor }} !important;
    background: none !important;
    -webkit-background-clip: unset !important;
    background-clip: unset !important;
    -webkit-text-fill-color: {{ $productColor }} !important;
}

/* Animated lines below headings on white backgrounds - use product color */
.product-page-hero ~ .section:not(.gradiant-background) .section-head h2::before,
.product-page-hero ~ .section:not(.gradiant-background) .section-head .heading::before {
    background: linear-gradient(90deg, {{ $productColor }}, {{ $productColor }}) !important;
}

/* Badges and other elements - use product color */
/* Hero badge should match homepage styling (glass morphism) */
.product-page-hero .hero-badge {
    background: rgba(255, 255, 255, 0.15) !important;
    background-color: rgba(255, 255, 255, 0.15) !important;
    backdrop-filter: blur(10px) !important;
    -webkit-backdrop-filter: blur(10px) !important;
    border: 1px solid rgba(255, 255, 255, 0.3) !important;
}

/* Size badges - use same styling as buttons (glass morphism) */
/* Removed product-specific color overrides to match button styling */

/* Ensure hero title has no white background on load */
.product-page-hero .hero-title-gradient {
    background-color: transparent !important;
}

.product-page-hero .hero-title-gradient::before {
    display: none !important;
    content: none !important;
}

/* Force product page dividers to use product color immediately */
.product-page-hero ~ .section-divider-wave,
.product-page-hero ~ .section-divider-wave-bottom,
.product-page-hero ~ .section-divider-wave-product-bottom {
    background: {{ $productColor }} !important;
    background-color: {{ $productColor }} !important;
    background-image: none !important;
}

.product-page-hero ~ .section-divider-wave::after,
.product-page-hero ~ .section-divider-wave-bottom::after,
.product-page-hero ~ .section-divider-wave-product-bottom::after,
.products-section + .section-divider-wave-product-bottom::after,
.section-divider-wave-product-bottom::after,
#divider-products-bottom::after {
    background: {{ $productColor }} !important;
    background-color: {{ $productColor }} !important;
    background-image: none !important;
}

#divider-products-bottom {
    background: {{ $productColor }} !important;
    background-color: {{ $productColor }} !important;
    background-image: none !important;
}

@if($isSuperiorSoluble || $isSwellGellFeed || $isUltimateRose || $isAcerFeed || $isClematisFeed)
/* Make hero image bigger for superior-soluble-fertiliser, swell-gell-feed, ultimate-rose-bloom-booster, acer-feed, and clematis-feed pages */
.product-page-hero .hero-image-column img,
.product-page-hero .hero-image-column picture img {
    width: 120% !important;
    max-width: 120% !important;
    height: auto !important;
    transform: scale(1.2) !important;
    transform-origin: center center !important;
}

.product-page-hero .hero-image-column {
    overflow: visible !important;
}

.product-page-hero .hero-image-mobile-placeholder img,
.product-page-hero .hero-image-mobile-placeholder picture img {
    width: 100% !important;
    max-width: 100% !important;
    height: auto !important;
}

@endif

/* Accordion styling for About section - applies to all product pages */
#about-accordion .panel-heading a {
    border-bottom: none !important;
}

#about-accordion .panel-heading a:hover {
    background: rgba(0,0,0,0.02);
}

#about-accordion .panel-heading a.collapsed .fa-chevron-down {
    transform: rotate(-90deg);
}

#about-accordion .panel-heading a:not(.collapsed) .fa-chevron-down {
    transform: rotate(0deg);
}

/* Mobile optimization for product page about section */
@media (max-width: 767px) {
    .product-page-hero ~ .about-section .section-head h2 {
        font-size: 32px !important;
        margin-bottom: 20px !important;
    }
    
    .product-page-hero ~ .about-section .section-head {
        margin-bottom: 30px !important;
    }
    
    .product-page-hero ~ .about-section .section-head > .row > div {
        padding-left: 15px;
        padding-right: 15px;
    }
    
    .product-page-hero ~ .about-section .section-head p {
        font-size: 16px !important;
        line-height: 1.6 !important;
        padding: 0 10px;
    }
    
    .product-page-hero ~ .about-section #about-accordion .panel-heading a {
        padding: 15px 20px !important;
        font-size: 18px !important;
    }
    
    .product-page-hero ~ .about-section #about-accordion .panel-body {
        padding: 20px 20px 20px 50px !important;
        font-size: 15px !important;
        line-height: 1.7 !important;
    }
    
    .product-page-hero ~ .about-section .about-section-video {
        margin-bottom: 30px !important;
    }
    
    .product-page-hero ~ .about-section #view-all-products-button {
        padding: 14px 30px !important;
        font-size: 15px !important;
        width: 90%;
        max-width: 300px;
    }
    
    /* General product page mobile optimizations */
    .product-page-hero .header-texts {
        text-align: center;
    }
    
    .product-page-hero .hero-title-gradient {
        font-size: 34px !important;
    }
    
    .product-page-hero .hero-description {
        font-size: 18px !important;
    }
    
    .product-page-hero .size-badges {
        justify-content: center;
    }
    
    .product-page-hero .buttons {
        justify-content: center;
    }
}

/* Back to top button - use product theme color on product pages */
body:has(.product-page-hero) .back-to-top {
    background: {{ $productColor }} !important;
    background-color: {{ $productColor }} !important;
    background-image: none !important;
}

body:has(.product-page-hero) .back-to-top:hover {
    background: {{ $productColor }} !important;
    background-color: {{ $productColor }} !important;
    background-image: none !important;
    opacity: 0.9;
}

/* Ensure footer top divider is visible on all pages */
#footer-top-divider {
    display: block !important;
    visibility: visible !important;
    opacity: 1 !important;
    height: 120px !important;
    background: linear-gradient(180deg, #ffffff 0%, #404040 100%) !important;
    background-color: #ffffff !important;
    background-image: linear-gradient(180deg, #ffffff 0%, #404040 100%) !important;
    position: relative !important;
    z-index: 1 !important;
    filter: none !important;
    -webkit-filter: none !important;
}

#footer-top-divider svg {
    display: block !important;
    visibility: visible !important;
    filter: none !important;
    -webkit-filter: none !important;
}

#footer-top-divider::after {
    display: none !important;
    content: none !important;
    -webkit-mask-image: none !important;
    mask-image: none !important;
}
</style>
@endpush


@section('content')
<!-- Reading Progress Bar -->
<div class="reading-progress-container">
    <div class="reading-progress-bar" id="readingProgress"></div>
</div>

<!-- Start .header-section - Product Page Hero -->
<div id="home" class="header-section half-header section gradiant-background header-curbed confetti-section product-page-hero">
    
    <!-- Gradient Overlay -->
    <div class="gradiant-background gradiant-overlay"></div>
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
                    <a class="navbar-brand confetti-burst-trigger" href="{{ route('home') }}">
                        {!! webp_picture('images/logo.png', 'logo', ['class' => 'logo logo-light']) !!}
                        {!! webp_picture('images/logo.png', 'logo', ['class' => 'logo logo-color']) !!}
                    </a>
                    <button type="button" class="desktop-menu-toggle" id="desktopMenuToggle" aria-label="Toggle menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="site-collapse-nav">
                    <button type="button" class="mobile-menu-close-btn" id="mobileMenuCloseBtn" aria-label="Close menu" style="display: none;">
                        <span aria-hidden="true">✕</span>
                    </button>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('home') }}" class="nav-item">Home</a></li>
                        <li><a href="{{ route('home') }}#about" class="nav-item">About</a></li>
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
                <li><a href="{{ route('home') }}" class="nav-item">Home</a></li>
                <li><a href="{{ route('home') }}#about" class="nav-item">About</a></li>
                <li><a href="{{ route('home') }}#products" class="nav-item">Products</a></li>
                <li><a href="{{ route('home') }}#videos" class="nav-item">Videos</a></li>
                <li><a href="{{ route('home') }}#faq" class="nav-item">FAQ</a></li>
                <li><a href="{{ route('blog.index') }}" class="nav-item">Blog</a></li>
            </ul>
        </div>
    </div>
    
    <div class="header-content">
        <div class="container">
            <div class="row row-vm">
                <div class="col-md-7 col-sm-12 hero-text-column">
                    <div class="header-texts tab-center mobile-center hero-content-mobile">
                        <div class="hero-badge wow fadeInUp" data-wow-duration=".5s">
                            <span><i class="fa fa-star hero-star-icon"></i> Premium Quality</span>
                        </div>
                        <h2 class="hero-title-gradient wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="animation-timing-function: ease-out; font-size: 56px; background-color: transparent !important;">{{ $displayTitle }}</h2>
                        <p class="lead hero-description wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">{{ $product->description ?? 'Premium plant food for bigger, better blooms and healthier plants.' }}</p>
                        <!-- Hero Image - appears here on mobile -->
                        <div class="hero-image-mobile-placeholder">
                            <div class="wow fadeInUp confetti-burst-trigger" data-wow-duration="1s" data-wow-delay=".6s">
                                {!! webp_picture($heroImagePath, $product->title, ['loading' => 'lazy', 'width' => '800', 'height' => '1062', 'style' => 'max-width: 100%; height: auto;']) !!}
                            </div>
                        </div>
                        <div class="hero-sizes wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                            <span class="size-label">{{ $sizeLabel }}</span>
                            <div class="size-badges">
                                @foreach($availableSizes as $size)
                                <span class="size-badge" data-scroll-to="{{ $size['scroll'] }}">{{ $size['label'] }}</span>
                                @endforeach
                            </div>
                        </div>
                        <p class="heading-light hero-cta wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".4s" style="font-size: 18px; font-weight: 500;">Click below to buy it from one of our stockists</p>
                        <ul class="buttons">
                            @if($product->yg_link)
                            <li><a href="{{ $product->yg_link }}{{ strpos($product->yg_link, '?') !== false ? '&' : '?' }}source=bloomingfast.com" class="button wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s" target="_blank" rel="noopener" aria-label="Buy {{ $product->title }} from YouGarden"><img src="{{ asset('images/yglogosmall.png') }}" alt="YouGarden" loading="lazy" /></a></li>
                            @endif
                            @if($product->amazon_link)
                            <li><a href="{{ $product->amazon_link }}" class="button wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s" target="_blank" rel="noopener" aria-label="Buy {{ $product->title }} from Amazon"><img src="{{ asset('images/amazoncolour.png') }}" alt="Amazon" loading="lazy" /></a></li>
                            @endif
                        </ul>
                        <!-- Feefo Rating Badge -->
                        <div class="hero-feefo-badge wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".6s">
                            <a href="#customer-reviews" class="hero-feefo-link" aria-label="View customer reviews">
                                <div id="feefo-badge-hero" class="feefo-badge-widget">
                                    <div class="feefo-fallback-badge" style="display: block;">
                                        <div class="feefo-fallback-content">
                                            <div class="feefo-stars">
                                                <span class="feefo-star">★</span>
                                                <span class="feefo-star">★</span>
                                                <span class="feefo-star">★</span>
                                                <span class="feefo-star">★</span>
                                                <span class="feefo-star">★</span>
                                            </div>
                                            <div class="feefo-rating-text">4.8</div>
                                            <span class="feefo-reviews-text">View our Reviews</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="hero-feefo-logo-below">
                                <img src="{{ asset('images/Feefo_White_and_yellow_logo.svg') }}" alt="Feefo" class="feefo-logo-below-img" loading="lazy" />
                            </div>
                        </div>
                    </div>
                </div><!-- .col -->
                <div class="col-md-5 col-sm-12 hero-image-column" style="z-index: 999;">
                    <div class="wow fadeInUp confetti-burst-trigger" data-wow-duration="1s" data-wow-delay=".6s" >
                        {!! webp_picture($heroImagePath, $product->title, ['style' => 'z-index: 999;', 'loading' => 'eager', 'fetchpriority' => 'high', 'width' => '800', 'height' => '1062']) !!}
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .header-content -->
    
    <!-- Hero Bottom Divider -->
    <div class="hero-bottom-divider">
        <img src="{{ asset('images/carb.png') }}" alt="" role="presentation" aria-hidden="true">
    </div>
</div><!-- .header-section -->

<!-- Start .about-section - Product Specific Content -->
<div id="about" class="about-section section pt-120 pb-120 white-bg half-header-about about-section-bottom-curved about-section-top-curved">
    <div class="container tab-fix">
        <!-- Enhanced Header Section -->
        <div class="section-head text-center" style="margin-bottom: 50px;">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2 class="heading" style="margin-bottom: 30px; font-size: 42px; font-weight: 700; color: #2c3e50;">About <span style="color: {{ $productColor }};">{{ $displayTitle }}</span></h2>
                    @php
                        $fullDescription = $product->full_description ?? $product->description ?? 'Premium plant food for bigger, better blooms and healthier plants.';
                        // Remove "Directions for Use" and related content since it's in the accordion (for all product pages)
                        if(!empty($fullDescription)) {
                            // Remove "Directions for Use" section and everything after it
                            $text = $fullDescription;
                            // Find and remove "Directions for Use" and everything after
                            $directionsPattern = '/\s*Directions for Use.*$/is';
                            $text = preg_replace($directionsPattern, '', $text);
                            // Also remove common safety/disclaimer text that's in the accordion
                            $text = preg_replace('/\s*Keep away from pets and children.*$/is', '', $text);
                            $text = preg_replace('/\s*Please note:.*$/is', '', $text);
                            
                            // Remove specific rose fertiliser instructions and NPK details
                            // Remove March/April application instructions
                            $text = preg_replace('/\s*In March and April[^.]*\.\s*For dosage[^.]*\.\s*/is', '', $text);
                            // Remove planting new roses instructions
                            $text = preg_replace('/\s*Planting new roses[^.]*\.\s*For top dressing[^.]*\.\s*/is', '', $text);
                            // Remove soil preparation instructions
                            $text = preg_replace('/\s*Work the soil[^.]*\.\s*Apply 30g[^.]*\.\s*/is', '', $text);
                            // Remove after fertilising instructions and NPK line
                            $text = preg_replace('/\s*After fertilising[^.]*\.\s*NPK[^.]*\.\s*/is', '', $text);
                            // Remove NPK breakdown details (more flexible pattern)
                            $text = preg_replace('/\s*Nitrogen\s*\(N\)[^.]*\.\s*Phosphorus Pentoxide[^.]*\.\s*Of which soluble[^.]*\.\s*Potassium Oxide[^.]*\.\s*Magnesium Oxide[^.]*\.\s*Sulphur[^.]*\.\s*Iron[^.]*\.\s*Manganese[^.]*\.\s*Copper[^.]*\.\s*Molybdenum[^.]*\.\s*Zinc[^.]*\.\s*Boron[^.]*\.\s*Also contains[^.]*\.\s*/is', '', $text);
                            // Alternative: Remove everything from "In March and April" to "Humic Acid" in one go
                            $text = preg_replace('/\s*In March and April.*?Humic Acid\.\s*/is', '', $text);
                            
                            // Remove swell-gell-feed specific instructions
                            if ($isSwellGellFeed) {
                                // Remove "For best results, mix in at planting out..." paragraph
                                $text = preg_replace('/\s*For best results[^.]*season\.\s*/is', '', $text);
                                // Remove "Making Up Pots and Containers" section (including Ready Plants)
                                $text = preg_replace('/\s*Making Up Pots and Containers.*?Ready Plants Pots and Containers.*?measures as directed below\.\s*/is', '', $text);
                                // Remove "Growbags Work into the soil around each plant."
                                $text = preg_replace('/\s*Growbags\s+Work into the soil around each plant\.\s*/is', '', $text);
                                // Remove "After Planting Water well..." section
                                $text = preg_replace('/\s*After Planting\s+Water well[^.]*when watered\.\s*/is', '', $text);
                                // Remove detailed measurement instructions (Pots, containers, baskets...)
                                $text = preg_replace('/\s*Pots, containers, baskets[^.]*per\s+30cm\s+in\s+length\s+Growbags\s+\d+-\d+g\s+measure\s+per\s+plant\.\s*/is', '', $text);
                                // More comprehensive pattern to catch all the text in one go
                                $text = preg_replace('/\s*For best results[^.]*season\.\s*Making Up Pots and Containers[^.]*Growbags\s+\d+-\d+g\s+measure\s+per\s+plant\.\s*/is', '', $text);
                                // Catch any remaining variations
                                $text = preg_replace('/\s*Making Up Pots.*?Never exceed.*?Growbags.*?per\s+plant\.\s*/is', '', $text);
                            }
                            
                            // Remove ultimate-rose-bloom-booster specific text
                            if ($isUltimateRose) {
                                // Remove "There's no risk, no guesswork, just proven results, or your money back."
                                $text = preg_replace('/\s*There\'s no risk[^.]*\.\s*/is', '', $text);
                                // Remove "Supplied as a 750g pack of fertiliser, for 25 feeds, based on 30g per plant."
                                $text = preg_replace('/\s*Supplied as a 750g pack[^.]*\.\s*/is', '', $text);
                                // Remove "To use: Shake the pack while closed to remix the product ingredients, as some settlement may have taken place while in storage or transport."
                                $text = preg_replace('/\s*To use: Shake the pack[^.]*\.\s*/is', '', $text);
                                // Remove "8-4-9.2 with trace elements."
                                $text = preg_replace('/\s*8-4-9\.2\s+with\s+trace\s+elements\.\s*/is', '', $text);
                                // Remove NPK breakdown from "Nitrogen (N) 8.8%" to "Humic Acid."
                                $text = preg_replace('/\s*Nitrogen\s*\(N\)\s*8\.8%[^.]*Humic\s+Acid\.\s*/is', '', $text);
                                // More flexible pattern to catch the entire NPK breakdown
                                $text = preg_replace('/\s*Nitrogen\s*\(N\)\s*8\.8%[^.]*\.\s*Phosphorus\s+Pentoxide[^.]*\.\s*Of\s+which\s+soluble[^.]*\.\s*Potassium\s+Oxide[^.]*\.\s*Magnesium\s+Oxide[^.]*\.\s*Sulphur[^.]*\.\s*Iron[^.]*\.\s*Manganese[^.]*\.\s*Copper[^.]*\.\s*Molybdenum[^.]*\.\s*Zinc[^.]*\.\s*Boron[^.]*\.\s*Also\s+contains[^.]*\.\s*/is', '', $text);
                            }
                            
                            $text = trim($text);
                            $fullDescription = $text;
                        }
                        // Split into paragraphs - look for sentence endings and create natural breaks (for all product pages)
                        $paragraphs = [];
                        if(!empty($fullDescription)) {
                            // Split into logical paragraphs for all products
                            $text = $fullDescription;
                            // Split by double periods, exclamation marks followed by space, or question marks
                            $sentences = preg_split('/(?<=[.!?])\s+(?=[A-Z])/', $text, -1, PREG_SPLIT_NO_EMPTY);
                            $currentPara = '';
                            foreach($sentences as $sentence) {
                                $currentPara .= $sentence . ' ';
                                // Create paragraph breaks at logical points
                                if(strlen($currentPara) > 200 || 
                                   preg_match('/\.\s*$/', $sentence) && strlen($currentPara) > 150) {
                                    $paragraphs[] = trim($currentPara);
                                    $currentPara = '';
                                }
                            }
                            if(!empty($currentPara)) {
                                $paragraphs[] = trim($currentPara);
                            }
                            // If no paragraphs created, split by periods
                            if(empty($paragraphs)) {
                                $paragraphs = array_filter(array_map('trim', explode('. ', $text)));
                            }
                            // If still no paragraphs, use the full description as one paragraph
                            if(empty($paragraphs)) {
                                $paragraphs = [$fullDescription];
                            }
                        } else {
                            $paragraphs = [$fullDescription];
                        }
                    @endphp
                    <div style="text-align: left; max-width: 900px; margin: 0 auto;">
                        @foreach($paragraphs as $para)
                            <p style="font-size: 18px; color: #555; margin-bottom: 20px; line-height: 1.8;">{{ $para }}{{ !preg_match('/[.!?]$/', $para) ? '.' : '' }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!-- .section-head -->
        
        <!-- Smaller Product Video -->
        @if($product->video)
        <div class="row" style="margin-bottom: 40px;">
            <div class="col-md-6 col-md-offset-3">
                <div class="video about-section-video wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s" style="border-radius: 10px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.08); position: relative;">
                    {!! $product->image ? webp_picture($product->image, $product->title . ' video thumbnail', ['width' => '500', 'height' => '281', 'loading' => 'lazy', 'style' => 'width: 100%; height: auto; display: block;']) : webp_picture('images/video.png', $product->title . ' video thumbnail', ['width' => '500', 'height' => '281', 'loading' => 'lazy', 'style' => 'width: 100%; height: auto; display: block;']) !!}
                    <div class="video-overlay gradiant-background"></div>
                    <a href="{{ $product->video }}" class="video-play" data-effect="mfp-3d-unfold" aria-label="Play {{ $product->title }} video" style="background: rgba(255, 255, 255, 0.95); width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0,0,0,0.15); position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"><i class="fa fa-play" aria-hidden="true" style="color: {{ $productColor }}; font-size: 18px; margin-left: 2px;"></i><span class="sr-only">Play video</span></a>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
        @endif
        
        <!-- Horizontal Accordion for Key Features and How to Use -->
        <div class="row" style="margin-bottom: 50px;">
            <div class="col-md-12">
                <div class="panel-group accordion" id="about-accordion" role="tablist" aria-multiselectable="true" style="max-width: 900px; margin: 0 auto;">
                    @if($product->features)
                    <div class="panel panel-default" style="border: 1px solid #e0e0e0; border-radius: 12px; margin-bottom: 20px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                        <div class="panel-heading" role="tab" id="about-features-heading" style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%); padding: 0; border: none;">
                            <h4 class="panel-title" style="margin: 0;">
                                <a role="button" data-toggle="collapse" data-parent="#about-accordion" href="#about-features-collapse" aria-expanded="true" aria-controls="about-features-collapse" style="display: flex; align-items: center; padding: 20px 25px; color: #2c3e50; text-decoration: none; font-size: 20px; font-weight: 600; transition: all 0.3s ease;">
                                    <i class="fa fa-star" style="color: {{ $productColor }}; font-size: 24px; margin-right: 15px; width: 30px; text-align: center;"></i>
                                    <span style="flex: 1;">Key Features</span>
                                    <i class="fa fa-chevron-down" style="color: {{ $productColor }}; transition: transform 0.3s ease;"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="about-features-collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="about-features-heading">
                            <div class="panel-body" style="padding: 25px 25px 25px 70px; background: #ffffff; color: #555; line-height: 1.9; font-size: 16px;">
                                {!! nl2br(e($product->features)) !!}
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    @if($product->application)
                    <div class="panel panel-default" style="border: 1px solid #e0e0e0; border-radius: 12px; margin-bottom: 20px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                        <div class="panel-heading" role="tab" id="about-application-heading" style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%); padding: 0; border: none;">
                            <h4 class="panel-title" style="margin: 0;">
                                <a role="button" data-toggle="collapse" data-parent="#about-accordion" href="#about-application-collapse" aria-expanded="false" aria-controls="about-application-collapse" class="collapsed" style="display: flex; align-items: center; padding: 20px 25px; color: #2c3e50; text-decoration: none; font-size: 20px; font-weight: 600; transition: all 0.3s ease;">
                                    <i class="fa fa-leaf" style="color: {{ $productColor }}; font-size: 24px; margin-right: 15px; width: 30px; text-align: center;"></i>
                                    <span style="flex: 1;">How to Use</span>
                                    <i class="fa fa-chevron-down" style="color: {{ $productColor }}; transition: transform 0.3s ease;"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="about-application-collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="about-application-heading">
                            <div class="panel-body" style="padding: 25px 25px 25px 70px; background: #ffffff; color: #555; line-height: 1.9; font-size: 16px;">
                                {!! nl2br(e($product->application)) !!}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div><!-- .row -->
        
        <!-- Cleaner Call to Action Button -->
        <div class="row">
            <div class="col-md-12">
                <div class="text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s" style="margin-top: 40px;">
                    <a href="#products" class="button button-primary" id="view-all-products-button" style="padding: 16px 40px; font-size: 16px; font-weight: 600; border-radius: 10px; transition: all 0.3s ease; background: {{ $productColor }}; border: 2px solid {{ $productColor }}; color: #ffffff; box-shadow: 0 4px 15px {{ $productColor }}40; text-decoration: none; display: inline-flex; align-items: center; gap: 10px;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px {{ $productColor }}60';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px {{ $productColor }}40';" aria-label="View all products">
                        <i class="fa fa-th-large" style="font-size: 14px;"></i> View All Products
                    </a>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
        
    </div><!-- .container -->
    </div><!-- .about-section  -->

<!-- Curved divider between white and gradient sections -->
<div class="section-divider-wave section-divider-mobile-hide" style="height: 200px; width: 100%; overflow: visible; background: {{ $productColor }} !important; background-color: {{ $productColor }} !important; background-image: none !important; margin-top: 0px; position: relative; z-index: 1; padding-top: 0px;">
    <img src="/images/carb.png" alt="" role="presentation" aria-hidden="true" class="carb-image-mobile-hide" style="width: 100%; height: 100%; object-fit: fill; object-position: top center; display: block; transform: scaleY(-1);">
</div>

<!-- Start .features-section  -->
<div id="features" class="features-section section pt-120 pb-120 gradiant-background header-curbed confetti-section">
    <div class="container tab-fix">
        <div class="section-head heading-light text-center">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="heading heading-light">What's in our Superior Plant Food</h2>
                    <p class="lead">We've formulated this superior feed to give you the best results for the least effort.</p>
                    <p>By balancing the key ingredients of nitrogen, phosphorous, potassium and magnesium and combining them with essential trace elements, we've created the ideal formulation to promote superior plant growth.</p>
                </div>
            </div>
        </div><!-- .section-head -->
        <div class="features-content pt-60">
            <div class="row">
                <div class="col-md-12">
                    <div class="features-layout-wrapper">
                        <!-- Left column cards -->
                        <div class="features-cards-column features-cards-left">
                            <div class="feature-nutrient-card">
                                <i class="fa fa-check-circle"></i>
                                <div class="feature-nutrient-content">
                            <h4>Nitrogen</h4>
                                    <p>(the N in NPK), essential for making proteins and therefore cell growth</p>
                        </div>
                            </div>
                            
                            <div class="feature-nutrient-card">
                                <i class="fa fa-check-circle"></i>
                                <div class="feature-nutrient-content">
                                    <h4>Potassium oxide</h4>
                            <p>(the K in NPK) for respiration and photosynthesis</p>
                        </div>
                            </div>
                            
                            <div class="feature-nutrient-card">
                                <i class="fa fa-check-circle"></i>
                                <div class="feature-nutrient-content">
                            <h4>Boron</h4>
                            <p>for healthy cell growth</p>
                        </div>
                            </div>
                            
                            <div class="feature-nutrient-card">
                                <i class="fa fa-check-circle"></i>
                                <div class="feature-nutrient-content">
                            <h4>Iron</h4>
                            <p>for chlorophyll production</p>
                        </div>
                    </div>
                        </div>
                        
                        <!-- Center product image -->
                        <div class="features-product-center">
                            <div class="features-product-image">
                                @if($isUltimateRose)
                                    {!! webp_picture('images/bloom-booster-back-no-bg.png', $product->title, ['loading' => 'lazy', 'decoding' => 'async']) !!}
                                @elseif($isSwellGellFeed)
                                    {!! webp_picture('images/swelgel-product-back-no-bg.png', $product->title, ['loading' => 'lazy', 'decoding' => 'async']) !!}
                                @elseif($isClematisFeed)
                                    {!! webp_picture('images/clematis-feed-p2-no-bg-back.png', $product->title, ['loading' => 'lazy', 'decoding' => 'async']) !!}
                                @elseif($isAcerFeed)
                                    {!! webp_picture('images/acer-feed-back-no-bg.png', $product->title, ['loading' => 'lazy', 'decoding' => 'async']) !!}
                                @elseif($isCitrusFeed)
                                    {!! webp_picture('images/cirtus-feed-back-no-bg.png', $product->title, ['loading' => 'lazy', 'decoding' => 'async']) !!}
                                @elseif($isSuperiorSoluble)
                                    {!! webp_picture('images/superior-back-no-bg.png', $product->title, ['loading' => 'lazy', 'decoding' => 'async']) !!}
                                @elseif($isFishBloodBone)
                                    {!! webp_picture('images/fish-blood-bone-hero-no-bg.png', $product->title, ['loading' => 'lazy', 'decoding' => 'async']) !!}
                                @else
                                    {!! $product->image_2 ? webp_picture($product->image_2, $product->title, ['loading' => 'lazy', 'decoding' => 'async']) : ($product->image ? webp_picture($product->image, $product->title, ['loading' => 'lazy', 'decoding' => 'async']) : webp_picture('images/superiorback.png', $product->title, ['loading' => 'lazy', 'decoding' => 'async'])) !!}
                                @endif
                            </div>
                        </div>
                        
                        <!-- Right column cards -->
                        <div class="features-cards-column features-cards-right">
                            <div class="feature-nutrient-card">
                                <i class="fa fa-check-circle"></i>
                                <div class="feature-nutrient-content">
                            <h4>Phosphorous pentoxide</h4>
                            <p>(the P in NPK) for respiration and growth</p>
                        </div>
                            </div>
                            
                            <div class="feature-nutrient-card">
                                <i class="fa fa-check-circle"></i>
                                <div class="feature-nutrient-content">
                                    <h4>Magnesium oxide</h4>
                            <p>for photosynthesis (how plants get their energy)</p>
                        </div>
                            </div>
                            
                            <div class="feature-nutrient-card">
                                <i class="fa fa-check-circle"></i>
                                <div class="feature-nutrient-content">
                            <h4>Copper</h4>
                                    <p>for metabolic and respiratory processes</p>
                        </div>
                            </div>
                            
                            <div class="feature-nutrient-card">
                                <i class="fa fa-check-circle"></i>
                                <div class="feature-nutrient-content">
                            <h4>Manganese</h4>
                            <p>for photosynthesis</p>
                        </div>
                    </div>
                        </div>
                    </div>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .features-content -->
    </div><!-- .container -->
</div><!-- .features-section  -->

<!-- Curved divider at bottom of features section -->
<div class="section-divider-wave section-divider-wave-bottom" style="height: 450px; width: 100%; overflow: hidden; background: {{ $productColor }} !important; background-color: {{ $productColor }} !important; background-image: none !important;">
    <img src="/images/carb.png" alt="" role="presentation" aria-hidden="true" style="width: 100%;height: 100%;object-fit: cover;object-position: bottom center;display: block; transform: scaleY(-1);">
</div>

<!-- Start .customer-reviews-section  -->
<div id="customer-reviews" class="customer-reviews-section customer-reviews-curved-top customer-reviews-curved-bottom section white-bg pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="customer-reviews-content">
                    <h2 class="mb-50 text-center">What Our Customers Say</h2>
                    
                    <!-- Feefo Rating Badge (Mobile Only - Same as Hero) -->
                    <div class="customer-reviews-feefo-badge-mobile" style="display: none;">
                        <div class="feefo-badge-widget" style="display: flex; justify-content: center; margin-bottom: 30px;">
                            <div class="feefo-fallback-badge" style="display: block;">
                                <div class="feefo-fallback-content">
                                    <div class="feefo-stars">
                                        <span class="feefo-star">★</span>
                                        <span class="feefo-star">★</span>
                                        <span class="feefo-star">★</span>
                                        <span class="feefo-star">★</span>
                                        <span class="feefo-star">★</span>
                                    </div>
                                    <div class="feefo-rating-text">4.8</div>
                                    <span class="feefo-reviews-text">View our Reviews</span>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: center; margin-bottom: 30px;">
                            <img src="{{ asset('images/Feefo_White_and_yellow_logo.svg') }}" alt="Feefo" style="max-width: 120px; height: auto; filter: brightness(0) invert(0.3);" loading="lazy" />
                        </div>
                    </div>
                    
                    <!-- Feefo Service Review Carousel Widget (Desktop - YouGarden Format) -->
                    <div id="feefo-service-review-carousel-widgetId" class="feefo-review-carousel-widget-service feefo-desktop-widget" data-merchant-identifier="you-garden"></div>
                    
                    <!-- Feefo Product Review Widget (Mobile Only) -->
                    @if($product->sku)
                    <div class="feefo-mobile-widget">
                        <div id="feefo-product-review-widgetId" class="feefo-review-widget-product" data-product-sku="{{ $product->sku }}" data-feefo-initialized="true" style="flex: 1 1 auto;"></div>
                    </div>
                    @else
                    <div class="feefo-mobile-widget">
                        <div id="feefo-product-review-widgetId" class="feefo-review-widget-product" data-product-sku="630050" data-feefo-initialized="true" style="flex: 1 1 auto;"></div>
                    </div>
                    @endif
                </div>
            </div>
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .customer-reviews-section  -->

<!-- Curved divider between white and gradient sections -->
<div class="section-divider-wave section-divider-mobile-hide" style="height: 200px; width: 100%; overflow: visible; background: {{ $productColor }} !important; background-color: {{ $productColor }} !important; background-image: none !important; margin-top: 0px; position: relative; z-index: 1; padding-top: 0px;">
    <img src="/images/carb.png" alt="" role="presentation" aria-hidden="true" class="carb-image-mobile-hide" style="width: 100%; height: 100%; object-fit: fill; object-position: top center; display: block; transform: scaleY(-1);">
</div>

<!-- Start .products-section  -->
<div id="products" class="products-section section gradiant-background pt-120 pb-120 products-section-bottom-curved">
    <div class="container">
        <div class="section-head heading-light text-center">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="heading heading-light">Our Complete Product Range</h2>
                    <p class="lead">Discover our full range of premium plant foods and fertilisers, each specially formulated for specific plant needs.</p>
                </div>
            </div>
        </div><!-- .section-head -->
        
        <div class="products-content pt-60">
            <div class="row">
                @forelse($products ?? [] as $index => $prod)
                <div class="col-md-4 col-sm-6 mb-40">
                    <div class="product-card white-bg text-center wow fadeInUp" 
                         data-wow-duration=".5s" 
                         data-wow-delay="{{ ($index * 0.1) }}s">
                        <a href="{{ route('product.show', $prod->slug ?? $prod->sku ?? $prod->id) }}" class="product-card-link" aria-label="View {{ $prod->title }}">
                            <div class="product-image mb-20" style="position: relative;">
                                @if($index < 2)
                                <span class="best-seller-badge">Best Seller</span>
                                @endif
                                {!! $prod->image ? webp_picture($prod->image, $prod->title, ['class' => 'img-responsive', 'loading' => 'lazy', 'decoding' => 'async']) : webp_picture('images/superiorV4.png', $prod->title, ['class' => 'img-responsive', 'loading' => 'lazy', 'decoding' => 'async']) !!}
                            </div>
                            <div class="product-details p-30">
                                <h4 class="product-title mb-15">{{ $prod->title }}</h4>
                                <p class="product-description mb-20">{{ $prod->description ?? '' }}</p>
                                @if($prod->badge_1 || $prod->badge_2)
                                <div class="product-specs mb-20">
                                    @if($prod->badge_1)
                                        <span class="badge">{{ strtoupper(trim($prod->badge_1)) }}</span>
                                    @endif
                                    @if($prod->badge_2)
                                        <span class="badge">{{ strtoupper(trim($prod->badge_2)) }}</span>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </a>
                        <ul class="product-buttons">
                            @if($prod->yg_link)
                            <li><a href="{{ $prod->yg_link }}{{ strpos($prod->yg_link, '?') !== false ? '&' : '?' }}source=bloomingfast.com" class="product-button btn-buy-yg" target="_blank" rel="noopener" aria-label="Buy {{ $prod->title }} from YouGarden">
                                {!! webp_picture('images/yglogosmall.png', 'YouGarden', ['loading' => 'lazy']) !!}
                            </a></li>
                            @endif
                            @if($prod->amazon_link)
                            <li><a href="{{ $prod->amazon_link }}" class="product-button btn-buy-amazon" target="_blank" rel="noopener" aria-label="Buy {{ $prod->title }} from Amazon">
                                {!! webp_picture('images/amazoncolour.png', 'Amazon', ['loading' => 'lazy']) !!}
                            </a></li>
                            @endif
                        </ul>
                        @if($prod->sku)
                        <!-- Feefo Review Badge (Desktop Only) -->
                        <div class="product-review-badge-desktop">
                            <div class="feefo-review-badge-wrapper-product" data-product-sku="{{ $prod->sku }}"></div>
                        </div>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <div class="text-center" style="padding: 60px 20px; color: rgba(255, 255, 255, 0.9);">
                        <i class="fa fa-leaf" style="font-size: 64px; margin-bottom: 20px; display: block; opacity: 0.7;"></i>
                        <h2 style="color: rgba(255, 255, 255, 0.95); margin-bottom: 15px;">No products available yet</h2>
                        <p style="font-size: 18px; margin-bottom: 30px;">Check back soon for our range of premium plant foods!</p>
                    </div>
                </div>
                @endforelse
            </div><!-- .row -->
        </div><!-- .products-content -->
    </div><!-- .container -->
</div><!-- .products-section  -->

<div class="section-divider-wave section-divider-wave-product-bottom" id="divider-products-bottom" style="height: 150px; width: 100%; overflow: hidden; background: {{ $productColor }} !important; background-color: {{ $productColor }} !important; background-image: none !important;">
    <img src="/images/carb.png" alt="" role="presentation" aria-hidden="true" class="carb-image-mobile-hide" style="width: 100%;height: 100%;object-fit: cover;object-position: bottom center;display: block; transform: scaleX(-1);">
</div>

<!-- Start .videos-section  -->
<div id="videos" class="videos-section section white-bg pt-120 pb-120 videos-curved-top videos-section-bottom-curved">
    <div class="container">
        <div class="section-head text-center">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="heading">Product <span>Videos</span></h2>
                    <p class="lead">Watch our product videos to learn more about how to use our plant foods and fertilisers for the best results in your garden.</p>
                </div>
            </div>
        </div><!-- .section-head -->
        
        <div class="videos-content pt-60">
            <div class="row">
                <!-- Product Video (if available) -->
                @if($product->video)
                <div class="col-md-4 col-sm-6 mb-40">
                    <div class="video-card white-bg text-center wow fadeInUp" data-wow-duration=".5s">
                        <div class="video-thumbnail">
                            {!! $product->image ? webp_picture($product->image, $product->title, ['class' => 'img-responsive']) : webp_picture('images/superiorV4.png', $product->title, ['class' => 'img-responsive']) !!}
                            <div class="video-overlay gradiant-background"></div>
                            <a href="{{ $product->video }}" class="video-play" data-effect="mfp-3d-unfold" aria-label="Play {{ $product->title }} video"><i class="fa fa-play" aria-hidden="true"></i><span class="sr-only">Play video</span></a>
                        </div>
                        <div class="video-details p-30">
                            <h4 class="video-title mb-15">{{ $product->title }}</h4>
                            <p class="video-description">Learn how to use {{ $product->title }} for incredible results in your garden.</p>
                        </div>
                    </div>
                </div>
                @endif
                
                <!-- Video 1: Superior Soluble Fertiliser -->
                <div class="col-md-4 col-sm-6 mb-40">
                    <div class="video-card white-bg text-center wow fadeInUp" data-wow-duration=".5s">
                        <div class="video-thumbnail">
                            {!! webp_picture('images/superiorV4.png', 'Superior Soluble Fertiliser', ['class' => 'img-responsive']) !!}
                            <div class="video-overlay gradiant-background"></div>
                            <a href="https://vimeo.com/170471588" class="video-play" data-effect="mfp-3d-unfold" aria-label="Play Superior Soluble Fertiliser video"><i class="fa fa-play" aria-hidden="true"></i><span class="sr-only">Play video</span></a>
                        </div>
                        <div class="video-details p-30">
                            <h4 class="video-title mb-15">Superior Soluble Fertiliser</h4>
                            <p class="video-description">Learn how to use our best-ever formulation for incredible results in your garden.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Video 2: Ultimate Rose Bloom Booster -->
                <div class="col-md-4 col-sm-6 mb-40">
                    <div class="video-card white-bg text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".1s">
                        <div class="video-thumbnail">
                            {!! webp_picture('images/bloom-booster-p1.jpg', 'Ultimate Rose Bloom Booster', ['class' => 'img-responsive', 'width' => '400', 'height' => '400', 'loading' => 'lazy']) !!}
                            <div class="video-overlay gradiant-background"></div>
                            <a href="https://vimeo.com/1100825820" class="video-play" data-effect="mfp-3d-unfold" aria-label="Play Ultimate Rose Bloom Booster video"><i class="fa fa-play" aria-hidden="true"></i><span class="sr-only">Play video</span></a>
                        </div>
                        <div class="video-details p-30">
                            <h4 class="video-title mb-15">Ultimate Rose Bloom Booster</h4>
                            <p class="video-description">Discover how to get bigger, better blooms from your roses with this complete fertiliser.</p>
                        </div>
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .videos-content -->
    </div><!-- .container -->
</div><!-- .videos-section  -->


<div class="section-divider-wave" id="divider-faq-top" style="height: 120px; width: 100%; overflow: hidden; background: #f8f9fa; display: block !important; visibility: visible !important;">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="display: block; width: 100%; height: 100%;">
        <defs>
            <linearGradient id="gradient-divider-faq" x1="0%" y1="0%" x2="100%" y2="100%" gradientUnits="objectBoundingBox">
                <stop offset="0%" style="stop-color:#f8f9fa;stop-opacity:1" />
                <stop offset="100%" style="stop-color:#f8f9fa;stop-opacity:1" />
            </linearGradient>
        </defs>
        <path d="M0,0 C150,80 350,80 600,40 C850,0 1050,0 1200,40 L1200,120 L0,120 Z" fill="url(#gradient-divider-faq)"></path>
    </svg>
</div>

<!-- Start .faq-section-new  -->
<div id="faq" class="faq-section section pt-120 pb-120">
    <div class="container">
        <div class="section-head text-center mb-60">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="heading">Frequently Asked <span>Questions</span></h2>
                    <p class="lead">Find answers to common questions about {{ $product->title }} and our products</p>
                </div>
            </div>
        </div><!-- .section-head -->
        <div class="faq-alt">
            <div class="row">
                <!-- FAQ Content -->
                <div class="col-md-10 col-md-offset-1">
                    @php
                        // Parse FAQs - can be JSON or pipe-separated format
                        $faqs = [];
                        if (!empty($product->faqs)) {
                            // Try to decode as JSON first
                            $decoded = json_decode($product->faqs, true);
                            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                $faqs = $decoded;
                            } else {
                                // Fallback: parse as pipe-separated format (Question|Answer)
                                $lines = explode("\n", trim($product->faqs));
                                foreach ($lines as $line) {
                                    $parts = explode('|', $line, 2);
                                    if (count($parts) === 2) {
                                        $faqs[] = [
                                            'question' => trim($parts[0]),
                                            'answer' => trim($parts[1])
                                        ];
                                    }
                                }
                            }
                        }
                    @endphp
                    @php
                        // Add default FAQs for Superior Soluble Fertiliser if none exist or add to existing ones
                        $defaultSuperiorSolubleFAQs = [
                            [
                                'question' => 'How often should I use Superior Soluble Fertiliser?',
                                'answer' => 'From March to April, feed your plants once a week while watering. From May to September, feed your plants twice a week while watering.'
                            ],
                            [
                                'question' => 'How do I mix Superior Soluble Fertiliser?',
                                'answer' => 'Dissolve 5g of feed (1 scoop, included in the pack) per gallon (4.5L) of water. Simply add the powder to your watering can, fill with water, and stir until dissolved.'
                            ],
                            [
                                'question' => 'Can I use Superior Soluble Fertiliser on all plants?',
                                'answer' => 'Yes! Superior Soluble Fertiliser can be used on virtually all plants in your garden including baskets, borders, vegetable beds, and fruit trees. However, it should not be used on lawns.'
                            ],
                            [
                                'question' => 'What makes Superior Soluble Fertiliser different?',
                                'answer' => 'Our Superior Soluble Fertiliser is professionally formulated with a balanced blend of nitrogen, phosphate, and potash, plus seven vital micronutrients and humic acid. This complete formulation meets the needs of virtually every plant in your garden.'
                            ],
                            [
                                'question' => 'How long does a 500g pack last?',
                                'answer' => 'A 500g resealable pack makes approximately 100 gallons (500 litres) of concentrated plant food. This is enough for regular feeding throughout the growing season for most gardens.'
                            ],
                            [
                                'question' => 'When is the best time to start feeding?',
                                'answer' => 'Start feeding in spring (March) when plants are actively growing. Continue through the summer months (until September) for best results.'
                            ],
                            [
                                'question' => 'Is Superior Soluble Fertiliser safe for vegetables?',
                                'answer' => 'Yes, Superior Soluble Fertiliser is safe to use on vegetables and will help produce bumper crops. Just follow the mixing instructions and feeding schedule.'
                            ],
                            [
                                'question' => 'How should I store Superior Soluble Fertiliser?',
                                'answer' => 'Keep away from pets and children and store in a cool, dry place. The pack is resealable to keep the contents fresh. Wash hands after use.'
                            ]
                        ];
                        
                        // Default FAQs for Swell Gell & Feed
                        $defaultSwellGellFAQs = [
                            [
                                'question' => 'What is Swell Gell & Feed and how does it work?',
                                'answer' => 'Swell Gell & Feed is a revolutionary water-storing gel that expands when watered, holding up to 400 times its weight in water. It gradually releases both water and nutrients to your plants, reducing the need for frequent watering while providing essential plant food.'
                            ],
                            [
                                'question' => 'How do I use Swell Gell & Feed?',
                                'answer' => 'Mix the gel granules thoroughly with your compost when planting. For pots 15-25cm in diameter, use 20g. For 30-40cm pots, use 30-40g. For 45-60cm pots, use 50-60g. Water well twice, a few hours apart, to fully charge the granules.'
                            ],
                            [
                                'question' => 'How long does Swell Gell & Feed last?',
                                'answer' => 'A 250g resealable pouch treats approximately 12 standard hanging baskets or similar sized pots for one season. The gel continues to work throughout the growing season, reducing watering frequency significantly.'
                            ],
                            [
                                'question' => 'Can I use Swell Gell & Feed in all types of containers?',
                                'answer' => 'Yes! Swell Gell & Feed works in pots, containers, hanging baskets, growbags, window boxes, and houseplants. It\'s perfect for both indoor and outdoor use.'
                            ],
                            [
                                'question' => 'What happens if I use too much Swell Gell & Feed?',
                                'answer' => 'Never exceed the recommended amounts as this can cause compost to over-expand when watered. Always follow the measurement guidelines provided on the pack for best results.'
                            ],
                            [
                                'question' => 'Is Swell Gell & Feed safe for all plants?',
                                'answer' => 'Yes, Swell Gell & Feed is safe for all plants including vegetables, flowers, and houseplants. It provides both water retention and essential nutrients to support healthy growth.'
                            ]
                        ];
                        
                        // Default FAQs for Clematis Feed
                        $defaultClematisFAQs = [
                            [
                                'question' => 'When should I feed my clematis?',
                                'answer' => 'Feed your clematis in early spring when new growth appears, and continue feeding every 4-6 weeks throughout the growing season until late summer. This supports healthy growth and abundant flowering.'
                            ],
                            [
                                'question' => 'How do I apply Clematis Feed?',
                                'answer' => 'Apply the feed around the base of the plant, avoiding direct contact with the stems. Water well after application to help the nutrients reach the roots. Follow the dosage instructions on the pack.'
                            ],
                            [
                                'question' => 'Can I use Clematis Feed on other plants?',
                                'answer' => 'While specifically formulated for clematis, this feed can also benefit other climbing plants and flowering perennials that prefer similar nutrient levels. However, for best results, use it primarily for clematis.'
                            ],
                            [
                                'question' => 'How much Clematis Feed should I use?',
                                'answer' => 'The amount depends on the size and age of your clematis. For established plants, follow the recommended dosage on the pack. For newly planted clematis, use a slightly reduced amount in the first year.'
                            ],
                            [
                                'question' => 'What makes Clematis Feed special?',
                                'answer' => 'Clematis Feed is specially formulated with the right balance of nutrients that clematis need for strong root development, healthy foliage, and prolific flowering. It\'s designed to meet the specific nutritional requirements of these beautiful climbing plants.'
                            ],
                            [
                                'question' => 'Can I use Clematis Feed in containers?',
                                'answer' => 'Yes! Clematis Feed works excellently for clematis grown in containers. Ensure you water regularly and feed according to the instructions, as container-grown plants may need more frequent feeding.'
                            ]
                        ];
                        
                        // Default FAQs for Citrus Feed
                        $defaultCitrusFAQs = [
                            [
                                'question' => 'How often should I feed my citrus plants?',
                                'answer' => 'Feed your citrus plants every 2-4 weeks during the growing season (spring through summer). Reduce feeding in autumn and stop during winter when plants are dormant.'
                            ],
                            [
                                'question' => 'Can I use Citrus Feed on all citrus varieties?',
                                'answer' => 'Yes! Citrus Feed is suitable for all citrus varieties including lemons, oranges, limes, grapefruits, and kumquats. It provides the essential nutrients that all citrus plants need for healthy growth and fruit production.'
                            ],
                            [
                                'question' => 'How do I apply Citrus Feed?',
                                'answer' => 'Apply the feed around the base of the plant, keeping it away from the trunk. Water thoroughly after application. For potted citrus, apply according to the container size and follow the pack instructions.'
                            ],
                            [
                                'question' => 'What nutrients does Citrus Feed provide?',
                                'answer' => 'Citrus Feed contains a balanced blend of nitrogen, phosphorus, and potassium, plus essential micronutrients like iron, magnesium, and zinc that citrus plants need for healthy leaves, strong roots, and abundant fruit production.'
                            ],
                            [
                                'question' => 'Can I use Citrus Feed on indoor citrus trees?',
                                'answer' => 'Yes! Citrus Feed is perfect for indoor citrus trees. Feed regularly during the growing season and ensure your plant receives adequate light and water. The feed will help maintain healthy foliage and encourage fruiting.'
                            ],
                            [
                                'question' => 'When should I start feeding a new citrus plant?',
                                'answer' => 'Wait 4-6 weeks after planting before starting to feed, allowing the plant to establish its root system first. Then begin regular feeding according to the instructions.'
                            ]
                        ];
                        
                        // Default FAQs for Acer Feed
                        $defaultAcerFAQs = [
                            [
                                'question' => 'When is the best time to feed my acer?',
                                'answer' => 'Feed your acer in early spring when new leaves begin to emerge, and again in mid-summer. Avoid feeding in late summer or autumn as this can encourage new growth that won\'t harden before winter.'
                            ],
                            [
                                'question' => 'How do I apply Acer Feed?',
                                'answer' => 'Apply the feed around the base of the tree, spreading it evenly over the root area. Water well after application. For potted acers, follow the container size guidelines on the pack.'
                            ],
                            [
                                'question' => 'Can I use Acer Feed on other trees?',
                                'answer' => 'While specifically formulated for acers (Japanese maples), this feed can also benefit other ornamental trees and shrubs that prefer similar soil conditions and nutrient levels.'
                            ],
                            [
                                'question' => 'What makes Acer Feed different from general plant food?',
                                'answer' => 'Acer Feed is specially balanced for acers, which prefer slightly acidic soil and specific nutrient ratios. It helps maintain the vibrant leaf colours and healthy growth that acers are known for.'
                            ],
                            [
                                'question' => 'How much Acer Feed should I use?',
                                'answer' => 'The amount depends on the size of your acer. For small trees (under 1m), use the minimum recommended amount. For larger trees, increase accordingly. Always follow the instructions on the pack for best results.'
                            ],
                            [
                                'question' => 'Can I use Acer Feed for potted acers?',
                                'answer' => 'Yes! Acer Feed works excellently for potted acers. Ensure your container has good drainage and feed regularly during the growing season. Potted acers may need more frequent feeding than those in the ground.'
                            ]
                        ];
                        
                        // Default FAQs for Ultimate Rose Bloom Booster
                        $defaultUltimateRoseFAQs = [
                            [
                                'question' => 'When should I feed my roses?',
                                'answer' => 'Start feeding in early spring (March) when new growth appears. Continue feeding every 4-6 weeks throughout the growing season until late summer. This supports healthy growth and continuous flowering.'
                            ],
                            [
                                'question' => 'How do I apply Ultimate Rose Bloom Booster?',
                                'answer' => 'For established roses, sprinkle 30g evenly around the base of the plant, about 15cm away from the stem. Work it into the topsoil and water well. For climbing roses, use 60g per plant.'
                            ],
                            [
                                'question' => 'Can I use this when planting new roses?',
                                'answer' => 'Yes! When planting new roses, sprinkle 30g evenly into the prepared planting hole and mix it in at the outside of the hole before placing the rose. This gives new plants a great start.'
                            ],
                            [
                                'question' => 'What makes Ultimate Rose Bloom Booster special?',
                                'answer' => 'This feed is specifically formulated for roses with a balanced NPK ratio (8-4-9.2) plus essential trace elements, mycorrhizal friendly fungi, and humic acid. It promotes strong root development, healthy foliage, and abundant blooms.'
                            ],
                            [
                                'question' => 'How long does a 750g pack last?',
                                'answer' => 'A 750g pack provides approximately 25 feeds based on 30g per plant. This is enough for regular feeding throughout the growing season for most rose gardens.'
                            ],
                            [
                                'question' => 'Can I use this on all types of roses?',
                                'answer' => 'Yes! Ultimate Rose Bloom Booster is suitable for all types of roses including shrub roses, climbing roses, patio roses, and standard roses. It provides the balanced nutrition all roses need.'
                            ]
                        ];
                        
                        // Default FAQs for Fish Blood & Bone
                        $defaultFishBloodBoneFAQs = [
                            [
                                'question' => 'What is Fish Blood & Bone fertiliser?',
                                'answer' => 'Fish Blood & Bone is an organic fertiliser made from fish waste products. It provides a balanced source of nitrogen, phosphorus, and calcium that promotes strong root development and healthy plant growth.'
                            ],
                            [
                                'question' => 'How do I apply Fish Blood & Bone?',
                                'answer' => 'Sprinkle the fertiliser evenly around the base of plants, avoiding direct contact with stems or leaves. Work it gently into the topsoil and water well. Follow the recommended dosage on the pack.'
                            ],
                            [
                                'question' => 'When should I use Fish Blood & Bone?',
                                'answer' => 'Apply in early spring when plants are starting to grow, and again in mid-summer. It\'s particularly beneficial when planting new plants or preparing beds for the growing season.'
                            ],
                            [
                                'question' => 'Is Fish Blood & Bone safe for vegetables?',
                                'answer' => 'Yes! Fish Blood & Bone is excellent for vegetables and is often preferred by organic gardeners. It provides slow-release nutrients that support healthy vegetable growth and good yields.'
                            ],
                            [
                                'question' => 'How long does Fish Blood & Bone last in the soil?',
                                'answer' => 'Fish Blood & Bone provides slow-release nutrition that feeds plants over several months. The nutrients are gradually released as the organic matter breaks down, providing sustained feeding throughout the growing season.'
                            ],
                            [
                                'question' => 'Can I use Fish Blood & Bone in containers?',
                                'answer' => 'Yes, but use it sparingly in containers as it\'s quite concentrated. Mix a small amount into the compost when planting, or apply a light top dressing during the growing season. Always follow the recommended amounts.'
                            ]
                        ];
                        
                        // Helper function to merge FAQs avoiding duplicates
                        function mergeFAQs($existingFAQs, $defaultFAQs) {
                            if(empty($existingFAQs)) {
                                return $defaultFAQs;
                            }
                            
                            $existingQuestions = array_map(function($faq) {
                                return strtolower(trim($faq['question'] ?? $faq['q'] ?? ''));
                            }, $existingFAQs);
                            
                            foreach($defaultFAQs as $defaultFaq) {
                                if(!in_array(strtolower(trim($defaultFaq['question'])), $existingQuestions)) {
                                    $existingFAQs[] = $defaultFaq;
                                }
                            }
                            
                            return $existingFAQs;
                        }
                        
                        // Apply default FAQs based on product page
                        if($isSuperiorSoluble) {
                            $faqs = mergeFAQs($faqs, $defaultSuperiorSolubleFAQs);
                        } elseif($isSwellGellFeed) {
                            $faqs = mergeFAQs($faqs, $defaultSwellGellFAQs);
                        } elseif($isClematisFeed) {
                            $faqs = mergeFAQs($faqs, $defaultClematisFAQs);
                        } elseif($isCitrusFeed) {
                            $faqs = mergeFAQs($faqs, $defaultCitrusFAQs);
                        } elseif($isAcerFeed) {
                            $faqs = mergeFAQs($faqs, $defaultAcerFAQs);
                        } elseif($isUltimateRose) {
                            $faqs = mergeFAQs($faqs, $defaultUltimateRoseFAQs);
                        } elseif($isFishBloodBone) {
                            $faqs = mergeFAQs($faqs, $defaultFishBloodBoneFAQs);
                        }
                        
                        // Ensure at least 5 FAQs for any product page
                        if(count($faqs) < 5) {
                            // Add generic FAQs if needed
                            $genericFAQs = [
                                [
                                    'question' => 'How often should I use this product?',
                                    'answer' => 'Follow the instructions on the pack for best results. Generally, feed during the growing season (spring through summer) and reduce or stop feeding in autumn and winter.'
                                ],
                                [
                                    'question' => 'Is this product safe for all plants?',
                                    'answer' => 'This product is specifically formulated for its intended use. Always check the product label and follow the instructions carefully for best results and plant safety.'
                                ],
                                [
                                    'question' => 'How should I store this product?',
                                    'answer' => 'Store in a cool, dry place away from direct sunlight. Keep away from pets and children. Ensure the pack is sealed properly to maintain freshness.'
                                ],
                                [
                                    'question' => 'Can I use this product in containers?',
                                    'answer' => 'Yes, this product can be used in containers. Follow the recommended dosage for container size and ensure adequate watering after application.'
                                ],
                                [
                                    'question' => 'When is the best time to start feeding?',
                                    'answer' => 'Start feeding in spring when plants are actively growing. Continue through the growing season according to the product instructions for optimal results.'
                                ]
                            ];
                            
                            $faqs = mergeFAQs($faqs, $genericFAQs);
                        }
                        
                        // Final check: ensure we have at least 5 FAQs (add more generic if still less than 5)
                        if(count($faqs) < 5) {
                            // If still less than 5, add more generic FAQs
                            $additionalGenericFAQs = [
                                [
                                    'question' => 'What makes this product effective?',
                                    'answer' => 'This product is professionally formulated with a balanced blend of essential nutrients designed to support healthy plant growth, strong roots, and abundant flowering.'
                                ],
                                [
                                    'question' => 'Can I use this product with other fertilisers?',
                                    'answer' => 'It\'s generally best to use one fertiliser at a time to avoid over-feeding. Follow the product instructions and avoid mixing with other fertilisers unless specifically recommended.'
                                ]
                            ];
                            $faqs = mergeFAQs($faqs, $additionalGenericFAQs);
                        }
                        
                        // Final safety check: if still less than 5, use product defaults or pad
                        if(count($faqs) < 5) {
                            // Get product-specific defaults if available
                            $productDefaults = [];
                            if($isSuperiorSoluble) {
                                $productDefaults = $defaultSuperiorSolubleFAQs;
                            } elseif($isSwellGellFeed) {
                                $productDefaults = $defaultSwellGellFAQs;
                            } elseif($isClematisFeed) {
                                $productDefaults = $defaultClematisFAQs;
                            } elseif($isCitrusFeed) {
                                $productDefaults = $defaultCitrusFAQs;
                            } elseif($isAcerFeed) {
                                $productDefaults = $defaultAcerFAQs;
                            } elseif($isUltimateRose) {
                                $productDefaults = $defaultUltimateRoseFAQs;
                            } elseif($isFishBloodBone) {
                                $productDefaults = $defaultFishBloodBoneFAQs;
                            }
                            
                            // If we have product defaults, use them, otherwise use generic
                            if(!empty($productDefaults)) {
                                $faqs = mergeFAQs($faqs, $productDefaults);
                            }
                            
                            // If still less than 5, just take first 5 from whatever we have
                            if(count($faqs) > 5) {
                                $faqs = array_slice($faqs, 0, 5);
                            }
                        }
                    @endphp
                    @if(!empty($faqs))
                    <!-- Accordion -->
                    <div class="panel-group accordion" id="product-faq-accordion" role="tablist" aria-multiselectable="true">
                        @foreach($faqs as $index => $faq)
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="product-faq-heading-{{ $index }}">
                                <h6 class="panel-title">
                                    <a class="{{ $index > 0 ? 'collapsed' : '' }}" role="button" data-toggle="collapse" data-parent="#product-faq-accordion" href="#product-faq-pane-{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                                        {{ $faq['question'] ?? $faq['q'] ?? 'Question' }}
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="product-faq-pane-{{ $index }}" class="panel-collapse collapse {{ $index === 0 ? 'in' : '' }}" role="tabpanel" aria-labelledby="product-faq-heading-{{ $index }}">
                                <div class="panel-body">
                                    {!! nl2br(e($faq['answer'] ?? $faq['a'] ?? '')) !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div><!-- .col-md-8  -->
            </div><!-- .row  -->
        </div><!-- .faq  -->
    </div><!-- .container  -->
</div><!-- .faq-section  -->

<div class="section-divider-wave section-divider-wave-bottom" id="divider-faq-bottom" style="height: 120px; width: 100%; overflow: hidden; background: #f8f9fa; display: block !important; visibility: visible !important;">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="display: block; width: 100%; height: 100%;">
        <defs>
            <linearGradient id="gradient-divider-faq-bottom" x1="0%" y1="0%" x2="100%" y2="100%" gradientUnits="objectBoundingBox">
                <stop offset="0%" style="stop-color:#f8f9fa;stop-opacity:1" />
                <stop offset="100%" style="stop-color:#f8f9fa;stop-opacity:1" />
            </linearGradient>
        </defs>
        <path d="M0,0 C150,80 350,80 600,40 C850,0 1050,0 1200,40 L1200,120 L0,120 Z" fill="url(#gradient-divider-faq-bottom)"></path>
    </svg>
</div>

<!-- Start .guides-section  -->
<div id="guides" class="guides-section section white-bg pt-120 pb-120">
    <div class="container">
        <div class="section-head text-center mb-60">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="heading">Latest <span>Guides</span></h2>
                    <p class="lead">Expert gardening guides and tips to help you achieve the best results in your garden</p>
                </div>
            </div>
        </div>

        <div class="row">
            @php
                $latestArticles = \App\Models\Blog::where('is_published', true)
                    ->whereNotNull('published_date')
                    ->orderBy('published_date', 'desc')
                    ->orderBy('sort_order', 'asc')
                    ->take(3)
                    ->get();
            @endphp

            @forelse($latestArticles as $article)
            <div class="col-md-4 mb-40">
                <article class="blog-card white-bg">
                    <div class="blog-image">
                        <a href="{{ route('blog.show', ['category_slug' => $article->category_slug, 'slug' => $article->slug]) }}">
                            @php
                                $imagePath = $article->image ? $article->image : 'images/superiorV4.png';
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
                                loading="lazy"
                                decoding="async"
                            />
                        </a>
                        @if($article->category)
                        <div class="blog-category">{{ $article->category }}</div>
                        @endif
                    </div>
                    <div class="blog-content p-30">
                        <div class="blog-meta mb-15">
                            <span class="blog-date"><i class="fa fa-calendar"></i> {{ $article->published_date ? $article->published_date->format('F jS, Y') : 'Not published' }}</span>
                            @if($article->reading_time)
                            <span class="blog-reading-time"><i class="fa fa-clock-o"></i> {{ $article->reading_time }} min read</span>
                            @endif
                        </div>
                        <h3 class="blog-title mb-15">
                            <a href="{{ route('blog.show', ['category_slug' => $article->category_slug, 'slug' => $article->slug]) }}">{{ $article->title }}</a>
                        </h3>
                        <p class="blog-excerpt mb-20">{{ $article->excerpt ?? Str::limit(strip_tags($article->content ?? ''), 150) }}</p>
                        <a href="{{ route('blog.show', ['category_slug' => $article->category_slug, 'slug' => $article->slug]) }}" class="button button-primary">Read Guide</a>
                    </div>
                </article>
            </div>
            @empty
            <div class="col-md-12">
                <p class="text-center" style="font-size: 18px; color: #666; padding: 40px 20px;">
                    <i class="fa fa-book" style="font-size: 48px; color: #19B2EB; margin-bottom: 20px; display: block;"></i>
                    No blogs available yet.
                </p>
            </div>
            @endforelse
        </div>

        <div class="text-center mt-40">
            <a href="{{ route('blog.index') }}" class="button button-secondary">View All Guides</a>
        </div>
    </div>
</div>
<!-- End .guides-section  -->

<!-- Newsletter Signup Section -->
<div class="newsletter-section section pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h2 class="heading mb-20">Stay Updated with Gardening Tips</h2>
                <p class="lead mb-40">Subscribe to our newsletter for expert gardening advice, seasonal tips, and exclusive offers</p>
                <form id="newsletterForm" class="newsletter-form">
                    @csrf
                    <div class="newsletter-form-group">
                        <input type="email" name="email" id="newsletterEmail" class="form-control newsletter-input" placeholder="Enter your email address" required aria-label="Email address">
                        <button type="submit" class="btn btn-primary newsletter-btn">Subscribe</button>
                    </div>
                    <div id="newsletterMessage" class="newsletter-message mt-20" style="display: none;"></div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('partials.footer')
@endsection

@push('scripts')
<script>
// Reading progress indicator
(function() {
    function initReadingProgress() {
        if (typeof jQuery === 'undefined' || typeof $ === 'undefined') {
            setTimeout(initReadingProgress, 50);
            return;
        }
        
        var $ = jQuery;
        var $progressBar = $('#readingProgress');
        
        if ($progressBar.length) {
            $(window).on('scroll', function() {
                var scrollTop = $(window).scrollTop();
                var documentHeight = $(document).height();
                var windowHeight = $(window).height();
                var scrollableHeight = documentHeight - windowHeight;
                var scrollPercent = 0;
                
                if (scrollableHeight > 0) {
                    scrollPercent = Math.min((scrollTop / scrollableHeight) * 100, 100);
                }
                
                $progressBar.css('width', scrollPercent + '%');
            });
        }
    }
    
    initReadingProgress();
})();

// Extract dominant colors from product image and apply to hero background
(function() {
    function rgbToHex(r, g, b) {
        return '#' + 
            ('0' + parseInt(r).toString(16)).slice(-2) +
            ('0' + parseInt(g).toString(16)).slice(-2) +
            ('0' + parseInt(b).toString(16)).slice(-2);
    }
    
    function extractColorsFromImage(imagePath, callback) {
        var img = new Image();
        img.crossOrigin = 'anonymous';
        img.onload = function() {
            try {
                var canvas = document.createElement('canvas');
                var ctx = canvas.getContext('2d');
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0);
                
                // Sample colors from different regions of the image
                var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                var data = imageData.data;
                
                // Sample left side (for gradient start) - focus on center-left area
                var leftColors = [];
                var leftStartX = Math.floor(canvas.width * 0.1);
                var leftEndX = Math.floor(canvas.width * 0.45);
                var leftStartY = Math.floor(canvas.height * 0.15);
                var leftEndY = Math.floor(canvas.height * 0.85);
                
                // Sample right side (for gradient end) - focus on center-right area
                var rightColors = [];
                var rightStartX = Math.floor(canvas.width * 0.55);
                var rightEndX = Math.floor(canvas.width * 0.9);
                var rightStartY = Math.floor(canvas.height * 0.15);
                var rightEndY = Math.floor(canvas.height * 0.85);
                
                // Also sample center area for dominant colors (important for purple products)
                var centerColors = [];
                var centerStartX = Math.floor(canvas.width * 0.3);
                var centerEndX = Math.floor(canvas.width * 0.7);
                var centerStartY = Math.floor(canvas.height * 0.2);
                var centerEndY = Math.floor(canvas.height * 0.8);
                
                var sampleSize = 30; // Sample more frequently for better color detection
                
                // Collect center colors (most important for product image)
                for (var y = centerStartY; y < centerEndY; y += sampleSize) {
                    for (var x = centerStartX; x < centerEndX; x += sampleSize) {
                        var idx = (y * canvas.width + x) * 4;
                        var r = data[idx];
                        var g = data[idx + 1];
                        var b = data[idx + 2];
                        var a = data[idx + 3];
                        // Only include pixels with sufficient opacity
                        if (a > 128) {
                            centerColors.push({r: r, g: g, b: b});
                        }
                    }
                }
                
                // Collect left side colors
                for (var y = leftStartY; y < leftEndY; y += sampleSize) {
                    for (var x = leftStartX; x < leftEndX; x += sampleSize) {
                        var index = (y * canvas.width + x) * 4;
                        var r = data[index];
                        var g = data[index + 1];
                        var b = data[index + 2];
                        var a = data[index + 3];
                        
                        if (a > 128) { // Skip transparent pixels
                            leftColors.push({r: r, g: g, b: b});
                        }
                    }
                }
                
                // Collect right side colors
                for (var y = rightStartY; y < rightEndY; y += sampleSize) {
                    for (var x = rightStartX; x < rightEndX; x += sampleSize) {
                        var index = (y * canvas.width + x) * 4;
                        var r = data[index];
                        var g = data[index + 1];
                        var b = data[index + 2];
                        var a = data[index + 3];
                        
                        if (a > 128) { // Skip transparent pixels
                            rightColors.push({r: r, g: g, b: b});
                        }
                    }
                }
                
                // Calculate average colors, prioritizing more saturated/vibrant colors
                function getAverageColor(colors) {
                    if (colors.length === 0) return null;
                    
                    // Calculate saturation for each color and prioritize vibrant colors
                    function getSaturation(r, g, b) {
                        var max = Math.max(r, g, b);
                        var min = Math.min(r, g, b);
                        if (max === 0) return 0;
                        return (max - min) / max;
                    }
                    
                    // Weight colors by saturation (more saturated = higher weight)
                    var totalR = 0, totalG = 0, totalB = 0, totalWeight = 0;
                    for (var i = 0; i < colors.length; i++) {
                        var sat = getSaturation(colors[i].r, colors[i].g, colors[i].b);
                        var weight = 1 + (sat * 2); // Boost weight for saturated colors
                        totalR += colors[i].r * weight;
                        totalG += colors[i].g * weight;
                        totalB += colors[i].b * weight;
                        totalWeight += weight;
                    }
                    
                    var avgR = Math.round(totalR / totalWeight);
                    var avgG = Math.round(totalG / totalWeight);
                    var avgB = Math.round(totalB / totalWeight);
                    
                    // Boost saturation to make colors more vibrant
                    // For purple colors, boost more aggressively
                    var max = Math.max(avgR, avgG, avgB);
                    if (max > 0) {
                        var min = Math.min(avgR, avgG, avgB);
                        var sat = (max - min) / max;
                        
                        // Check if it's purple-ish (blue and red dominant)
                        var isPurple = avgB > avgG && avgR > avgG && (avgR + avgB) > (avgG * 1.5);
                        var boost = isPurple ? 1.3 : 1.2; // 30% boost for purple, 20% for others
                        
                        var newSat = Math.min(1, sat * boost);
                        var delta = (max * newSat - (max - min)) / 2;
                        avgR = Math.min(255, Math.max(0, Math.round(avgR + delta)));
                        avgG = Math.min(255, Math.max(0, Math.round(avgG + delta)));
                        avgB = Math.min(255, Math.max(0, Math.round(avgB + delta)));
                    }
                    
                    return {
                        r: avgR,
                        g: avgG,
                        b: avgB
                    };
                }
                
                var leftAvg = getAverageColor(leftColors);
                var rightAvg = getAverageColor(rightColors);
                var centerAvg = getAverageColor(centerColors);
                
                // Prioritize center colors (most representative of product), then use left/right for gradient
                // Create more variation by using different regions for gradient start and end
                var color1, color2;
                
                // Function to create a slightly varied color (for gradient variation)
                function createVariedColor(color, variation) {
                    if (!color) return null;
                    var r = Math.max(0, Math.min(255, color.r + variation));
                    var g = Math.max(0, Math.min(255, color.g + variation));
                    var b = Math.max(0, Math.min(255, color.b + variation));
                    return {r: r, g: g, b: b};
                }
                
                // Function to create a darker/lighter version for gradient end
                function createGradientEndColor(color, isDarker) {
                    if (!color) return null;
                    var factor = isDarker ? 0.75 : 1.25; // Darker or lighter
                    var r = Math.max(0, Math.min(255, Math.round(color.r * factor)));
                    var g = Math.max(0, Math.min(255, Math.round(color.g * factor)));
                    var b = Math.max(0, Math.min(255, Math.round(color.b * factor)));
                    return {r: r, g: g, b: b};
                }
                
                if (centerAvg) {
                    // Use center as primary color (gradient start)
                    color1 = rgbToHex(centerAvg.r, centerAvg.g, centerAvg.b);
                    
                    // For gradient end, prefer right side, then left, then create variation
                    if (rightAvg) {
                        // Use right side, but ensure it's different enough from center
                        var diff = Math.abs(rightAvg.r - centerAvg.r) + Math.abs(rightAvg.g - centerAvg.g) + Math.abs(rightAvg.b - centerAvg.b);
                        if (diff > 30) {
                            // Right side is different enough, use it
                            color2 = rgbToHex(rightAvg.r, rightAvg.g, rightAvg.b);
                        } else {
                            // Right side too similar, create a darker/lighter variation
                            var endColor = createGradientEndColor(centerAvg, true);
                            color2 = rgbToHex(endColor.r, endColor.g, endColor.b);
                        }
                    } else if (leftAvg) {
                        // Use left side, but ensure variation
                        var diff = Math.abs(leftAvg.r - centerAvg.r) + Math.abs(leftAvg.g - centerAvg.g) + Math.abs(leftAvg.b - centerAvg.b);
                        if (diff > 30) {
                            color2 = rgbToHex(leftAvg.r, leftAvg.g, leftAvg.b);
                        } else {
                            var endColor = createGradientEndColor(centerAvg, true);
                            color2 = rgbToHex(endColor.r, endColor.g, endColor.b);
                        }
                    } else {
                        // Create darker version of center color for gradient end
                        var endColor = createGradientEndColor(centerAvg, true);
                        color2 = rgbToHex(endColor.r, endColor.g, endColor.b);
                    }
                } else if (leftAvg && rightAvg) {
                    // Fallback to left/right if center not available
                    // Use the lighter/more vibrant as start, darker as end
                    var leftBrightness = leftAvg.r + leftAvg.g + leftAvg.b;
                    var rightBrightness = rightAvg.r + rightAvg.g + rightAvg.b;
                    if (leftBrightness > rightBrightness) {
                        color1 = rgbToHex(leftAvg.r, leftAvg.g, leftAvg.b);
                        color2 = rgbToHex(rightAvg.r, rightAvg.g, rightAvg.b);
                    } else {
                        color1 = rgbToHex(rightAvg.r, rightAvg.g, rightAvg.b);
                        color2 = rgbToHex(leftAvg.r, leftAvg.g, leftAvg.b);
                    }
                } else if (leftAvg) {
                    color1 = rgbToHex(leftAvg.r, leftAvg.g, leftAvg.b);
                    var endColor = createGradientEndColor(leftAvg, true);
                    color2 = rgbToHex(endColor.r, endColor.g, endColor.b);
                } else if (rightAvg) {
                    color1 = rgbToHex(rightAvg.r, rightAvg.g, rightAvg.b);
                    var endColor = createGradientEndColor(rightAvg, true);
                    color2 = rgbToHex(endColor.r, endColor.g, endColor.b);
                }
                
                if (color1) {
                    callback(color1, color2);
                } else {
                    callback(null, null);
                }
            } catch (e) {
                console.error('Error extracting colors:', e);
                callback(null, null);
            }
        };
        img.onerror = function() {
            callback(null, null);
        };
        img.src = imagePath;
    }
    
    function adjustBrightness(hex, percent) {
        if (!hex) return null;
        var num = parseInt(hex.replace('#', ''), 16);
        var r = Math.max(0, Math.min(255, (num >> 16) + percent));
        var g = Math.max(0, Math.min(255, (num >> 8 & 0x00FF) + percent));
        var b = Math.max(0, Math.min(255, (num & 0x0000FF) + percent));
        return '#' + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1);
    }
    
    function applyHeroColors(color1, color2) {
        // Use solid colors instead of gradients for product pages
        var isUltimateRose = window.location.pathname.includes('ultimate-rose-bloom-booster');
        var isSwellGellFeed = window.location.pathname.includes('swell-gell-feed');
        var isSuperiorSoluble = window.location.pathname.includes('superior-soluble-fertiliser');
        var isClematisFeed = window.location.pathname.includes('clematis-feed');
        var isCitrusFeed = window.location.pathname.includes('citrus-feed');
        var isFishBloodBone = window.location.pathname.includes('fish-blood-bone');
        var isAcerFeed = window.location.pathname.includes('acer-feed');
        
        var productColor;
        if (isUltimateRose) {
            productColor = '#537550';
        } else if (isSwellGellFeed) {
            productColor = '#337ab7';
        } else if (isSuperiorSoluble) {
            productColor = '#2d5016';
        } else if (isClematisFeed) {
            productColor = '#7d4f9a';
        } else if (isCitrusFeed) {
            productColor = '#f49e00';
        } else if (isFishBloodBone) {
            productColor = '#d9534f'; // Red/blood orange color
        } else if (isAcerFeed) {
            productColor = '#4a7c59'; // Green color matching acer/maple leaves
        } else {
            productColor = color1 || '#70D969';
        }
        
        // Update hero section with solid color
        var heroSection = document.querySelector('.product-page-hero.gradiant-background');
        var overlay = document.querySelector('.product-page-hero .gradiant-overlay');
        
        if (heroSection) {
            heroSection.style.setProperty('background', productColor, 'important');
            heroSection.style.setProperty('background-color', productColor, 'important');
            heroSection.style.setProperty('background-image', 'none', 'important');
        }
        if (overlay) {
            overlay.style.setProperty('display', 'none', 'important');
            overlay.style.setProperty('background', 'none', 'important');
            overlay.style.setProperty('background-image', 'none', 'important');
        }
        
        // Update features section with solid color
        var featuresSection = document.querySelector('.features-section.gradiant-background');
        if (featuresSection) {
            featuresSection.style.setProperty('background', productColor, 'important');
            featuresSection.style.setProperty('background-color', productColor, 'important');
            featuresSection.style.setProperty('background-image', 'none', 'important');
        }
        
        // Update products section with solid color
        var productsSection = document.querySelector('.products-section.gradiant-background');
        if (productsSection) {
            productsSection.style.setProperty('background', productColor, 'important');
            productsSection.style.setProperty('background-color', productColor, 'important');
            productsSection.style.setProperty('background-image', 'none', 'important');
        }
        
        // Update all divider waves with solid color (except FAQ dividers and footer divider)
        var dividerWaves = document.querySelectorAll('.section-divider-wave:not(#divider-faq-top):not(#divider-faq-bottom), .section-divider-wave-bottom:not(#divider-faq-top):not(#divider-faq-bottom), .section-divider-wave-product-bottom:not(#divider-faq-top):not(#divider-faq-bottom)');
        dividerWaves.forEach(function(divider) {
            var isFooterDivider = divider.nextElementSibling && divider.nextElementSibling.classList && divider.nextElementSibling.classList.contains('footer-section');
            if (divider && divider.id !== 'divider-faq-top' && divider.id !== 'divider-faq-bottom' && !isFooterDivider) {
                // Remove any gradient from inline style attribute first
                var currentStyle = divider.getAttribute('style') || '';
                if (currentStyle.includes('linear-gradient') || currentStyle.includes('gradient')) {
                    // Remove all gradient-related styles
                    var newStyle = currentStyle
                        .replace(/background:\s*linear-gradient[^;]+;?/gi, '')
                        .replace(/background:\s*[^;]*gradient[^;]+;?/gi, '')
                        .replace(/background-image:\s*linear-gradient[^;]+;?/gi, '')
                        .replace(/background-image:\s*[^;]*gradient[^;]+;?/gi, '');
                    // Keep other styles but remove gradient backgrounds
                    divider.setAttribute('style', newStyle);
                }
                // Apply solid color with high priority - force override any existing styles
                divider.style.cssText = divider.style.cssText.replace(/background[^;]*;?/gi, '');
                divider.style.setProperty('background', productColor, 'important');
                divider.style.setProperty('background-color', productColor, 'important');
                divider.style.setProperty('background-image', 'none', 'important');
                divider.style.setProperty('--divider-bg-color', productColor, 'important');
                divider.style.setProperty('--divider-gradient', 'none', 'important');
                divider.style.setProperty('--product-color', productColor, 'important');
                
                // Force update the ::after pseudo-element by injecting a style tag
                // This ensures the divider uses the product color immediately
                var dividerId = divider.id || 'divider-' + Math.random().toString(36).substr(2, 9);
                if (!divider.id) {
                    divider.id = dividerId;
                }
                var styleId = 'divider-style-' + dividerId;
                var existingStyle = document.getElementById(styleId);
                if (!existingStyle) {
                    var style = document.createElement('style');
                    style.id = styleId;
                    style.textContent = '#' + dividerId + '::after { background: ' + productColor + ' !important; background-color: ' + productColor + ' !important; background-image: none !important; }';
                    document.head.appendChild(style);
                } else {
                    // Update existing style instead of removing/recreating
                    existingStyle.textContent = '#' + dividerId + '::after { background: ' + productColor + ' !important; background-color: ' + productColor + ' !important; background-image: none !important; }';
                }
            }
        });
        
        // Specifically target the products section bottom divider - force product color
        var productsBottomDividers = document.querySelectorAll('.products-section + .section-divider-wave-product-bottom, .section-divider-wave-product-bottom, #divider-products-bottom');
        productsBottomDividers.forEach(function(productsBottomDivider) {
            if (productsBottomDivider && productsBottomDivider.id !== 'divider-faq-top' && productsBottomDivider.id !== 'divider-faq-bottom') {
                var isFooterDivider = productsBottomDivider.nextElementSibling && productsBottomDivider.nextElementSibling.classList && productsBottomDivider.nextElementSibling.classList.contains('footer-section');
                if (!isFooterDivider) {
                    // Completely clear and reset background styles - more aggressive
                    var currentStyle = productsBottomDivider.getAttribute('style') || '';
                    // Remove all background-related styles including gradients
                    var newStyle = currentStyle
                        .replace(/background[^:]*:\s*[^;]+;?/gi, '')
                        .replace(/background-color[^:]*:\s*[^;]+;?/gi, '')
                        .replace(/background-image[^:]*:\s*[^;]+;?/gi, '')
                        .replace(/linear-gradient[^;)]+/gi, '')
                        .replace(/gradient[^;)]+/gi, '');
                    // Keep non-background styles
                    var nonBgStyles = newStyle.split(';').filter(function(s) {
                        return s.trim() && !s.trim().toLowerCase().includes('background');
                    }).join(';');
                    productsBottomDivider.setAttribute('style', nonBgStyles);
                    
                    // Force apply product color with maximum priority
                    productsBottomDivider.style.cssText = productsBottomDivider.style.cssText.replace(/background[^;]*;?/gi, '');
                    productsBottomDivider.style.setProperty('background', productColor, 'important');
                    productsBottomDivider.style.setProperty('background-color', productColor, 'important');
                    productsBottomDivider.style.setProperty('background-image', 'none', 'important');
                    productsBottomDivider.style.setProperty('--divider-bg-color', productColor, 'important');
                    productsBottomDivider.style.setProperty('--divider-gradient', 'none', 'important');
                    productsBottomDivider.style.setProperty('--product-color', productColor, 'important');
                    
                    // Force update the ::after pseudo-element for products bottom divider
                    var dividerId = productsBottomDivider.id || 'divider-products-' + Math.random().toString(36).substr(2, 9);
                    if (!productsBottomDivider.id) {
                        productsBottomDivider.id = dividerId;
                    }
                    var styleId = 'divider-style-' + dividerId;
                    var existingStyle = document.getElementById(styleId);
                    if (!existingStyle) {
                        var style = document.createElement('style');
                        style.id = styleId;
                        style.textContent = '#' + dividerId + '::after { background: ' + productColor + ' !important; background-color: ' + productColor + ' !important; background-image: none !important; }';
                        document.head.appendChild(style);
                    } else {
                        // Update existing style instead of removing/recreating
                        existingStyle.textContent = '#' + dividerId + '::after { background: ' + productColor + ' !important; background-color: ' + productColor + ' !important; background-image: none !important; }';
                    }
                }
            }
        });
        
        // Ensure FAQ dividers stay grey
        var faqTopDivider = document.getElementById('divider-faq-top');
        var faqBottomDivider = document.getElementById('divider-faq-bottom');
        if (faqTopDivider) {
            faqTopDivider.style.setProperty('background', '#f8f9fa', 'important');
            faqTopDivider.style.setProperty('background-color', '#f8f9fa', 'important');
            faqTopDivider.style.setProperty('--divider-gradient', 'none', 'important');
            faqTopDivider.style.setProperty('--divider-bg-color', '#f8f9fa', 'important');
        }
        if (faqBottomDivider) {
            faqBottomDivider.style.setProperty('background', '#f8f9fa', 'important');
            faqBottomDivider.style.setProperty('background-color', '#f8f9fa', 'important');
            faqBottomDivider.style.setProperty('--divider-gradient', 'none', 'important');
            faqBottomDivider.style.setProperty('--divider-bg-color', '#f8f9fa', 'important');
        }
        
        // Ensure footer divider uses solid #404040 color (no gradient)
        function ensureFooterDividerGradient() {
            var footerDividers = document.querySelectorAll('.section-divider-wave, #footer-top-divider');
            footerDividers.forEach(function(divider) {
                var isFooterDivider = divider.nextElementSibling && divider.nextElementSibling.classList && divider.nextElementSibling.classList.contains('footer-section');
                if (isFooterDivider || divider.id === 'footer-top-divider') {
                    divider.style.setProperty('background', '#404040', 'important');
                    divider.style.setProperty('background-color', '#404040', 'important');
                    divider.style.setProperty('background-image', 'none', 'important');
                    divider.style.setProperty('--divider-gradient', 'none', 'important');
                    divider.style.setProperty('--divider-bg-color', '#404040', 'important');
                    divider.style.setProperty('display', 'block', 'important');
                    divider.style.setProperty('visibility', 'visible', 'important');
                    divider.style.setProperty('height', '120px', 'important');
                    divider.style.setProperty('opacity', '1', 'important');
                    divider.style.setProperty('filter', 'none', 'important');
                    divider.style.setProperty('-webkit-filter', 'none', 'important');
                    divider.style.setProperty('backdrop-filter', 'none', 'important');
                    divider.style.setProperty('-webkit-backdrop-filter', 'none', 'important');
                    divider.style.setProperty('transform', 'none', 'important');
                    divider.style.setProperty('will-change', 'auto', 'important');
                    // Update SVG to solid #404040 color
                    var svg = divider.querySelector('svg');
                    if (svg) {
                        svg.style.setProperty('display', 'block', 'important');
                        svg.style.setProperty('filter', 'none', 'important');
                        svg.style.setProperty('-webkit-filter', 'none', 'important');
                        svg.style.setProperty('transform', 'none', 'important');
                        svg.style.setProperty('will-change', 'auto', 'important');
                        var path = svg.querySelector('path');
                        if (path) {
                            path.setAttribute('fill', '#404040');
                            path.style.setProperty('filter', 'none', 'important');
                            path.style.setProperty('-webkit-filter', 'none', 'important');
                        }
                        // Update gradient stops to solid #404040
                        var gradient = svg.querySelector('#gradient-divider-footer');
                        if (gradient) {
                            var stops = gradient.querySelectorAll('stop');
                            stops.forEach(function(stop) {
                                stop.setAttribute('style', 'stop-color:#404040;stop-opacity:1');
                            });
                        }
                    }
                    // Ensure ::after pseudo-element is disabled
                    var styleId = 'footer-divider-no-after';
                    var existingStyle = document.getElementById(styleId);
                    if (!existingStyle) {
                        var style = document.createElement('style');
                        style.id = styleId;
                        style.textContent = '#footer-top-divider::after { display: none !important; content: none !important; -webkit-mask-image: none !important; mask-image: none !important; }';
                        document.head.appendChild(style);
                    }
                }
            });
        }
        
        // Run immediately and on multiple events
        ensureFooterDividerGradient();
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', ensureFooterDividerGradient);
        }
        window.addEventListener('load', ensureFooterDividerGradient);
        setTimeout(ensureFooterDividerGradient, 100);
        setTimeout(ensureFooterDividerGradient, 500);
        setTimeout(ensureFooterDividerGradient, 1000);
        
        // Ensure footer section is visible
        var footerSection = document.querySelector('.footer-section');
        if (footerSection) {
            footerSection.style.setProperty('display', 'block', 'important');
            footerSection.style.setProperty('visibility', 'visible', 'important');
            footerSection.style.setProperty('opacity', '1', 'important');
            footerSection.style.setProperty('background-color', '#404040', 'important');
        }
        
        // Update video overlays with solid color
        var videoOverlays = document.querySelectorAll('.video-overlay.gradiant-background');
        videoOverlays.forEach(function(overlay) {
            overlay.style.setProperty('background', productColor, 'important');
            overlay.style.setProperty('background-image', 'none', 'important');
        });
        
        // Update CSS variables globally
        document.documentElement.style.setProperty('--product-color', productColor, 'important');
        document.documentElement.style.setProperty('--product-hero-bg', productColor, 'important');
        document.documentElement.style.setProperty('--divider-bg-color', productColor, 'important');
        document.documentElement.style.setProperty('--divider-gradient', 'none', 'important');
        
        // Also set CSS variables on all dividers so ::after pseudo-elements can use them
        dividerWaves.forEach(function(divider) {
            var isFooterDivider = divider.nextElementSibling && divider.nextElementSibling.classList && divider.nextElementSibling.classList.contains('footer-section');
            if (divider && divider.id !== 'divider-faq-top' && divider.id !== 'divider-faq-bottom' && !isFooterDivider) {
                divider.style.setProperty('--product-color', productColor, 'important');
                divider.style.setProperty('--divider-bg-color', productColor, 'important');
                divider.style.setProperty('--divider-gradient', 'none', 'important');
            }
        });
        
        // Update hero title - keep it pure white, ensure no white background
        var heroTitle = document.querySelector('.product-page-hero .hero-title-gradient');
        if (heroTitle) {
            heroTitle.style.setProperty('background', '#ffffff', 'important');
            heroTitle.style.setProperty('background-color', 'transparent', 'important');
            heroTitle.style.setProperty('-webkit-background-clip', 'unset', 'important');
            heroTitle.style.setProperty('background-clip', 'unset', 'important');
            heroTitle.style.setProperty('-webkit-text-fill-color', '#ffffff', 'important');
            heroTitle.style.setProperty('color', '#ffffff', 'important');
            // Remove any ::before pseudo-element that might show white background
            var titleStyleId = 'hero-title-before-style';
            var existingTitleStyle = document.getElementById(titleStyleId);
            if (!existingTitleStyle) {
                var style = document.createElement('style');
                style.id = titleStyleId;
                style.textContent = '.product-page-hero .hero-title-gradient::before { display: none !important; content: none !important; }';
                document.head.appendChild(style);
            }
        }
        
        // Update section heading colors on white backgrounds - use solid product color
        var sectionHeadingSpans = document.querySelectorAll('.product-page-hero ~ .section:not(.gradiant-background) .section-head h2 span, .product-page-hero ~ .section:not(.gradiant-background) .section-head .heading span');
        sectionHeadingSpans.forEach(function(span) {
            span.style.setProperty('color', productColor, 'important');
            span.style.setProperty('background', 'none', 'important');
            span.style.setProperty('-webkit-background-clip', 'unset', 'important');
            span.style.setProperty('background-clip', 'unset', 'important');
            span.style.setProperty('-webkit-text-fill-color', productColor, 'important');
        });
        
        // Update headings on gradient backgrounds (like "What's in our Superior Plant Food") - keep white
        var gradientSectionHeadings = document.querySelectorAll('.features-section.gradiant-background .section-head h2, .products-section.gradiant-background .section-head h2, .features-section.gradiant-background .section-head .heading, .products-section.gradiant-background .section-head .heading');
        gradientSectionHeadings.forEach(function(heading) {
            heading.style.setProperty('color', '#ffffff', 'important');
            heading.style.setProperty('text-shadow', '0 2px 10px rgba(0, 0, 0, 0.3)', 'important');
            // Remove any gradient text effects
            heading.style.setProperty('background', 'none', 'important');
            heading.style.setProperty('-webkit-background-clip', 'unset', 'important');
            heading.style.setProperty('background-clip', 'unset', 'important');
            heading.style.setProperty('-webkit-text-fill-color', '#ffffff', 'important');
        });
        
        // Update animated lines below headings on white backgrounds - use product color
        // Since ::before pseudo-elements can't be directly selected, we'll inject a style tag
        var headingLineStyleId = 'product-heading-lines-style';
        var existingHeadingLineStyle = document.getElementById(headingLineStyleId);
        if (!existingHeadingLineStyle) {
            var headingLineStyle = document.createElement('style');
            headingLineStyle.id = headingLineStyleId;
            headingLineStyle.textContent = '.product-page-hero ~ .section:not(.gradiant-background) .section-head h2::before, .product-page-hero ~ .section:not(.gradiant-background) .section-head .heading::before { background: linear-gradient(90deg, ' + productColor + ', ' + productColor + ') !important; }';
            document.head.appendChild(headingLineStyle);
        } else {
            // Update existing style instead of removing/recreating
            existingHeadingLineStyle.textContent = '.product-page-hero ~ .section:not(.gradiant-background) .section-head h2::before, .product-page-hero ~ .section:not(.gradiant-background) .section-head .heading::before { background: linear-gradient(90deg, ' + productColor + ', ' + productColor + ') !important; }';
        }
        
        // Hero badge should match homepage styling (glass morphism), not product color
        var heroBadge = document.querySelector('.product-page-hero .hero-badge');
        if (heroBadge) {
            heroBadge.style.setProperty('background', 'rgba(255, 255, 255, 0.15)', 'important');
            heroBadge.style.setProperty('background-color', 'rgba(255, 255, 255, 0.15)', 'important');
            heroBadge.style.setProperty('backdrop-filter', 'blur(10px)', 'important');
            heroBadge.style.setProperty('-webkit-backdrop-filter', 'blur(10px)', 'important');
            heroBadge.style.setProperty('border', '1px solid rgba(255, 255, 255, 0.3)', 'important');
        }
        
        // Size badges now use same styling as buttons (glass morphism)
        // No need to apply product-specific colors
    }
    
    // Wait for page load, then extract colors from product image
    function extractAndApplyColors() {
        // Try multiple selectors to find the product image (webp_picture generates picture > img)
        var productImage = document.querySelector('.product-page-hero .hero-image-column picture img') ||
                          document.querySelector('.product-page-hero .hero-image-column img') ||
                          document.querySelector('.product-page-hero .hero-image-mobile-placeholder picture img') ||
                          document.querySelector('.product-page-hero .hero-image-mobile-placeholder img') ||
                          document.querySelector('.product-page-hero img[src*="clematis"]') ||
                          document.querySelector('.product-page-hero img[src*="product"]') ||
                          document.querySelector('.product-page-hero img');
        
        if (!productImage) {
            console.log('Product image not found, trying again...');
            setTimeout(extractAndApplyColors, 500);
            return;
        }
        
        var imageSrc = productImage.src || productImage.currentSrc;
        if (!imageSrc) {
            console.log('Product image src not found');
            return;
        }
        
        // Function to extract and apply
        function doExtract() {
            extractColorsFromImage(imageSrc, function(color1, color2) {
                if (color1 || color2) {
                    console.log('Extracted colors from product image:', color1, color2);
                    applyHeroColors(color1, color2);
                } else {
                    console.log('Failed to extract colors from image');
                }
            });
        }
        
        if (productImage.complete && productImage.naturalWidth > 0) {
            // Image is already loaded
            doExtract();
        } else {
            // Wait for image to load
            productImage.onload = doExtract;
            // Also try after delays in case onload doesn't fire
            setTimeout(function() {
                if (productImage.complete && productImage.naturalWidth > 0) {
                    doExtract();
                }
            }, 500);
            setTimeout(function() {
                if (productImage.complete && productImage.naturalWidth > 0) {
                    doExtract();
                }
            }, 1000);
        }
    }
    
    // For specific product pages, apply colors immediately
    var isClematisFeed = window.location.pathname.includes('clematis-feed');
    var isCitrusFeed = window.location.pathname.includes('citrus-feed');
    var isSwellGellFeed = window.location.pathname.includes('swell-gell-feed');
    var isUltimateRose = window.location.pathname.includes('ultimate-rose-bloom-booster');
    var isSuperiorSoluble = window.location.pathname.includes('superior-soluble-fertiliser');
    var isFishBloodBone = window.location.pathname.includes('fish-blood-bone');
    var isAcerFeed = window.location.pathname.includes('acer-feed');
    if (isClematisFeed || isCitrusFeed || isSwellGellFeed || isUltimateRose || isSuperiorSoluble || isFishBloodBone || isAcerFeed) {
        applyHeroColors(null, null);
    }
    
    // Run on page load
    var isUltimateRoseCheck = window.location.pathname.includes('ultimate-rose-bloom-booster');
    var isSuperiorSolubleCheck = window.location.pathname.includes('superior-soluble-fertiliser');
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            if (!isClematisFeed && !isCitrusFeed && !isSwellGellFeed && !isUltimateRoseCheck && !isSuperiorSolubleCheck && !isFishBloodBone && !isAcerFeed) {
                setTimeout(extractAndApplyColors, 100);
            } else {
                applyHeroColors(null, null);
            }
        });
    } else {
        if (!isClematisFeed && !isCitrusFeed && !isSwellGellFeed && !isUltimateRoseCheck && !isSuperiorSolubleCheck && !isFishBloodBone && !isAcerFeed) {
            setTimeout(extractAndApplyColors, 100);
        } else {
            applyHeroColors(null, null);
        }
    }
    
    // Flag to prevent multiple executions
    var colorsApplied = false;
    
    // Also run after full page load - but only once
    function applyColorsNow() {
        if (!colorsApplied) {
            applyHeroColors(null, null);
            colorsApplied = true;
        }
    }
    
    // Apply immediately if DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            applyColorsNow();
            // One backup call after a short delay to catch any late-rendered elements
            setTimeout(applyColorsNow, 200);
        });
    } else {
        applyColorsNow();
        // One backup call after a short delay
        setTimeout(applyColorsNow, 200);
    }
    
    // Also apply on window load as backup (only if not already applied)
    window.addEventListener('load', function() {
        setTimeout(applyColorsNow, 100);
    });
})();

// Scroll to products section when clicking size badges
(function() {
    function initSizeBadgeScroll() {
        if (typeof jQuery === 'undefined' || typeof $ === 'undefined') {
            setTimeout(initSizeBadgeScroll, 50);
            return;
        }
        
        var $ = jQuery;
        
        // Handle size badge clicks - scroll to products section on same page
        $('.size-badge[data-scroll-to]').on('click', function(e) {
            e.preventDefault();
            var targetId = $(this).data('scroll-to');
            var target = $('#' + targetId);
            if (target.length) {
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 100
                }, 800, 'swing');
            }
        });
    }
    
    // Initialize when jQuery is ready
    if (typeof jQuery !== 'undefined') {
        $(document).ready(function() {
            initSizeBadgeScroll();
        });
    } else {
        // Wait for jQuery to load
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initSizeBadgeScroll);
        } else {
            initSizeBadgeScroll();
        }
    }
})();
</script>
@endpush

