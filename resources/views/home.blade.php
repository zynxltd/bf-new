@extends('layouts.app')

@php
use Illuminate\Support\Str;
@endphp

@section('title', 'Blooming Fast Plant Foods')

@push('meta')
<!-- SEO Meta Tags -->
<meta name="description" content="Premium plant foods and fertilisers for bigger, better blooms and healthier plants. Professional grade formulations including Superior Soluble Fertiliser, Rose Bloom Booster, and more.">
<meta name="keywords" content="plant food, fertiliser, garden supplements, rose feed, citrus feed, acer feed, plant nutrition, Blooming Fast, organic fertiliser, garden care, plant nutrition UK">
<meta name="author" content="Blooming Fast">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<meta name="googlebot" content="index, follow">
<meta name="bingbot" content="index, follow">
<link rel="canonical" href="{{ url()->current() }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="Blooming Fast Plant Foods - Premium Garden Supplements">
<meta property="og:description" content="Premium plant foods and fertilisers for bigger, better blooms and healthier plants. Professional grade formulations for your garden.">
<meta property="og:image" content="{{ webp_image('images/superiorV4.png') }}">
<meta property="og:image:secure_url" content="{{ webp_image('images/superiorV4.png') }}">
<meta property="og:image:type" content="image/webp">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name" content="Blooming Fast">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Blooming Fast Plant Foods - Premium Garden Supplements">
<meta name="twitter:description" content="Premium plant foods and fertilisers for bigger, better blooms and healthier plants.">
<meta name="twitter:image" content="{{ webp_image('images/superiorV4.png') }}">
<meta name="twitter:image:alt" content="Blooming Fast Plant Foods - Premium Garden Supplements">

<!-- Organization Schema.org JSON-LD -->
<script type="application/ld+json">
@php
$organizationSchema = [
  "@context" => "https://schema.org",
  "@type" => "Organization",
  "name" => "Blooming Fast",
  "url" => url('/'),
  "logo" => webp_image('images/logo.png'),
  "description" => "Premium plant foods and fertilisers for bigger, better blooms and healthier plants",
  "sameAs" => [
    "https://www.yougarden.com",
    "https://www.amazon.co.uk"
  ]
];
@endphp
{!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>

<!-- Website Schema.org JSON-LD -->
<script type="application/ld+json">
@php
$websiteSchema = [
  "@context" => "https://schema.org",
  "@type" => "WebSite",
  "name" => "Blooming Fast",
  "url" => url('/'),
  "potentialAction" => [
    "@type" => "SearchAction",
    "target" => url('/blog') . "?search={search_term_string}",
    "query-input" => "required name=search_term_string"
  ]
];
@endphp
{!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>

<!-- FAQ Schema.org JSON-LD -->
<script type="application/ld+json">
@php
$faqSchema = [
  "@context" => "https://schema.org",
  "@type" => "FAQPage",
  "mainEntity" => [
    [
      "@type" => "Question",
      "name" => "How do I use Blooming Fast Superior Soluble Fertiliser?",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "Simply dissolve the powder in water according to the instructions on the package. Apply to your plants every 2-4 weeks during the growing season for best results."
      ]
    ],
    [
      "@type" => "Question",
      "name" => "Is Blooming Fast safe for all plants?",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "Yes, Blooming Fast Superior Soluble Fertiliser is suitable for most flowering plants, vegetables, and ornamental plants. Always follow the recommended dosage instructions."
      ]
    ],
    [
      "@type" => "Question",
      "name" => "How often should I fertilize my plants?",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "For best results, apply Blooming Fast every 2-4 weeks during the growing season (spring through autumn). Reduce frequency during winter months."
      ]
    ],
    [
      "@type" => "Question",
      "name" => "Can I use Blooming Fast on edible plants?",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "Yes, Blooming Fast is safe to use on edible plants including vegetables and fruits. Always follow the instructions and wash produce before consumption."
      ]
    ],
    [
      "@type" => "Question",
      "name" => "Where can I buy Blooming Fast products?",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "Blooming Fast products are available from YouGarden and Amazon. Check our product pages for direct links to purchase."
      ]
    ],
    [
      "@type" => "Question",
      "name" => "Can I use it in containers?",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "Yes, Blooming Fast works excellently in containers. Simply adjust the dosage according to container size and follow the same application schedule."
      ]
    ]
  ]
];
@endphp
{!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<!-- Reading Progress Bar -->
<div class="reading-progress-container">
    <div class="reading-progress-bar" id="readingProgress"></div>
</div>

<!-- Start .header-section -->
<div id="home" class="header-section half-header section gradiant-background header-curbed confetti-section" style="background-color: #70D969 !important; background-image: linear-gradient(293deg, #70D969 0%, #19B2EB 100%) !important;">
    
    <!-- Hero Spotlight Animation - REMOVED on home page -->
    <!-- <div id="hero-spotlight-animation" class="hero-spotlight-bg"></div> -->
    
    <!-- Gradient Overlay -->
    <div class="gradiant-background gradiant-overlay"></div>
    <div id="navigation" class="navigation is-transparent" data-spy="affix" data-offset-top="5">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
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
                    <!-- Desktop Hamburger Menu Button -->
                    <button type="button" class="desktop-menu-toggle" id="desktopMenuToggle" aria-label="Toggle menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="site-collapse-nav">
                    <!-- Mobile Menu Close Button -->
                    <button type="button" class="mobile-menu-close-btn" id="mobileMenuCloseBtn" aria-label="Close menu" style="display: none;">
                        <span aria-hidden="true">✕</span>
                    </button>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#home" class="nav-item" aria-label="Navigate to Home section">Home</a></li>
                        <li><a href="#about" class="nav-item" aria-label="Navigate to About section">About</a></li>
                        <li><a href="#features" class="nav-item" aria-label="Navigate to Features section">Features</a></li>
                        <li><a href="#products" class="nav-item" aria-label="Navigate to Products section">Products</a></li>
                        <li><a href="#videos" class="nav-item" aria-label="Navigate to Videos section">Videos</a></li>
                        <li><a href="#faq" class="nav-item" aria-label="Navigate to FAQ section">FAQ</a></li>
                        <li><a href="{{ route('blog.index') }}" class="nav-item" aria-label="View Blog and Guides">Blog</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
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
                <li><a href="#home" class="nav-item" aria-label="Navigate to Home section">Home</a></li>
                <li><a href="#about" class="nav-item" aria-label="Navigate to About section">About</a></li>
                <li><a href="#features" class="nav-item" aria-label="Navigate to Features section">Features</a></li>
                <li><a href="#products" class="nav-item" aria-label="Navigate to Products section">Products</a></li>
                <li><a href="#videos" class="nav-item" aria-label="Navigate to Videos section">Videos</a></li>
                <li><a href="#faq" class="nav-item" aria-label="Navigate to FAQ section">FAQ</a></li>
                <li><a href="{{ route('blog.index') }}" class="nav-item" aria-label="View Blog and Guides">Blog</a></li>
                <li class="desktop-menu-divider"><span></span></li>
                <li class="desktop-menu-store-links">
                    <a href="https://www.yougarden.com?source=bloomingfast.com" class="nav-item store-link" target="_blank" rel="noopener" aria-label="Visit YouGarden">
                        {!! webp_picture('images/yglogosmall.png', 'YouGarden', ['loading' => 'lazy']) !!}
                    </a>
                    <a href="https://www.amazon.co.uk/stores/page/5D2120F1-F052-4812-AAF7-6FE644404EC7/search?lp_asin=B0D44VQZ1S&ref_=ast_bln&store_ref=bl_ast_dp_brandLogo_sto&terms=blooming%20fast" class="nav-item store-link" target="_blank" rel="noopener" aria-label="Visit Amazon">
                        {!! webp_picture('images/amazoncolour.png', 'Amazon', ['loading' => 'lazy']) !!}
                    </a>
                </li>
            </ul>
        </div>
    </div><!-- .navigation -->
    
    <div class="header-content">
        <div class="container">
            <div class="row row-vm">
                <div class="col-md-7 col-sm-12 hero-text-column">
                    <div class="header-texts tab-center mobile-center hero-content-mobile">
                        <div class="hero-badge wow fadeInUp" data-wow-duration=".5s">
                            <span><i class="fa fa-star hero-star-icon"></i> Premium Quality</span>
                        </div>
                        <h2 class="hero-title-gradient wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="animation-timing-function: ease-out; font-size: 56px; color: #ffffff !important; -webkit-text-fill-color: #ffffff !important; background: none !important;">Superior Plant Food</h2>
                        <p class="lead hero-description wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">Our best-ever formulation for use all round the garden for <strong>more flowers</strong>, <strong>more fruit</strong>, <strong>better roots</strong> and <strong>better shoots</strong>.</p>
                        <!-- Hero Image - appears here on mobile -->
                        <div class="hero-image-mobile-placeholder">
                            <div class="wow fadeInUp confetti-burst-trigger" data-wow-duration="1s" data-wow-delay=".6s">
                                {!! webp_picture('images/superiorV4.png', 'Superior Plant Food', ['loading' => 'lazy', 'width' => '800', 'height' => '1062', 'style' => 'max-width: 100%; height: auto;']) !!}
                            </div>
                        </div>
                        <div class="hero-sizes wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                            <span class="size-label">Available in 3 sizes:</span>
                            <div class="size-badges">
                                <span class="size-badge" data-scroll-to="products">100g</span>
                                <span class="size-badge" data-scroll-to="products">500g</span>
                                <span class="size-badge" data-scroll-to="products">1.25kg</span>
                            </div>
                        </div>
                        <p class="heading-light hero-cta wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".4s" style="font-size: 18px; font-weight: 500;">Click below to buy it from one of our stockists</p>
                        <ul class="buttons">
                            <li><a href="https://www.yougarden.com/item-p-100062/blooming-fast-superior-soluble-fertiliser?source=bloomingfast.com" class="button wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s" target="_blank" rel="noopener" aria-label="Buy from YouGarden"><img src="{{ asset('images/yglogosmall.png') }}" alt="YouGarden" loading="lazy" /></a></li>
                            <li><a href="https://www.amazon.co.uk/Bloomiing-Soluble-Planter-Fertilsier-litres/dp/B079HYNNN4/ref=sr_1_1?ie=UTF8&amp;qid=1522915651&amp;sr=8-1&amp;keywords=blooming+fast+superior" class="button wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s" target="_blank" rel="noopener" aria-label="Buy from Amazon"><img src="{{ asset('images/amazoncolour.png') }}" alt="Amazon" loading="lazy" /></a></li>
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
                        {!! webp_picture('images/superiorV4.png', 'Superior Plant Food', ['style' => 'z-index: 999;', 'loading' => 'eager', 'fetchpriority' => 'high', 'width' => '800', 'height' => '1062']) !!}
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

<!-- Start .about-section  -->
<div id="about" class="about-section section pb-0 white-bg half-header-about about-section-bottom-curved about-section-top-curved">
    <div class="container tab-fix">
        <div class="section-head text-center">
            <div class="row">
                <div class="col-md-9 col-md-offset-1">
                    <h2 class="heading">About <span>Superior Plant Food PLUS</span></h2>
                    <p class="lead">For stunning displays of first-class flowers and vegetables, this superior plant food is a high potency, professional grade fertiliser for use all year round in your garden, simply mix with water for incredible results.</p>
                    <ul class="about-features-stacked">
                        <li class="about-feature-stacked-item" data-animation-delay="0">
                            <div class="about-feature-title"><strong>PACKED</strong></div>
                            <div class="about-feature-content">with Potash for flowers, fruits and veg</div>
                        </li>
                        <li class="about-feature-stacked-item" data-animation-delay="150">
                            <div class="about-feature-title"><strong>JAMMED</strong></div>
                            <div class="about-feature-content">with nitrogen and phosphorous for healthy leaves, shoots and roots</div>
                        </li>
                        <li class="about-feature-stacked-item" data-animation-delay="300">
                            <div class="about-feature-title"><strong>BRIMMING</strong></div>
                            <div class="about-feature-content">with 7 vital trace elements for maximum health</div>
                        </li>
                        <li class="about-feature-stacked-item" data-animation-delay="450">
                            <div class="about-feature-title"><strong>Plus</strong></div>
                            <div class="about-feature-content">we've added the magic ingredient – Humic Acid – to BOOST your plants</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- .section-head -->
        
        <!-- Video on Top -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="video about-section-video" style="margin-bottom: 40px;">
                    {!! webp_picture('images/video.png', 'about-video', ['width' => '800', 'height' => '450', 'loading' => 'lazy']) !!}
                    <div class="video-overlay gradiant-background"></div>
                    <a href="https://vimeo.com/170471588" class="video-play" data-effect="mfp-3d-unfold" aria-label="Play Superior Soluble Fertiliser video"><i class="fa fa-play" aria-hidden="true"></i><span class="sr-only">Play video</span></a>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
        
        <!-- Paragraph and Buttons Below -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="txt-entry text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">
                    <p class="lead">Supplied in a resealable pouch, Superior Plant Food Plus is easy to dissolve in water, giving fast-acting results as it is delivered straight to the plant's roots and leaves.</p>
                    <p>Superior by name and Superior by nature, the only fertiliser you need for your garden for more flowers and more fruit, as well as better roots and shoots too. You can transform the performance of your plants with regular feeding throughout the main growing season.</p>
                    <p>Simple to use, just add one 5g scoop, included in the pack, to a gallon of water (4.5 litres) or a standard watering can full, and simply water on weekly during the growing season.</p>
                    <div class="mt-40 about-buttons">
                        <a href="#products" class="button button-primary" aria-label="View all products">View All Products</a>
                        <a href="#videos" class="button button-secondary" aria-label="View product videos">View Videos</a>
                    </div>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
        
    </div><!-- .container -->
</div><!-- .about-section  -->

<!-- Curved divider between white and gradient sections - Top divider for "What's in our Superior Plant Food" -->
<div class="section-divider-wave section-divider-mobile-hide" style="height: 200px; width: 100%; overflow: visible; background: linear-gradient(293deg, #70D969 0%, #19B2EB 100%); margin-top: 0px; position: relative; z-index: 1; padding-top: 0px;">
    <img src="/images/carb.png" alt="" role="presentation" aria-hidden="true" class="carb-image-mobile-hide" style="width: 100%; height: 100%; object-fit: fill; object-position: top center; display: block; transform: scaleY(-1);">
</div>

<!-- Start .features-section  -->
<div id="features" class="features-section section gradiant-background header-curbed confetti-section" style="background-color: #70D969 !important; background-image: linear-gradient(293deg, #70D969 0%, #19B2EB 100%) !important;">
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
                                {!! webp_picture('images/superiorback.png', 'Superior Plant Food', ['loading' => 'lazy', 'decoding' => 'async']) !!}
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

<!-- Curved divider at bottom of features section - Bottom divider for "What's in our Superior Plant Food" -->
<div class="section-divider-wave section-divider-wave-bottom" style="height: 450px; width: 100%; overflow: hidden; background: linear-gradient(293deg, #70D969 0%, #19B2EB 100%);">
    <img src="/images/carb.png" alt="" role="presentation" aria-hidden="true" class="carb-divider-image" style="width: 100%;height: 100%;object-fit: cover;object-position: bottom center;display: block; transform: scaleY(-1);">
</div>

<!-- Start .customer-reviews-section  -->
<div id="customer-reviews" class="customer-reviews-section customer-reviews-curved-top customer-reviews-curved-bottom section white-bg pt-80 pb-80">
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
                    <div class="feefo-mobile-widget">
                        <div id="feefo-product-review-widgetId" class="feefo-review-widget-product" data-product-sku="630050" data-feefo-initialized="true" style="flex: 1 1 auto;"></div>
                </div>
                    
                    <!-- Testimonials Carousel (Hidden - Fallback) -->
                    <div id="testimonialsCarousel" class="carousel slide testimonials-carousel" style="display: none;" data-ride="carousel" data-interval="5000">
                        <!-- Carousel Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#testimonialsCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#testimonialsCarousel" data-slide-to="1"></li>
                            <li data-target="#testimonialsCarousel" data-slide-to="2"></li>
                        </ol>
                        
                        <!-- Carousel Items -->
                        <div class="carousel-inner testimonials-carousel-inner" role="listbox" aria-live="polite">
                            <div class="item active">
                                <div class="testimonial-card">
                                    <div class="testimonial-rating mb-15">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                        </div>
                                    <p class="testimonial-text">"Absolutely fantastic product! My roses have never looked better. The blooms are bigger and more vibrant than ever before."</p>
                                    <div class="testimonial-author">- Sarah M.</div>
                            </div>
                        </div>
                            <div class="item">
                                <div class="testimonial-card">
                                    <div class="testimonial-rating mb-15">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                    </div>
                                    <p class="testimonial-text">"Best fertiliser I've ever used. My entire garden is thriving - flowers, vegetables, everything! Highly recommend."</p>
                                    <div class="testimonial-author">- John D.</div>
                </div>
                        </div>
                            <div class="item">
                                <div class="testimonial-card">
                                    <div class="testimonial-rating mb-15">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                            </div>
                                    <p class="testimonial-text">"Great value for money. One bag makes so much feed and the results are incredible. My plants love it!"</p>
                                    <div class="testimonial-author">- Emma T.</div>
                        </div>
                    </div>
                </div>
                
                        <!-- Carousel Controls -->
                        <a class="left carousel-control" href="#testimonialsCarousel" role="button" data-slide="prev" aria-label="Previous testimonial">
                            <span class="fa fa-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#testimonialsCarousel" role="button" data-slide="next" aria-label="Next testimonial">
                            <span class="fa fa-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>
                            </div>
                        </div>
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .customer-reviews-section  -->

<!-- Products Section Top Divider - Top divider for "Our Complete Product Range" -->
<div class="section-divider-wave section-divider-mobile-hide" style="height: 200px; width: 100%; overflow: visible; background: linear-gradient(293deg, #70D969 0%, #19B2EB 100%); margin-top: 0px; position: relative; z-index: 1; padding-top: 0px;">
    <img src="/images/carb.png" alt="" role="presentation" aria-hidden="true" class="carb-image-mobile-hide" style="width: 100%; height: 100%; object-fit: fill; object-position: top center; display: block; transform: scaleY(-1);">
</div>

<!-- Start .products-section  -->
<div id="products" class="products-section section gradiant-background pt-120 pb-120 products-section-bottom-curved" style="background-color: #70D969 !important; background-image: linear-gradient(293deg, #70D969 0%, #19B2EB 100%) !important;">
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
                @forelse($products ?? [] as $index => $product)
                <div class="col-md-4 col-sm-6 mb-40 product-card-wrapper">
                    <div class="product-card white-bg text-center wow fadeInUp" 
                         data-wow-duration=".5s" 
                         data-wow-delay="{{ ($index * 0.1) }}s">
                        <a href="{{ route('product.show', $product->slug) }}" class="product-card-link" aria-label="View {{ $product->title }}">
                            <div class="product-image mb-20" style="position: relative;">
                                @if($index < 2)
                                <span class="best-seller-badge">Best Seller</span>
                                @endif
                                {!! $product->image ? webp_picture($product->image, $product->title, ['class' => 'img-responsive', 'loading' => 'lazy', 'decoding' => 'async']) : webp_picture('images/superiorV4.png', $product->title, ['class' => 'img-responsive', 'loading' => 'lazy', 'decoding' => 'async']) !!}
                            </div>
                            <div class="product-details p-30">
                                <h4 class="product-title mb-15">{{ $product->title }}</h4>
                                <p class="product-description mb-20">{{ $product->description ?? '' }}</p>
                                @if($product->badge_1 || $product->badge_2)
                                <div class="product-specs mb-20">
                                    @if($product->badge_1)
                                        <span class="badge">{{ strtoupper(trim($product->badge_1)) }}</span>
                                    @endif
                                    @if($product->badge_2)
                                        <span class="badge">{{ strtoupper(trim($product->badge_2)) }}</span>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </a>
                        <ul class="product-buttons">
                            @if($product->yg_link)
                            <li><a href="{{ $product->yg_link }}{{ strpos($product->yg_link, '?') !== false ? '&' : '?' }}source=bloomingfast.com" class="product-button btn-buy-yg" target="_blank" rel="noopener" aria-label="Buy {{ $product->title }} from YouGarden">
                                {!! webp_picture('images/yglogosmall.png', 'YouGarden', ['loading' => 'lazy']) !!}
                            </a></li>
                            @endif
                            @if($product->amazon_link)
                            <li><a href="{{ $product->amazon_link }}" class="product-button btn-buy-amazon" target="_blank" rel="noopener" aria-label="Buy {{ $product->title }} from Amazon">
                                {!! webp_picture('images/amazoncolour.png', 'Amazon', ['loading' => 'lazy']) !!}
                            </a></li>
                            @endif
                        </ul>
                        @if($product->sku)
                        <!-- Feefo Review Badge (Desktop Only) -->
                        <div class="product-review-badge-desktop">
                            <div class="feefo-review-badge-wrapper-product" data-product-sku="{{ $product->sku }}"></div>
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

<!-- Bottom divider for "Our Complete Product Range" -->
<div class="section-divider-wave section-divider-wave-product-bottom section-divider-mobile-hide" style="height: 150px; width: 100%; overflow: hidden; background: linear-gradient(293deg, #70D969 0%, #19B2EB 100%);">
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
                @php
                    // Filter products that have videos
                    $productsWithVideos = $products->filter(function($product) {
                        return !empty($product->video);
                    })->sortBy('sort_order');
                @endphp
                
                @forelse($productsWithVideos as $index => $product)
                <div class="col-md-4 col-sm-6 mb-40">
                    <div class="video-card white-bg text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay="{{ ($index % 3) * 0.1 }}s">
                        <div class="video-thumbnail">
                            @if($product->image)
                                {!! webp_picture($product->image, $product->title, ['class' => 'img-responsive', 'width' => '400', 'height' => '400', 'loading' => 'lazy']) !!}
                            @else
                                {!! webp_picture('images/superiorV4.png', $product->title, ['class' => 'img-responsive', 'width' => '400', 'height' => '400', 'loading' => 'lazy']) !!}
                            @endif
                            <div class="video-overlay gradiant-background"></div>
                            <a href="{{ $product->video }}" class="video-play" data-effect="mfp-3d-unfold" aria-label="Play {{ $product->title }} video"><i class="fa fa-play" aria-hidden="true"></i><span class="sr-only">Play video</span></a>
                        </div>
                        <div class="video-details p-30">
                            <h4 class="video-title mb-15">{{ $product->title }}</h4>
                            <p class="video-description">
                                @if(!empty($product->description))
                                    {{ Str::limit(strip_tags($product->description), 100) }}
                                @else
                                    Learn how to use {{ $product->title }} for incredible results in your garden.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <p class="text-center">No product videos available at this time.</p>
                </div>
                @endforelse
            </div><!-- .row -->
        </div><!-- .videos-content -->
    </div><!-- .container -->
</div><!-- .videos-section  -->

<!-- Product Image Zoom Overlay -->
<div class="product-image-zoom-overlay" id="productImageZoomOverlay">
    <span class="product-image-zoom-close">&times;</span>
    <img src="" alt="Zoomed Product Image" id="zoomedProductImage" />
</div>

<!-- Product Quick View Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="productModalLabel">Product Quick View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="productModalCarousel" class="carousel slide product-modal-carousel" data-ride="carousel" data-interval="false">
                            <!-- Indicators -->
                            <ol class="carousel-indicators" id="modalCarouselIndicators">
                            </ol>
                            
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox" id="modalCarouselInner" aria-live="polite">
                            </div>
                            
                            <!-- Controls -->
                            <a class="left carousel-control" href="#productModalCarousel" role="button" data-slide="prev" id="modalCarouselPrev" aria-label="Previous product image">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#productModalCarousel" role="button" data-slide="next" id="modalCarouselNext" aria-label="Next product image">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2 id="modalProductTitle" class="product-modal-title"></h2>
                        <p id="modalProductDescription" class="product-modal-description"></p>
                        <div id="modalProductSpecs" class="product-modal-specs mb-20"></div>
                        
                        <!-- Collapsible Sections -->
                        <div class="panel-group accordion" id="productModalAccordion" role="tablist" aria-multiselectable="true" style="margin-top: 20px; margin-bottom: 20px;">
                            
                            <!-- Full Description -->
                            <div class="panel panel-default product-modal-full-description" id="modalProductFullDescriptionSection">
                                <div class="panel-heading" role="tab" id="modalProductFullDescriptionHeading">
                                    <h4 class="panel-title">
                                        <a role="button" id="modalProductFullDescriptionButton" data-toggle="collapse" data-parent="#productModalAccordion" href="#modalProductFullDescriptionCollapse" aria-expanded="false" aria-controls="modalProductFullDescriptionCollapse" class="collapsed">
                                            Full Description <i class="fa fa-chevron-down pull-right"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="modalProductFullDescriptionCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="modalProductFullDescriptionHeading">
                                    <div class="panel-body">
                                        <div id="modalProductFullDescriptionText" class="product-modal-content-text"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Key Features -->
                            <div class="panel panel-default" id="modalProductFeaturesSection">
                                <div class="panel-heading" role="tab" id="modalProductFeaturesHeading">
                                    <h4 class="panel-title">
                                        <a role="button" id="modalProductFeaturesButton" data-toggle="collapse" data-parent="#productModalAccordion" href="#modalProductFeaturesCollapse" aria-expanded="false" aria-controls="modalProductFeaturesCollapse" class="collapsed">
                                            Key Features <i class="fa fa-chevron-down pull-right"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="modalProductFeaturesCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="modalProductFeaturesHeading">
                                    <div class="panel-body">
                                        <ul id="modalProductFeaturesList" class="product-features-list"></ul>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Videos -->
                            <div class="panel panel-default product-modal-videos" id="modalProductVideosSection">
                                <div class="panel-heading" role="tab" id="modalProductVideosHeading">
                                    <h4 class="panel-title">
                                        <a role="button" id="modalProductVideosButton" data-toggle="collapse" data-parent="#productModalAccordion" href="#modalProductVideosCollapse" aria-expanded="false" aria-controls="modalProductVideosCollapse" class="collapsed">
                                            Videos <i class="fa fa-chevron-down pull-right"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="modalProductVideosCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="modalProductVideosHeading">
                                    <div class="panel-body">
                                        <div id="modalProductVideosContent" class="product-modal-content-text"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Application -->
                            <div class="panel panel-default" id="modalProductApplicationSection">
                                <div class="panel-heading" role="tab" id="modalProductApplicationHeading">
                                    <h4 class="panel-title">
                                        <a role="button" id="modalProductApplicationButton" data-toggle="collapse" data-parent="#productModalAccordion" href="#modalProductApplicationCollapse" aria-expanded="false" aria-controls="modalProductApplicationCollapse" class="collapsed">
                                            Application <i class="fa fa-chevron-down pull-right"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="modalProductApplicationCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="modalProductApplicationHeading">
                                    <div class="panel-body">
                                        <div id="modalProductApplicationText" class="product-modal-content-text"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Delivery Info -->
                            <div class="panel panel-default product-modal-delivery" id="modalProductDeliverySection">
                                <div class="panel-heading" role="tab" id="modalProductDeliveryHeading">
                                    <h4 class="panel-title">
                                        <a role="button" id="modalProductDeliveryButton" data-toggle="collapse" data-parent="#productModalAccordion" href="#modalProductDeliveryCollapse" aria-expanded="false" aria-controls="modalProductDeliveryCollapse" class="collapsed">
                                            Delivery Information <i class="fa fa-chevron-down pull-right"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="modalProductDeliveryCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="modalProductDeliveryHeading">
                                    <div class="panel-body">
                                        <div id="modalProductDeliveryContent" class="product-modal-content-text"></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!-- Additional Details (Always Visible) -->
                        <div id="modalProductDetails" class="product-modal-details mt-20">
                            <div id="modalProductNPK" class="product-detail-item mb-15" style="display: none;">
                                <strong>NPK Ratio:</strong> <span id="modalProductNPKValue"></span>
                            </div>
                            <div id="modalProductMakes" class="product-detail-item mb-20" style="display: none;">
                                <strong>Coverage:</strong> <span id="modalProductMakesValue"></span>
                            </div>
                        </div>
                        
                        <div class="product-modal-buttons">
                            <ul class="product-buttons">
                                <li><a id="modalProductYG" href="" class="product-button" target="_blank" rel="noopener"><img src="{{ asset('images/yglogosmall.png') }}" alt="YouGarden" loading="lazy" /></a></li>
                                <li><a id="modalProductAmazon" href="" class="product-button" target="_blank" rel="noopener"><img src="{{ asset('images/amazoncolour.png') }}" alt="Amazon" loading="lazy" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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
                    <p class="lead">Find answers to common questions about our Superior Plant Food and other products</p>
                </div>
            </div>
        </div><!-- .section-head -->
        <div class="faq-alt">
            <div class="row">
                <!-- FAQ Content -->
                <div class="col-md-10 col-md-offset-1">
                    <!-- Accordion -->
                    <div class="panel-group accordion" id="faq-new-accordion" role="tablist" aria-multiselectable="true">
                        <!-- each panel for accordion -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="faq-new-accordion-i1">
                                <h6 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#faq-new-accordion" href="#faq-new-accordion-pane-i1" aria-expanded="false">
                                        How often should I use it?
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="faq-new-accordion-pane-i1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="faq-new-accordion-i1">
                                <div class="panel-body">
                                      <p>From March to April feed your plants once a week while watering.
From May to September feed your plants twice a week while watering.</p>
                                </div>
                            </div>
                        </div> 
                        <!-- each panel for accordion -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="faq-new-accordion-i2">
                                <h6 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq-new-accordion" href="#faq-new-accordion-pane-i2" aria-expanded="false">
                                        What is the NPK ratio?
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="faq-new-accordion-pane-i2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq-new-accordion-i2">
                                <div class="panel-body">
                                      <p>Superior plant food has a ratio of 18:18:24 NPK with trace elements</p>
                                </div>
                            </div>
                        </div>
                        <!-- each panel for accordion -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="faq-new-accordion-i3">
                                <h6 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq-new-accordion" href="#faq-new-accordion-pane-i3" aria-expanded="false">
                                        How do I store it?
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="faq-new-accordion-pane-i3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq-new-accordion-i3">
                                <div class="panel-body">
                                      <p>Store Superior Plant Food in a cool, dry place with the pack closed.</p>
                                </div>
                            </div>
                        </div>
                        <!-- each panel for accordion -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="faq-new-accordion-i4">
                                <h6 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq-new-accordion" href="#faq-new-accordion-pane-i4" aria-expanded="false">
                                        What kinds of watering devices can I use?
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="faq-new-accordion-pane-i4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq-new-accordion-i4">
                                <div class="panel-body">
                                      <p>The soluble powder needs to be dissolved and diluted into water at the correct rate as per the instructions, once it is dissolved / diluted it can be applied to the plants via a watering can or a jug.</p>
                                </div>
                            </div>
                        </div>
                        <!-- each panel for accordion -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="faq-new-accordion-i5">
                                <h6 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq-new-accordion" href="#faq-new-accordion-pane-i5" aria-expanded="false">
                                        Is it safe for pets and children?
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="faq-new-accordion-pane-i5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq-new-accordion-i5">
                                <div class="panel-body">
                                      <p>Best practice is to keep the powder in its original labeled container out of reach of children & pets</p>
                                </div>
                            </div>
                        </div>
                        <!-- each panel for accordion -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="faq-new-accordion-i6">
                                <h6 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq-new-accordion" href="#faq-new-accordion-pane-i6" aria-expanded="false">
                                        Can I use it in containers?
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="faq-new-accordion-pane-i6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq-new-accordion-i6">
                                <div class="panel-body">
                                      <p>Yes apply in its diluted format at least once a week as part of your normal watering.</p>
                                </div>
                            </div>
                        </div>
                        <!-- each panel for accordion -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="faq-new-accordion-i7">
                                <h6 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq-new-accordion" href="#faq-new-accordion-pane-i7" aria-expanded="false">
                                        Is it suitable for mixing with other products?
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="faq-new-accordion-pane-i7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq-new-accordion-i7">
                                <div class="panel-body">
                                      <p>Best to use it on its own and don't mix with other products … except water!</p>
                                </div>
                            </div>
                        </div>
                        <!-- each panel for accordion -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="faq-new-accordion-i8">
                                <h6 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq-new-accordion" href="#faq-new-accordion-pane-i8" aria-expanded="false">
                                        Can I overdose my plants?
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="faq-new-accordion-pane-i8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq-new-accordion-i8">
                                <div class="panel-body">
                                      <p>Yes – please follow the instructions as per the packaging</p>
                                </div>
                            </div>
                        </div>
                        <!-- each panel for accordion -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="faq-new-accordion-i9">
                                <h6 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq-new-accordion" href="#faq-new-accordion-pane-i9" aria-expanded="false">
                                        Can I water directly onto the plants?
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="faq-new-accordion-pane-i9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq-new-accordion-i9">
                                <div class="panel-body">
                                      <p>Yes you can but best practice is to wash plants with fresh water to dilute and remove any fertiliser residues.</p>
                                </div>
                            </div>
                        </div>
                        
                    </div><!-- Accordion #end -->
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
<div class="newsletter-section section pt-80 pb-80">
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
// Wait for jQuery to load before executing
(function() {
    function initJQuery() {
        if (typeof jQuery === 'undefined' || typeof $ === 'undefined') {
            setTimeout(initJQuery, 50);
            return;
        }
        
        $(document).ready(function() {
    // Start confetti animation on page load and every 10 seconds
    function triggerConfetti() {
        $('.confetti-section').each(function() {
            var $section = $(this);
            // Remove and re-add class to restart animation
            $section.removeClass('confetti-active');
            // Force reflow to restart animation
            $section[0].offsetHeight;
            setTimeout(function() {
                $section.addClass('confetti-active');
            }, 10);
        });
    }
    
    // Trigger on page load
    triggerConfetti();
    
    // Trigger every 10 seconds
    setInterval(triggerConfetti, 10000);
    
    // Confetti burst on hover for logo and hero image
    function createConfettiBurst($element) {
        var colors = ['#FF6B9D', '#FFA500', '#4ECDC4', '#98D8C8', '#BB8FCE'];
        var rect = $element[0].getBoundingClientRect();
        var centerX = rect.left + rect.width / 2;
        var centerY = rect.top + rect.height / 2;
        
        for (var i = 0; i < 30; i++) {
            var confetti = $('<div class="confetti-particle"></div>');
            var color = colors[Math.floor(Math.random() * colors.length)];
            var angle = (Math.PI * 2 * i) / 30;
            var velocity = 100 + Math.random() * 100;
            var x = Math.cos(angle) * velocity;
            var y = Math.sin(angle) * velocity;
            
            confetti.css({
                position: 'fixed',
                left: centerX + 'px',
                top: centerY + 'px',
                width: '8px',
                height: '8px',
                backgroundColor: color,
                borderRadius: '50%',
                pointerEvents: 'none',
                zIndex: 10000,
                transform: 'translate(-50%, -50%)',
                opacity: 1
            });
            
            $('body').append(confetti);
            
            confetti.animate({
                left: centerX + x + 'px',
                top: centerY + y + 'px',
                opacity: 0
            }, 1000, function() {
                $(this).remove();
            });
        }
    }
    
    $('.confetti-burst-trigger').on('mouseenter', function() {
        createConfettiBurst($(this));
    });
    // Product cards now link directly to product pages - modal functionality removed
    
    // Load Feefo product review widget script
    function loadFeefoProductReviewWidget() {
        // Load Feefo widget script if not already loaded
        if (typeof window.feefoWidgetLoaded === 'undefined') {
            var feefoScript = document.createElement('script');
            feefoScript.src = 'https://api.feefo.com/api/javascript/bloomingfast';
            feefoScript.async = true;
            feefoScript.onload = function() {
                if (typeof Feefo !== 'undefined') {
                    Feefo.init();
                }
            };
            document.head.appendChild(feefoScript);
            window.feefoWidgetLoaded = true;
        } else if (typeof Feefo !== 'undefined') {
            Feefo.init();
        }
    }
    
    // Load Feefo widget script when page is ready
    loadFeefoProductReviewWidget();
    
    // Initialize Feefo widgets in testimonials section
    function initTestimonialsFeefoWidgets() {
        // Ensure mobile widget is visible on mobile
        if (window.innerWidth <= 767) {
            var mobileWidget = document.querySelector('#customer-reviews .feefo-mobile-widget');
            if (mobileWidget) {
                mobileWidget.style.display = 'block';
                mobileWidget.style.visibility = 'visible';
                mobileWidget.style.opacity = '1';
            }
        }
        // The Feefo script should already be loaded from the layout
        // Wait for it to be available and initialize
        function checkAndInit() {
            if (typeof Feefo !== 'undefined') {
                // Initialize Feefo widgets
                Feefo.init();
                // Re-initialize after a delay to ensure widgets are rendered
                setTimeout(function() {
                    if (typeof Feefo !== 'undefined') {
                        Feefo.init();
                    }
                }, 1000);
            } else {
                // Check if script is loaded, if not wait a bit more
                setTimeout(checkAndInit, 200);
            }
        }
        
        // Start checking after page load
        $(document).ready(function() {
            // Wait a bit for scripts to load
            setTimeout(checkAndInit, 1000);
        });
    }
    
    // Initialize testimonials Feefo widgets
    initTestimonialsFeefoWidgets();
    
    // Smooth scroll for anchor links
    $('a[href^="#"]').on('click', function(e) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            e.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 100
            }, 800, 'swing');
        }
    });
    
    // Scroll to products section when clicking size badges
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
    
    // Load Feefo badge in hero section
    function loadHeroFeefoBadge() {
        // Load Feefo widget script
        if (typeof window.feefoWidgetLoaded === 'undefined') {
            var feefoScript = document.createElement('script');
            feefoScript.src = 'https://api.feefo.com/api/javascript/bloomingfast';
            feefoScript.async = true;
            feefoScript.onload = function() {
                if (typeof Feefo !== 'undefined') {
                    Feefo.init();
                }
            };
            document.head.appendChild(feefoScript);
            window.feefoWidgetLoaded = true;
        } else if (typeof Feefo !== 'undefined') {
            Feefo.init();
        }
        
        // Show fallback if badge image doesn't load (404 or other error)
        var badgeContainer = document.getElementById('feefo-badge-hero');
        var badgeImg = badgeContainer ? badgeContainer.querySelector('.hero-feefo-img') : null;
        var fallbackBadge = badgeContainer ? badgeContainer.querySelector('.feefo-fallback-badge') : null;
        var feefoWidget = badgeContainer ? badgeContainer.querySelector('.feefo-product-stars') : null;
        
        if (badgeContainer && badgeImg && fallbackBadge) {
            // Check if image loaded successfully after page load
            setTimeout(function() {
                // If image failed to load or is hidden, show fallback
                if (badgeImg.offsetHeight === 0 || badgeImg.style.display === 'none' || badgeImg.complete === false) {
                    // Try widget first
                    if (feefoWidget) {
                        feefoWidget.style.display = 'block';
                        setTimeout(function() {
                            if (!feefoWidget.innerHTML || feefoWidget.offsetHeight === 0) {
                                feefoWidget.style.display = 'none';
                                fallbackBadge.style.display = 'block';
                            }
                        }, 1500);
                    } else {
                        fallbackBadge.style.display = 'block';
                    }
                }
            }, 2000);
        }
    }
    
    // Load Feefo badge when page is ready
    loadHeroFeefoBadge();
    
    // Scroll-triggered slide-in animation for About section features (Mobile only)
    function animateStackedItems() {
        const items = document.querySelectorAll('.about-feature-stacked-item');
        if (items.length === 0) return;
        
        // On desktop, ensure items are visible immediately
        if (window.innerWidth > 767) {
            items.forEach(item => {
                item.style.opacity = '1';
                item.style.visibility = 'visible';
                item.style.transform = 'translateY(0)';
                item.classList.add('animate-in');
            });
            return;
        }
        
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const delay = parseInt(entry.target.getAttribute('data-animation-delay')) || 0;
                    setTimeout(() => {
                        entry.target.classList.add('animate-in');
                    }, delay);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        items.forEach(item => {
            observer.observe(item);
        });
    }
    
    // Re-run on window resize to handle orientation changes
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            // Re-initialize animations if switching between mobile/desktop
            const items = document.querySelectorAll('.about-feature-stacked-item');
            if (window.innerWidth <= 767) {
                // Mobile: reset and re-animate
                items.forEach(item => {
                    item.classList.remove('animate-in');
                });
                animateStackedItems();
            } else {
                // Desktop: ensure visible
                items.forEach(item => {
                    item.classList.add('animate-in');
                });
            }
        }, 250);
    });
    
    // Scroll-triggered animation for About section video
    function animateAboutVideo() {
        const video = document.querySelector('.about-section-video');
        if (!video) return;
        
        const observerOptions = {
            threshold: 0.2,
            rootMargin: '0px 0px -100px 0px'
        };
        
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('animate-in');
                    }, 200);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        observer.observe(video);
    }
    
    // Ensure about section video is visible on page load
    function initAboutSectionVideo() {
        const aboutVideo = document.querySelector('.about-section-video');
        if (aboutVideo) {
            aboutVideo.style.opacity = '1';
            aboutVideo.style.visibility = 'visible';
            aboutVideo.style.transform = 'translateY(0) scale(1)';
            aboutVideo.classList.add('animate-in');
        }
    }
    
    // Initialize about section video immediately
    initAboutSectionVideo();
    
    // Scroll-triggered animation for "What's in our Superior Plant Food" section
    function animateFeaturesSection() {
        const section = document.querySelector('.features-section');
        if (!section) return;
        
        // Animate section title
        const sectionHead = section.querySelector('.section-head');
        const cards = section.querySelectorAll('.feature-nutrient-card');
        const productImage = section.querySelector('.features-product-image');
        
        // Ensure section head is visible immediately
        if (sectionHead) {
            sectionHead.style.opacity = '1';
            sectionHead.style.visibility = 'visible';
            sectionHead.style.transform = 'translateY(0)';
            sectionHead.classList.add('animate-in');
        }
        
        // Ensure cards are visible immediately (don't wait for animation)
        cards.forEach(card => {
            card.style.opacity = '1';
            card.style.visibility = 'visible';
            card.style.transform = 'translateY(0)';
            card.classList.add('animate-in');
        });
        
        if (productImage) {
            productImage.style.opacity = '1';
            productImage.style.visibility = 'visible';
            productImage.style.transform = 'translateY(0) scale(1)';
            productImage.classList.add('animate-in');
        }
        
        // Check if already in view on page load
        const rect = section.getBoundingClientRect();
        const isInView = rect.top < window.innerHeight && rect.bottom > 0;
        
        if (isInView && !sectionHead.classList.contains('animate-in')) {
            // Section is already visible, trigger animation immediately
            setTimeout(() => {
                if (sectionHead) {
                    sectionHead.classList.add('animate-in');
                }
                cards.forEach((card, index) => {
                    setTimeout(() => {
                        card.classList.add('animate-in');
                    }, 300 + (index * 100));
                });
                if (productImage) {
                    setTimeout(() => {
                        productImage.classList.add('animate-in');
                    }, 500);
                }
            }, 100);
        }
        
        const observerOptions = {
            threshold: 0.15,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    // Animate title first
                    if (sectionHead && !sectionHead.classList.contains('animate-in')) {
                        setTimeout(() => {
                            sectionHead.classList.add('animate-in');
                        }, 100);
                    }
                    
                    // Animate cards with staggered delay
                    cards.forEach((card, index) => {
                        if (!card.classList.contains('animate-in')) {
                            setTimeout(() => {
                                card.classList.add('animate-in');
                            }, 300 + (index * 100));
                        }
                    });
                    
                    // Animate product image
                    if (productImage && !productImage.classList.contains('animate-in')) {
                        setTimeout(() => {
                            productImage.classList.add('animate-in');
                        }, 500);
                    }
                    
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        observer.observe(section);
    }
    
    // Initialize animations when DOM is ready
    $(document).ready(function() {
        animateStackedItems();
        animateAboutVideo();
        animateFeaturesSection();
        
        // Initialize Magnific Popup for videos - wait for library to load
        function initMagnificPopup() {
            if (typeof $.magnificPopup !== 'undefined' && $.magnificPopup) {
                var $video_play = $('.video-play');
                if ($video_play.length > 0) {
                    $video_play.magnificPopup({
                        type: 'iframe',
                        removalDelay: 160,
                        preloader: true,
                        mainClass: 'mfp-fade',
                        iframe: {
                            patterns: {
                                vimeo: {
                                    index: 'vimeo.com/',
                                    id: function(url) {
                                        var m = url.match(/vimeo.com\/(\d+)/);
                                        if (m) return m[1];
                                        return null;
                                    },
                                    src: 'https://player.vimeo.com/video/%id%?autoplay=1'
                                },
                                youtube: {
                                    index: 'youtube.com/',
                                    id: function(url) {
                                        var m = url.match(/[?&]v=([^&]+)/);
                                        if (m) return m[1];
                                        m = url.match(/youtu.be\/([^?]+)/);
                                        if (m) return m[1];
                                        return null;
                                    },
                                    src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                                }
                            }
                        }
                    });
                    console.log('Magnific Popup initialized for ' + $video_play.length + ' video(s)');
                }
            } else {
                // Retry after a short delay if Magnific Popup isn't loaded yet
                setTimeout(initMagnificPopup, 100);
            }
        }
        
        // Start initialization
        initMagnificPopup();
    });
    
    // Mobile Navigation - Full screen popup functionality
    var $navbarCollapse = $('#site-collapse-nav');
    var $navbarToggle = $('.navbar-toggle');
    var $body = $('body');
    
    // Handle menu open/close and body scroll lock
    $navbarCollapse.on('show.bs.collapse shown.bs.collapse', function() {
        if ($(window).width() <= 767) {
            $body.addClass('mobile-menu-open');
            $('#mobileMenuCloseBtn').css('display', 'flex');
        }
    });
    
    $navbarCollapse.on('hide.bs.collapse hidden.bs.collapse', function() {
        $body.removeClass('mobile-menu-open');
        $('#mobileMenuCloseBtn').css('display', 'none');
    });
    
    // Close menu when clicking on close button
    $('#mobileMenuCloseBtn').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        if ($(window).width() <= 767) {
            $navbarCollapse.collapse('hide');
        }
    });
    
    // Close menu when clicking outside (on menu background, not on nav links)
    $(document).on('click', function(e) {
        if ($(window).width() <= 767 && $navbarCollapse.hasClass('in')) {
            // Don't close if clicking on nav links, toggle button, or close button
            if ($navbarCollapse.find('.navbar-nav').is(e.target) || 
                $navbarCollapse.find('.navbar-nav').has(e.target).length > 0 || 
                $navbarToggle.is(e.target) || 
                $navbarToggle.has(e.target).length > 0 ||
                $('#mobileMenuCloseBtn').is(e.target) ||
                $('#mobileMenuCloseBtn').has(e.target).length > 0) {
                return;
            }
            
            // Close menu when clicking on menu background
            if ($navbarCollapse.is(e.target)) {
                $navbarCollapse.collapse('hide');
            }
        }
    });
    
    // Prevent clicks inside the mobile menu from closing it
    $('#site-collapse-nav .navbar-nav').on('click', function(e) {
        e.stopPropagation();
    });
    
    // Testimonials carousel - show multiple items with partial visibility
    function initTestimonialsCarousel() {
        var $carousel = $('#testimonialsCarousel');
        var $inner = $carousel.find('.carousel-inner');
        var $items = $inner.find('.item');
        
        // Set up initial classes
        $items.each(function(index) {
            $(this).removeClass('active prev next');
            if (index === 0) {
                $(this).addClass('active');
            } else if (index === 1) {
                $(this).addClass('next');
            } else if (index === $items.length - 1) {
                $(this).addClass('prev');
            }
        });
        
        // Update carousel on slide
        $carousel.on('slide.bs.carousel', function(e) {
            var $items = $inner.find('.item');
            var activeIndex = $(e.relatedTarget).index();
            
            $items.removeClass('active prev next');
            $items.eq(activeIndex).addClass('active');
            
            // Set prev item
            var prevIndex = activeIndex > 0 ? activeIndex - 1 : $items.length - 1;
            $items.eq(prevIndex).addClass('prev');
            
            // Set next item
            var nextIndex = activeIndex < $items.length - 1 ? activeIndex + 1 : 0;
            $items.eq(nextIndex).addClass('next');
        });
        
        // Update on slid event (after transition)
        $carousel.on('slid.bs.carousel', function(e) {
            var $items = $inner.find('.item');
            var activeIndex = $(e.relatedTarget).index();
            
            $items.removeClass('active prev next');
            $items.eq(activeIndex).addClass('active');
            
            var prevIndex = activeIndex > 0 ? activeIndex - 1 : $items.length - 1;
            $items.eq(prevIndex).addClass('prev');
            
            var nextIndex = activeIndex < $items.length - 1 ? activeIndex + 1 : 0;
            $items.eq(nextIndex).addClass('next');
        });
    }
    
    // Initialize testimonials carousel
    if ($('#testimonialsCarousel').length) {
        initTestimonialsCarousel();
    }
    
    // Product Image Zoom Functionality
    $(document).on('click', '.product-modal-carousel .item img', function(e) {
        e.stopPropagation();
        var zoomImage = $(this).closest('.item').data('zoom-image') || $(this).attr('src');
        $('#zoomedProductImage').attr('src', zoomImage);
        $('#productImageZoomOverlay').addClass('active');
        $('body').css('overflow', 'hidden');
    });
    
    // Close zoom overlay
    $('#productImageZoomOverlay, .product-image-zoom-close').on('click', function(e) {
        if (e.target === this || $(e.target).hasClass('product-image-zoom-close')) {
            $('#productImageZoomOverlay').removeClass('active');
            $('body').css('overflow', '');
        }
    });
    
    // Close zoom on ESC key
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape' && $('#productImageZoomOverlay').hasClass('active')) {
            $('#productImageZoomOverlay').removeClass('active');
            $('body').css('overflow', '');
        }
    });
        });
    }
    
    // Start checking for jQuery
    initJQuery();
})();

// Newsletter Form Submission - Wait for jQuery
(function() {
    function initNewsletter() {
        if (typeof jQuery === 'undefined' || typeof $ === 'undefined') {
            setTimeout(initNewsletter, 50);
            return;
        }
        
        $('#newsletterForm').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var email = $('#newsletterEmail').val();
            var messageDiv = $('#newsletterMessage');
            var submitBtn = form.find('button[type="submit"]');
            
            // Disable submit button
            submitBtn.prop('disabled', true).text('Subscribing...');
            messageDiv.hide();
            
            $.ajax({
                url: '{{ route("newsletter.subscribe") }}',
                method: 'POST',
                data: {
                    email: email,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    messageDiv.removeClass('error').addClass('success')
                        .text(response.message).fadeIn();
                    form[0].reset();
                    submitBtn.prop('disabled', false).text('Subscribe');
                },
                error: function(xhr) {
                    var errorMsg = 'An error occurred. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    }
                    messageDiv.removeClass('success').addClass('error')
                        .text(errorMsg).fadeIn();
                    submitBtn.prop('disabled', false).text('Subscribe');
                }
            });
        });
    }
    
    initNewsletter();
})();

// Exit Intent Popup - Enhanced - Wait for jQuery
(function() {
    function initExitIntent() {
        if (typeof jQuery === 'undefined' || typeof $ === 'undefined') {
            setTimeout(initExitIntent, 50);
            return;
        }
        
        var exitIntentShown = localStorage.getItem('exitIntentShown');
        var mouseY = 0;
        var popupShown = false;
        
        // Enhanced popup design
        var exitIntentPopup = $('<div class="exit-intent-popup" id="exitIntentPopup">' +
        '<div class="exit-intent-popup-content">' +
        '<button class="exit-intent-popup-close" aria-label="Close">&times;</button>' +
        '<div class="exit-intent-popup-header">' +
        '<div class="exit-intent-icon">🌱</div>' +
        '<h2>Wait! Don\'t Miss Out</h2>' +
        '<p class="exit-intent-subtitle">Get exclusive gardening tips, seasonal guides, and special offers delivered to your inbox!</p>' +
        '</div>' +
        '<div class="exit-intent-benefits">' +
        '<div class="exit-intent-benefit-item">' +
        '<i class="fa fa-check-circle"></i>' +
        '<span>Expert gardening advice</span>' +
        '</div>' +
        '<div class="exit-intent-benefit-item">' +
        '<i class="fa fa-check-circle"></i>' +
        '<span>Seasonal planting guides</span>' +
        '</div>' +
        '<div class="exit-intent-benefit-item">' +
        '<i class="fa fa-check-circle"></i>' +
        '<span>Exclusive product offers</span>' +
        '</div>' +
        '</div>' +
        '<form id="exitIntentNewsletterForm" class="exit-intent-form">' +
        '<div class="exit-intent-input-group">' +
        '<input type="email" name="email" class="form-control exit-intent-input" placeholder="Enter your email address" required>' +
        '<button type="submit" class="btn exit-intent-submit-btn">Subscribe Now</button>' +
        '</div>' +
        '<p class="exit-intent-privacy">We respect your privacy. Unsubscribe at any time.</p>' +
        '</form>' +
        '<div id="exitIntentMessage" class="exit-intent-message" style="display: none;"></div>' +
        '</div>' +
        '</div>');
    
    $('body').append(exitIntentPopup);
    
    // Track mouse movement - only trigger when moving toward top of page
    $(document).on('mousemove', function(e) {
        mouseY = e.clientY;
    });
    
    // Exit intent detection - only when user moves mouse to top (indicating tab close)
    $(document).on('mouseleave', function(e) {
        // Only trigger if:
        // 1. Mouse is moving upward (clientY <= 0 means leaving from top)
        // 2. User hasn't seen popup in this session
        // 3. User has been on page for at least 5 seconds
        // 4. Popup hasn't been shown yet
        if (e.clientY <= 0 && !exitIntentShown && !popupShown && mouseY < 100) {
            // Check if user has been on page for a bit
            var timeOnPage = performance.now() / 1000; // seconds
            if (timeOnPage > 5) {
                popupShown = true;
                $('#exitIntentPopup').addClass('active');
                $('body').css('overflow', 'hidden');
            }
        }
    });
    
    // Also detect when user tries to close tab/window
    window.addEventListener('beforeunload', function(e) {
        if (!exitIntentShown && !popupShown) {
            // This will show browser's default dialog, but we can't prevent it
            // The mouseleave detection above is better
        }
    });
    
    // Close popup
    $(document).on('click', '.exit-intent-popup-close, .exit-intent-popup', function(e) {
        if (e.target === this || $(e.target).hasClass('exit-intent-popup-close')) {
            $('#exitIntentPopup').removeClass('active');
            $('body').css('overflow', '');
            localStorage.setItem('exitIntentShown', 'true');
            exitIntentShown = 'true';
        }
    });
    
    // Prevent form submission from closing popup
    $(document).on('click', '.exit-intent-popup-content', function(e) {
        e.stopPropagation();
    });
    
    // Exit intent form submission
    $(document).on('submit', '#exitIntentNewsletterForm', function(e) {
        e.preventDefault();
        var form = $(this);
        var email = form.find('input[name="email"]').val();
        var messageDiv = $('#exitIntentMessage');
        var submitBtn = form.find('button[type="submit"]');
        
        submitBtn.prop('disabled', true).text('Subscribing...');
        
        $.ajax({
            url: '{{ route("newsletter.subscribe") }}',
            method: 'POST',
            data: {
                email: email,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                messageDiv.removeClass('error').addClass('success')
                    .text(response.message).show();
                setTimeout(function() {
                    $('#exitIntentPopup').removeClass('active');
                    $('body').css('overflow', '');
                    localStorage.setItem('exitIntentShown', 'true');
                    exitIntentShown = 'true';
                }, 2000);
            },
            error: function(xhr) {
                var errorMsg = 'An error occurred. Please try again.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                messageDiv.removeClass('success').addClass('error')
                    .text(errorMsg).show();
                submitBtn.prop('disabled', false).text('Subscribe Now');
            }
        });
    });
    }
    
    initExitIntent();
    
    // Reading progress indicator for home page
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

// Match carb.png image gradient to match the appropriate section
// Dividers BEFORE a section should match that section
// Dividers AFTER a section (like -bottom) should match the section above them
(function() {
    // IMMEDIATE FIX: Inject style tag to prevent red dividers before anything else loads
    (function() {
        var style = document.createElement('style');
        style.id = 'prevent-red-dividers-immediate';
        style.textContent = 'body:not(:has(.product-page-hero)) .section-divider-wave, body:not(:has(.product-page-hero)) .section-divider-wave-bottom, body:not(:has(.product-page-hero)) .section-divider-wave-product-bottom { background: linear-gradient(293deg, #70D969 0%, #19B2EB 100%) !important; background-color: #70D969 !important; background-image: linear-gradient(293deg, #70D969 0%, #19B2EB 100%) !important; filter: none !important; } body:not(:has(.product-page-hero)) .section-divider-wave::after, body:not(:has(.product-page-hero)) .section-divider-wave-bottom::after, body:not(:has(.product-page-hero)) .section-divider-wave-product-bottom::after { background: linear-gradient(293deg, #70D969 0%, #19B2EB 100%) !important; background-color: #70D969 !important; background-image: linear-gradient(293deg, #70D969 0%, #19B2EB 100%) !important; filter: none !important; }';
        if (document.head) {
            document.head.insertBefore(style, document.head.firstChild);
        } else {
            document.addEventListener('DOMContentLoaded', function() {
                document.head.insertBefore(style, document.head.firstChild);
            });
        }
    })();
    
    function updateDividerGradients() {
        // Don't run on product pages - they have their own color logic
        if (document.querySelector('.product-page-hero')) {
            return;
        }
        
        // Homepage dividers should use hero gradient (same as hero and sections)
        var homepageGradient = 'linear-gradient(293deg, #70D969 0%, #19B2EB 100%)';
        var homepageBlue = '#70D969'; // For solid color fallback
        
        // Handle all section-divider-wave elements including section-divider-wave-bottom
        // Exclude FAQ dividers which should always be grey, and footer divider which should always be white
        var dividers = document.querySelectorAll('.section-divider-wave:not(#divider-faq-top):not(#divider-faq-bottom), .section-divider-wave-bottom:not(#divider-faq-top):not(#divider-faq-bottom), .section-divider-wave-product-bottom');
        dividers.forEach(function(divider) {
            // Skip FAQ dividers - they should always be grey
            if (divider.id === 'divider-faq-top' || divider.id === 'divider-faq-bottom') {
                return;
            }
            // Skip footer divider - it should always be white
            var isFooterDivider = divider.nextElementSibling && divider.nextElementSibling.classList && divider.nextElementSibling.classList.contains('footer-section');
            if (isFooterDivider) {
                return;
            }
            
            // For homepage, force hero gradient (same as hero and sections) - NEVER red
            // Explicitly remove any red colors first
            divider.style.removeProperty('background');
            divider.style.removeProperty('background-color');
            divider.style.removeProperty('background-image');
            divider.style.setProperty('background', homepageGradient, 'important');
            divider.style.setProperty('background-color', homepageBlue, 'important');
            divider.style.setProperty('background-image', homepageGradient, 'important');
            divider.style.setProperty('--divider-bg-color', homepageBlue, 'important');
            divider.style.setProperty('--divider-gradient', homepageGradient, 'important');
            // Explicitly prevent any red color values
            divider.style.setProperty('filter', 'none', 'important');
            
            // Update ::after pseudo-element to use hero gradient - NEVER red
            var dividerId = divider.id || 'divider-' + Math.random().toString(36).substr(2, 9);
            if (!divider.id) {
                divider.id = dividerId;
            }
            var styleId = 'homepage-divider-style-' + dividerId;
            var existingStyle = document.getElementById(styleId);
            if (existingStyle) {
                existingStyle.remove();
            }
            // Create comprehensive style that overrides everything
            var style = document.createElement('style');
            style.id = styleId;
            style.textContent = '#' + dividerId + '::after { background: ' + homepageGradient + ' !important; background-color: ' + homepageBlue + ' !important; background-image: ' + homepageGradient + ' !important; filter: none !important; -webkit-filter: none !important; opacity: 1 !important; visibility: visible !important; display: block !important; z-index: 1 !important; } ' +
                '#' + dividerId + ' { background: ' + homepageGradient + ' !important; background-color: ' + homepageBlue + ' !important; background-image: ' + homepageGradient + ' !important; filter: none !important; -webkit-filter: none !important; }';
            document.head.appendChild(style);
            
            // Also directly manipulate the ::after by creating an overlay if needed
            // Remove any existing overlay
            var existingOverlay = divider.querySelector('.divider-overlay-fix');
            if (existingOverlay) {
                existingOverlay.remove();
            }
            // Create a visible overlay that forces the correct color
            var overlay = document.createElement('div');
            overlay.className = 'divider-overlay-fix';
            overlay.style.cssText = 'position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: ' + homepageGradient + ' !important; background-color: ' + homepageBlue + ' !important; z-index: 2; pointer-events: none; -webkit-mask-image: url("/images/carb.png"); mask-image: url("/images/carb.png"); -webkit-mask-size: 100% 100%; mask-size: 100% 100%; -webkit-mask-repeat: no-repeat; mask-repeat: no-repeat; -webkit-mask-position: center; mask-position: center; transform: scaleY(-1);';
            divider.style.position = 'relative';
            divider.appendChild(overlay);
            
            return; // Skip the rest of the logic for homepage dividers
            var targetSection = null;
            var computedStyle = null;
            var backgroundImage = null;
            var backgroundColor = null;
            
            // Save inline background before we modify it (for fallback)
            var inlineBackground = divider.style.background || divider.style.backgroundImage;
            
            // Check if this is a bottom divider (comes AFTER a section)
            var isBottomDivider = divider.classList.contains('section-divider-wave-bottom') || 
                                  divider.classList.contains('section-divider-wave-product-bottom');
            
            if (isBottomDivider) {
                // For bottom dividers, get gradient from the PREVIOUS section (the one above)
                var prevSection = divider.previousElementSibling;
                
                // Keep looking for the previous section element (skip comments, text nodes, etc.)
                while (prevSection && (!prevSection.classList || !prevSection.classList.contains('section'))) {
                    prevSection = prevSection.previousElementSibling;
                }
                
                if (prevSection) {
                    targetSection = prevSection;
                }
            } else {
                // For top dividers, get gradient from the NEXT section (the one below)
                var nextSection = divider.nextElementSibling;
                
                // Keep looking for the next section element (skip comments, text nodes, etc.)
                while (nextSection && (!nextSection.classList || !nextSection.classList.contains('section'))) {
                    nextSection = nextSection.nextElementSibling;
                }
                
                if (nextSection) {
                    targetSection = nextSection;
                }
            }
            
            if (targetSection) {
                // Get the background from the target section
                computedStyle = window.getComputedStyle(targetSection);
                backgroundImage = computedStyle.backgroundImage;
                backgroundColor = computedStyle.backgroundColor;
                
                // Check if the section has a gradient background
                if (backgroundImage && backgroundImage !== 'none' && backgroundImage !== 'rgba(0, 0, 0, 0)') {
                    // Use the exact gradient from the section
                    divider.style.setProperty('--divider-gradient', backgroundImage);
                    
                    // Extract first color from gradient for background-color
                    var colorMatch = backgroundImage.match(/#[0-9A-Fa-f]{6}|#[0-9A-Fa-f]{3}/);
                    if (colorMatch) {
                        divider.style.setProperty('--divider-bg-color', colorMatch[0]);
                    } else if (backgroundColor && backgroundColor !== 'rgba(0, 0, 0, 0)') {
                        divider.style.setProperty('--divider-bg-color', backgroundColor);
                    }
                    
                    // Remove inline background style - CSS will set it via variables
                    divider.style.removeProperty('background');
                    divider.style.removeProperty('background-color');
                } else if (backgroundColor && backgroundColor !== 'rgba(0, 0, 0, 0)') {
                    // If no gradient, use solid color
                    divider.style.setProperty('--divider-gradient', 'none');
                    divider.style.setProperty('--divider-bg-color', backgroundColor);
                    divider.style.removeProperty('background');
                    divider.style.removeProperty('background-color');
                }
            }
            
            // Fallback: use divider's inline style if no target section found or if section has no background
            // This ensures the divider always has a gradient, even if section lookup fails
            if ((!targetSection || !backgroundImage || backgroundImage === 'none') && 
                inlineBackground && inlineBackground !== 'none' && inlineBackground !== '' && inlineBackground !== 'transparent') {
                divider.style.setProperty('--divider-gradient', inlineBackground);
                var colorMatch = inlineBackground.match(/#[0-9A-Fa-f]{6}|#[0-9A-Fa-f]{3}/);
                if (colorMatch) {
                    divider.style.setProperty('--divider-bg-color', colorMatch[0]);
                }
                // Remove inline background - CSS will set it via variables
                divider.style.removeProperty('background');
                divider.style.removeProperty('background-color');
            }
        });
        
        // Also handle products-section-bottom-curved (same element as products-section)
        var productsSections = document.querySelectorAll('.products-section-bottom-curved');
        productsSections.forEach(function(section) {
            // Get the background from the same element (it has both classes)
            var computedStyle = window.getComputedStyle(section);
            var backgroundImage = computedStyle.backgroundImage;
            var backgroundColor = computedStyle.backgroundColor;
            
            if (backgroundImage && backgroundImage !== 'none') {
                section.style.setProperty('--divider-gradient', backgroundImage);
            }
            if (backgroundColor && backgroundColor !== 'rgba(0, 0, 0, 0)') {
                section.style.setProperty('--divider-bg-color', backgroundColor);
            }
        });
    }
    
    // Disable ALL hero animations on homepage
    function disableHeroAnimations() {
        var heroSection = document.querySelector('.header-section.gradiant-background:not(.product-page-hero), #home.header-section.gradiant-background, .header-section#home.gradiant-background');
        if (heroSection) {
            heroSection.style.setProperty('animation', 'none', 'important');
            heroSection.style.setProperty('-webkit-animation', 'none', 'important');
            heroSection.style.setProperty('background-position', '0% 50%', 'important');
            heroSection.style.setProperty('background-size', '100% 100%', 'important');
            heroSection.style.setProperty('background-color', '#70D969', 'important');
            heroSection.style.setProperty('background-image', 'linear-gradient(293deg, #70D969 0%, #19B2EB 100%)', 'important');
            heroSection.style.setProperty('background', 'linear-gradient(293deg, #70D969 0%, #19B2EB 100%)', 'important');
            heroSection.style.setProperty('filter', 'none', 'important');
            heroSection.style.setProperty('opacity', '1', 'important');
        }
        
        // Disable shine animation on hero title
        var heroTitle = document.querySelector('#home .hero-title-gradient, .header-section#home .hero-title-gradient, #home.header-section .hero-title-gradient');
        if (heroTitle) {
            heroTitle.style.setProperty('animation', 'fadeInDown 0.8s ease-out', 'important');
            heroTitle.style.setProperty('-webkit-animation', 'fadeInDown 0.8s ease-out', 'important');
            heroTitle.style.setProperty('animation-iteration-count', '1', 'important');
            heroTitle.style.setProperty('-webkit-animation-iteration-count', '1', 'important');
        }
        
        // Disable any ::before and ::after animations and overlays
        var style = document.createElement('style');
        style.id = 'disable-hero-animations';
        style.textContent = '#home.header-section.gradiant-background, .header-section#home.gradiant-background, .header-section.gradiant-background:not(.product-page-hero) { animation: none !important; -webkit-animation: none !important; background-position: 0% 50% !important; background-size: 100% 100% !important; background-color: #70D969 !important; background-image: linear-gradient(293deg, #70D969 0%, #19B2EB 100%) !important; background: linear-gradient(293deg, #70D969 0%, #19B2EB 100%) !important; filter: none !important; opacity: 1 !important; } #home.header-section.gradiant-background::before, .header-section#home.gradiant-background::before, .header-section.gradiant-background:not(.product-page-hero)::before, #home.header-section.gradiant-background::after, .header-section#home.gradiant-background::after, .header-section.gradiant-background:not(.product-page-hero)::after { display: none !important; content: none !important; animation: none !important; -webkit-animation: none !important; visibility: hidden !important; opacity: 0 !important; background: none !important; } #home .hero-title-gradient::before, .header-section#home .hero-title-gradient::before, #home.header-section .hero-title-gradient::before { display: none !important; content: none !important; animation: none !important; -webkit-animation: none !important; visibility: hidden !important; opacity: 0 !important; width: 0 !important; height: 0 !important; } #home .hero-title-gradient, .header-section#home .hero-title-gradient, #home.header-section .hero-title-gradient { animation: fadeInDown 0.8s ease-out !important; -webkit-animation: fadeInDown 0.8s ease-out !important; animation-iteration-count: 1 !important; -webkit-animation-iteration-count: 1 !important; }';
        document.head.appendChild(style);
    }
    
    // Aggressive function to prevent red dividers - runs continuously
    function preventRedDividers() {
        var homepageGradient = 'linear-gradient(293deg, #70D969 0%, #19B2EB 100%)';
        var homepageBlue = '#70D969';
        
        // Don't run on product pages
        if (document.querySelector('.product-page-hero')) {
            return;
        }
        
        var dividers = document.querySelectorAll('.section-divider-wave:not(#divider-faq-top):not(#divider-faq-bottom), .section-divider-wave-bottom:not(#divider-faq-top):not(#divider-faq-bottom), .section-divider-wave-product-bottom');
        dividers.forEach(function(divider) {
            // Skip FAQ and footer dividers
            if (divider.id === 'divider-faq-top' || divider.id === 'divider-faq-bottom') {
                return;
            }
            var isFooterDivider = divider.nextElementSibling && divider.nextElementSibling.classList && divider.nextElementSibling.classList.contains('footer-section');
            if (isFooterDivider) {
                return;
            }
            
            // Force blue-green gradient - check computed style and override if red
            var computedStyle = window.getComputedStyle(divider);
            var bgImage = computedStyle.backgroundImage;
            var bgColor = computedStyle.backgroundColor;
            
            // Check if background contains red colors
            if (bgImage && (bgImage.includes('#ed355b') || bgImage.includes('#ff6b6b') || bgImage.includes('ed355b') || bgImage.includes('ff6b6b') || bgImage.includes('rgb(237, 53, 91)') || bgImage.includes('rgb(255, 107, 107)'))) {
                divider.style.setProperty('background', homepageGradient, 'important');
                divider.style.setProperty('background-image', homepageGradient, 'important');
            }
            if (bgColor && (bgColor.includes('#ed355b') || bgColor.includes('#ff6b6b') || bgColor.includes('237, 53, 91') || bgColor.includes('255, 107, 107'))) {
                divider.style.setProperty('background-color', homepageBlue, 'important');
            }
            
            // Always force the correct gradient
            divider.style.setProperty('background', homepageGradient, 'important');
            divider.style.setProperty('background-color', homepageBlue, 'important');
            divider.style.setProperty('background-image', homepageGradient, 'important');
            divider.style.setProperty('--divider-bg-color', homepageBlue, 'important');
            divider.style.setProperty('--divider-gradient', homepageGradient, 'important');
            divider.style.setProperty('filter', 'none', 'important');
            divider.style.setProperty('-webkit-filter', 'none', 'important');
            
            // Ensure divider has relative positioning for overlay
            divider.style.setProperty('position', 'relative', 'important');
            
            // Create or update overlay div to force correct color
            var overlay = divider.querySelector('.divider-overlay-fix');
            if (!overlay) {
                overlay = document.createElement('div');
                overlay.className = 'divider-overlay-fix';
                divider.appendChild(overlay);
            }
            overlay.style.cssText = 'position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: ' + homepageGradient + ' !important; background-color: ' + homepageBlue + ' !important; z-index: 2; pointer-events: none; -webkit-mask-image: url("/images/carb.png"); mask-image: url("/images/carb.png"); -webkit-mask-size: 100% 100%; mask-size: 100% 100%; -webkit-mask-repeat: no-repeat; mask-repeat: no-repeat; -webkit-mask-position: center; mask-position: center; transform: scaleY(-1);';
            
            // Also inject style for ::after pseudo-element
            var dividerId = divider.id || 'divider-' + Math.random().toString(36).substr(2, 9);
            if (!divider.id) {
                divider.id = dividerId;
            }
            var styleId = 'prevent-red-divider-' + dividerId;
            var existingStyle = document.getElementById(styleId);
            if (existingStyle) {
                existingStyle.remove();
            }
            var style = document.createElement('style');
            style.id = styleId;
            style.textContent = '#' + dividerId + '::after { background: ' + homepageGradient + ' !important; background-color: ' + homepageBlue + ' !important; background-image: ' + homepageGradient + ' !important; filter: none !important; -webkit-filter: none !important; opacity: 1 !important; visibility: visible !important; }';
            document.head.appendChild(style);
        });
    }
    
    // Run on page load
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            updateDividerGradients();
            disableHeroAnimations();
            preventRedDividers();
        });
    } else {
        updateDividerGradients();
        disableHeroAnimations();
        preventRedDividers();
    }
    
    // Also run after a short delay to ensure styles are computed
    setTimeout(function() {
        updateDividerGradients();
        disableHeroAnimations();
        preventRedDividers();
    }, 100);
    setTimeout(function() {
        updateDividerGradients();
        disableHeroAnimations();
        preventRedDividers();
    }, 500);
    setTimeout(function() {
        preventRedDividers();
    }, 1000);
    setTimeout(function() {
        preventRedDividers();
    }, 2000);
    
    // Run periodically to catch any late-loading styles
    setInterval(function() {
        preventRedDividers();
    }, 2000);
    
    // Ensure FAQ dividers stay grey and are visible
    function ensureFaqDividersGrey() {
        var faqTopDivider = document.getElementById('divider-faq-top');
        var faqBottomDivider = document.getElementById('divider-faq-bottom');
        if (faqTopDivider) {
            faqTopDivider.style.setProperty('background', '#f8f9fa', 'important');
            faqTopDivider.style.setProperty('background-color', '#f8f9fa', 'important');
            faqTopDivider.style.setProperty('--divider-gradient', 'none', 'important');
            faqTopDivider.style.setProperty('--divider-bg-color', '#f8f9fa', 'important');
            faqTopDivider.style.setProperty('display', 'block', 'important');
            faqTopDivider.style.setProperty('visibility', 'visible', 'important');
            faqTopDivider.style.setProperty('height', '120px', 'important');
            // Update SVG gradient
            var svg = faqTopDivider.querySelector('svg');
            if (svg) {
                var gradient = svg.querySelector('#gradient-divider-faq');
                if (gradient) {
                    var stops = gradient.querySelectorAll('stop');
                    stops.forEach(function(stop) {
                        stop.setAttribute('style', 'stop-color:#f8f9fa;stop-opacity:1');
                    });
                }
            }
        }
        if (faqBottomDivider) {
            faqBottomDivider.style.setProperty('background', '#f8f9fa', 'important');
            faqBottomDivider.style.setProperty('background-color', '#f8f9fa', 'important');
            faqBottomDivider.style.setProperty('--divider-gradient', 'none', 'important');
            faqBottomDivider.style.setProperty('--divider-bg-color', '#f8f9fa', 'important');
            faqBottomDivider.style.setProperty('display', 'block', 'important');
            faqBottomDivider.style.setProperty('visibility', 'visible', 'important');
            faqBottomDivider.style.setProperty('height', '120px', 'important');
            // Update SVG gradient
            var svg = faqBottomDivider.querySelector('svg');
            if (svg) {
                var gradient = svg.querySelector('#gradient-divider-faq-bottom');
                if (gradient) {
                    var stops = gradient.querySelectorAll('stop');
                    stops.forEach(function(stop) {
                        stop.setAttribute('style', 'stop-color:#f8f9fa;stop-opacity:1');
                    });
                }
            }
        }
    }
    ensureFaqDividersGrey();
    setTimeout(ensureFaqDividersGrey, 100);
    setTimeout(ensureFaqDividersGrey, 500);
    
    // Ensure footer divider uses solid #404040 color (no gradient, no fade)
    function ensureFooterDividerColor() {
        var footerDividers = document.querySelectorAll('.section-divider-wave, #footer-top-divider');
        footerDividers.forEach(function(divider) {
            var isFooterDivider = divider.nextElementSibling && divider.nextElementSibling.classList && divider.nextElementSibling.classList.contains('footer-section');
            if (isFooterDivider || divider.id === 'footer-top-divider') {
                divider.style.setProperty('background', '#404040', 'important');
                divider.style.setProperty('background-color', '#404040', 'important');
                divider.style.setProperty('background-image', 'none', 'important');
                divider.style.setProperty('--divider-gradient', 'none', 'important');
                divider.style.setProperty('--divider-bg-color', '#404040', 'important');
                divider.style.setProperty('filter', 'none', 'important');
                divider.style.setProperty('-webkit-filter', 'none', 'important');
                divider.style.setProperty('backdrop-filter', 'none', 'important');
                divider.style.setProperty('-webkit-backdrop-filter', 'none', 'important');
                divider.style.setProperty('transform', 'none', 'important');
                divider.style.setProperty('will-change', 'auto', 'important');
                divider.style.setProperty('display', 'block', 'important');
                divider.style.setProperty('visibility', 'visible', 'important');
                divider.style.setProperty('height', '120px', 'important');
                divider.style.setProperty('opacity', '1', 'important');
                // Update SVG to solid #404040 color (no gradient)
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
                    // Remove or update gradient to solid color
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
    ensureFooterDividerColor();
    setTimeout(ensureFooterDividerColor, 100);
    setTimeout(ensureFooterDividerColor, 500);
})();
</script>
@endpush
