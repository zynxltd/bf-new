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
<meta property="og:image" content="{{ url('images/superiorV4.png') }}">
<meta property="og:image:secure_url" content="{{ url('images/superiorV4.png') }}">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name" content="Blooming Fast">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Blooming Fast Plant Foods - Premium Garden Supplements">
<meta name="twitter:description" content="Premium plant foods and fertilisers for bigger, better blooms and healthier plants.">
<meta name="twitter:image" content="{{ url('images/superiorV4.png') }}">
<meta name="twitter:image:alt" content="Blooming Fast Plant Foods - Premium Garden Supplements">

<!-- Organization Schema.org JSON-LD -->
<script type="application/ld+json">
@php
$organizationSchema = [
  "@context" => "https://schema.org",
  "@type" => "Organization",
  "name" => "Blooming Fast",
  "url" => url('/'),
  "logo" => asset('images/logo.png'),
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
<!-- Start .header-section -->
<div id="home" class="header-section half-header section gradiant-background header-curbed confetti-section">
    
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
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="site-collapse-nav">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#home" class="nav-item">Home</a></li>
                        <li><a href="#about" class="nav-item">About</a></li>
                        <li><a href="#features" class="nav-item">Features</a></li>
                        <li><a href="#products" class="nav-item">Products</a></li>
                        <li><a href="#videos" class="nav-item">Videos</a></li>
                        <li><a href="#faq" class="nav-item">FAQ</a></li>
                        <li><a href="{{ route('blog.index') }}" class="nav-item">Blog</a></li>
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
                <li><a href="#home" class="nav-item">Home</a></li>
                <li><a href="#about" class="nav-item">About</a></li>
                <li><a href="#features" class="nav-item">Features</a></li>
                <li><a href="#products" class="nav-item">Products</a></li>
                <li><a href="#videos" class="nav-item">Videos</a></li>
                <li><a href="#faq" class="nav-item">FAQ</a></li>
                <li><a href="{{ route('blog.index') }}" class="nav-item">Blog</a></li>
                <li class="desktop-menu-divider"><span></span></li>
                <li class="desktop-menu-store-links">
                    <a href="https://www.yougarden.com?source=bloomingfast.com" class="nav-item store-link" target="_blank" rel="noopener">
                        <img src="{{ asset('images/yglogosmall.png') }}" alt="YouGarden" loading="lazy" />
                    </a>
                    <a href="https://www.amazon.co.uk/stores/page/5D2120F1-F052-4812-AAF7-6FE644404EC7/search?lp_asin=B0D44VQZ1S&ref_=ast_bln&store_ref=bl_ast_dp_brandLogo_sto&terms=blooming%20fast" class="nav-item store-link" target="_blank" rel="noopener">
                        <img src="{{ asset('images/amazoncolour.png') }}" alt="Amazon" loading="lazy" />
                    </a>
                </li>
            </ul>
        </div>
    </div><!-- .navigation -->
    
    <div class="header-content">
        <div class="container">
            <div class="row row-vm">
                <div class="col-md-7">
                    <div class="header-texts tab-center mobile-center hero-content-mobile">
                        <div class="hero-badge wow fadeInUp" data-wow-duration=".5s">
                            <span><i class="fa fa-star hero-star-icon"></i> Premium Quality</span>
                        </div>
                        <h2 class="hero-title-gradient wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".1s">Superior Plant Food</h2>
                        <p class="lead hero-description wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">Our best-ever formulation for use all round the garden for <strong>more flowers</strong>, <strong>more fruit</strong>, <strong>better roots</strong> and <strong>better shoots</strong>.</p>
                        <div class="hero-sizes wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                            <span class="size-label">Available in 3 sizes:</span>
                            <div class="size-badges">
                                <span class="size-badge" data-scroll-to="products">1.25kg</span>
                                <span class="size-badge" data-scroll-to="products">500g</span>
                                <span class="size-badge" data-scroll-to="products">50g Trial</span>
                            </div>
                        </div>
                        <h3 class="heading-light hero-cta wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".4s">Click below to buy it from one of our stockists</h3>
                        <ul class="buttons">
                            <li><a href="https://www.yougarden.com/item-p-100062/blooming-fast-superior-soluble-fertiliser?source=bloomingfast.com" class="button wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s" target="_blank" rel="noopener"><img src="{{ asset('images/yglogosmall.png') }}" alt="YouGarden" /></a></li>
                            <li><a href="https://www.amazon.co.uk/Bloomiing-Soluble-Planter-Fertilsier-litres/dp/B079HYNNN4/ref=sr_1_1?ie=UTF8&amp;qid=1522915651&amp;sr=8-1&amp;keywords=blooming+fast+superior" class="button wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s" target="_blank" rel="noopener"><img src="{{ asset('images/amazoncolour.png') }}" alt="Amazon" /></a></li>
                        </ul>
                        <!-- Feefo Rating Badge -->
                        <div class="hero-feefo-badge wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".6s">
                            <a href="#customer-reviews" class="hero-feefo-link">
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
                                <img src="{{ asset('images/Feefo_White_and_yellow_logo.svg') }}" alt="Feefo" class="feefo-logo-below-img" />
                            </div>
                        </div>
                    </div>
                </div><!-- .col -->
                <div class="col-md-5" style="z-index: 999;">
                    <div class="wow fadeInUp confetti-burst-trigger" data-wow-duration="1s" data-wow-delay=".6s" >
                        <img style="z-index: 999;" src="{{ asset('images/superiorV4.png') }}" alt="Citrus Feed" />
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .header-content -->
    
    <!-- Hero Bottom Divider -->
    <div class="hero-bottom-divider" style="position: absolute; bottom: 0; left: 0; right: 0; width: 100%; height: 150px; z-index: 1; pointer-events: none; overflow: hidden; display: block; background: url('/images/carb.png') bottom center no-repeat; background-size: cover;">
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
                    <img src="{{ asset('images/video.png') }}" alt="about-video" />
                    <div class="video-overlay gradiant-background"></div>
                    <a href="https://vimeo.com/170471588" class="video-play" data-effect="mfp-3d-unfold"><i class="fa fa-play"></i></a>
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
                        <a href="#products" class="button button-primary">View All Products</a>
                        <a href="#videos" class="button button-secondary">View Videos</a>
                    </div>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
        
    </div><!-- .container -->
</div><!-- .about-section  -->

<!-- Curved divider between white and gradient sections -->
<div class="section-divider-wave" style="height: 200px; width: 100%; overflow: visible; background: linear-gradient(90deg, #537550 0%, #713841 100%); margin-top: 0px; position: relative; z-index: 1; padding-top: 0px;">
    <img src="/images/carb.png" alt="" role="presentation" aria-hidden="true" style="width: 100%; height: 100%; object-fit: fill; object-position: top center; display: block; transform: scaleY(-1); filter: brightness(0) invert(1);">
</div>


<!-- Start .features-section  -->
<div id="features" class="features-section section gradiant-background header-curbed confetti-section">
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
                                <i class="ti ti-check"></i>
                                <div class="feature-nutrient-content">
                            <h4>Nitrogen</h4>
                                    <p>(the N in NPK), essential for making proteins and therefore cell growth</p>
                        </div>
                            </div>
                            
                            <div class="feature-nutrient-card">
                                <i class="ti ti-check"></i>
                                <div class="feature-nutrient-content">
                                    <h4>Potassium oxide</h4>
                            <p>(the K in NPK) for respiration and photosynthesis</p>
                        </div>
                            </div>
                            
                            <div class="feature-nutrient-card">
                                <i class="ti ti-check"></i>
                                <div class="feature-nutrient-content">
                            <h4>Boron</h4>
                            <p>for healthy cell growth</p>
                        </div>
                            </div>
                            
                            <div class="feature-nutrient-card">
                                <i class="ti ti-check"></i>
                                <div class="feature-nutrient-content">
                            <h4>Iron</h4>
                            <p>for chlorophyll production</p>
                        </div>
                    </div>
                        </div>
                        
                        <!-- Center product image -->
                        <div class="features-product-center">
                            <div class="features-product-image">
                                <img src="{{ asset('images/superiorback.png') }}" alt="Superior Plant Food" loading="lazy" decoding="async" />
                            </div>
                        </div>
                        
                        <!-- Right column cards -->
                        <div class="features-cards-column features-cards-right">
                            <div class="feature-nutrient-card">
                                <i class="ti ti-check"></i>
                                <div class="feature-nutrient-content">
                            <h4>Phosphorous pentoxide</h4>
                            <p>(the P in NPK) for respiration and growth</p>
                        </div>
                            </div>
                            
                            <div class="feature-nutrient-card">
                                <i class="ti ti-check"></i>
                                <div class="feature-nutrient-content">
                                    <h4>Magnesium oxide</h4>
                            <p>for photosynthesis (how plants get their energy)</p>
                        </div>
                            </div>
                            
                            <div class="feature-nutrient-card">
                                <i class="ti ti-check"></i>
                                <div class="feature-nutrient-content">
                            <h4>Copper</h4>
                                    <p>for metabolic and respiratory processes</p>
                        </div>
                            </div>
                            
                            <div class="feature-nutrient-card">
                                <i class="ti ti-check"></i>
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
<div class="section-divider-wave section-divider-wave-bottom" style="height: 150px; width: 100%; overflow: hidden; background: linear-gradient(90deg, #537550 0%, #713841 100%);">
    <img src="/images/carb.png" alt="" role="presentation" aria-hidden="true" style="width: 100%;height: 100%;object-fit: cover;object-position: bottom center;display: block; transform: scaleY(-1);">
</div>

<!-- Start .customer-reviews-section  -->
<div id="customer-reviews" class="customer-reviews-section customer-reviews-curved-top customer-reviews-curved-bottom section white-bg pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="customer-reviews-content">
                    <h3 class="mb-50 text-center">What Our Customers Say</h3>
                    
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
                        <div class="carousel-inner testimonials-carousel-inner" role="listbox">
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



<!-- Products Section Top Divider -->
<!-- <div class="section-divider-wave" id="divider-products">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="display: block; width: 100%; height: 100%;">
        <defs>
            <linearGradient id="gradient-divider-products-top" x1="100%" y1="0%" x2="0%" y2="100%" gradientUnits="objectBoundingBox">
                <stop offset="0%" style="stop-color:#404040;stop-opacity:1" />
                <stop offset="100%" style="stop-color:#404040;stop-opacity:1" />
            </linearGradient>
        </defs>
        <path d="M0,0 C150,80 350,80 600,40 C850,0 1050,0 1200,40 L1200,120 L0,120 Z" fill="url(#gradient-divider-products-top)"></path>
    </svg>
</div> -->

<!-- Curved divider between white and gradient sections -->
<div class="section-divider-wave" style="height: 200px; width: 100%; overflow: visible; background: linear-gradient(90deg, #537550 0%, #713841 100%); margin-top: 0px; position: relative; z-index: 1; padding-top: 0px;">
    <img src="/images/carb.png" alt="" role="presentation" aria-hidden="true" style="width: 100%; height: 100%; object-fit: fill; object-position: top center; display: block; transform: scaleY(-1); filter: brightness(0) invert(1);">
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
                @forelse($products ?? [] as $index => $product)
                <div class="col-md-4 col-sm-6 mb-40">
                    <div class="product-card white-bg text-center wow fadeInUp product-card-clickable" 
                         data-wow-duration=".5s" 
                         data-wow-delay="{{ ($index * 0.1) }}s"
                         data-product-title="{{ $product->title }}"
                         data-product-image="{{ $product->image ? asset($product->image) : '' }}"
                         data-product-image-2="{{ $product->image_2 ? asset($product->image_2) : ($product->image ? asset($product->image) : '') }}"
                         data-product-image-3="{{ $product->image_3 ? asset($product->image_3) : '' }}"
                         data-product-image-4="{{ $product->image_4 ? asset($product->image_4) : '' }}"
                         data-product-video="{{ $product->video ?? '' }}"
                         data-product-description="{{ $product->description ?? '' }}"
                         data-product-full-description="{{ htmlspecialchars($product->full_description ?? '', ENT_QUOTES) }}"
                         data-product-videos="{{ htmlspecialchars($product->videos ?? '', ENT_QUOTES) }}"
                         data-product-reviews="{{ htmlspecialchars($product->reviews ?? '', ENT_QUOTES) }}"
                         data-product-delivery="{{ htmlspecialchars($product->delivery_info ?? '', ENT_QUOTES) }}"
                         data-product-specs="{{ $product->specs ?? '' }}"
                         data-product-yg="{{ $product->yg_link ?? '' }}"
                         data-product-amazon="{{ $product->amazon_link ?? '' }}"
                         data-product-npk="{{ $product->npk ?? '' }}"
                         data-product-features="{{ $product->features ?? '' }}"
                         data-product-application="{{ htmlspecialchars($product->application ?? '', ENT_QUOTES) }}"
                         data-product-makes="{{ $product->makes ?? '' }}"
                         data-product-sku="{{ $product->sku ?? '' }}">
                        <div class="product-image mb-20" style="position: relative;">
                            @if($index < 2)
                            <span class="best-seller-badge">Best Seller</span>
                            @endif
                            <img src="{{ $product->image ? asset($product->image) : asset('images/superiorV4.png') }}" alt="{{ $product->title }}" class="img-responsive" loading="lazy" decoding="async" />
                            <div class="product-quick-view-overlay">
                                <a href="#" class="product-quick-view-btn" title="Quick View">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
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
                            <ul class="product-buttons">
                                @if($product->yg_link)
                                <li><a href="{{ $product->yg_link }}{{ strpos($product->yg_link, '?') !== false ? '&' : '?' }}source=bloomingfast.com" class="product-button btn-buy-yg" target="_blank" rel="noopener" onclick="event.stopPropagation();" aria-label="Buy {{ $product->title }} from YouGarden">
                                    <img src="{{ asset('images/yglogosmall.png') }}" alt="YouGarden" loading="lazy" />
                                    <span class="btn-text">Buy Now</span>
                                </a></li>
                                @endif
                                @if($product->amazon_link)
                                <li><a href="{{ $product->amazon_link }}" class="product-button btn-buy-amazon" target="_blank" rel="noopener" onclick="event.stopPropagation();" aria-label="Buy {{ $product->title }} from Amazon">
                                    <img src="{{ asset('images/amazoncolour.png') }}" alt="Amazon" loading="lazy" />
                                    <span class="btn-text">Buy Now</span>
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
                        </div>
                @empty
                <div class="col-md-12">
                    <div class="text-center" style="padding: 60px 20px; color: rgba(255, 255, 255, 0.9);">
                        <i class="fa fa-leaf" style="font-size: 64px; margin-bottom: 20px; display: block; opacity: 0.7;"></i>
                        <h3 style="color: rgba(255, 255, 255, 0.95); margin-bottom: 15px;">No products available yet</h3>
                        <p style="font-size: 18px; margin-bottom: 30px;">Check back soon for our range of premium plant foods!</p>
                            </div>
                        </div>
                @endforelse
            </div><!-- .row -->
        </div><!-- .products-content -->
    </div><!-- .container -->
</div><!-- .products-section  -->

<div class="section-divider-wave section-divider-wave-product-bottom" style="height: 150px; width: 100%; overflow: hidden; background: linear-gradient(90deg, #537550 0%, #713841 100%);">
    <img src="/images/carb.png" alt="" role="presentation" aria-hidden="true" style="width: 100%;height: 100%;object-fit: cover;object-position: bottom center;display: block; transform: scaleX(-);">
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
                <!-- Video 1: Superior Soluble Fertiliser -->
                <div class="col-md-4 col-sm-6 mb-40">
                    <div class="video-card white-bg text-center wow fadeInUp" data-wow-duration=".5s">
                        <div class="video-thumbnail">
                            <img src="{{ asset('images/superiorV4.png') }}" alt="Superior Soluble Fertiliser" class="img-responsive" />
                            <div class="video-overlay gradiant-background"></div>
                            <a href="https://vimeo.com/170471588" class="video-play" data-effect="mfp-3d-unfold"><i class="fa fa-play"></i></a>
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
                            <img src="{{ asset('images/bloom-booster-p1.jpg') }}" alt="Ultimate Rose Bloom Booster" class="img-responsive" />
                            <div class="video-overlay gradiant-background"></div>
                            <a href="https://vimeo.com/1100825820" class="video-play" data-effect="mfp-3d-unfold"><i class="fa fa-play"></i></a>
                        </div>
                        <div class="video-details p-30">
                            <h4 class="video-title mb-15">Ultimate Rose Bloom Booster</h4>
                            <p class="video-description">Discover how to get bigger, better blooms from your roses with this complete fertiliser.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Video 5: Acer Feed -->
                <div class="col-md-4 col-sm-6 mb-40">
                    <div class="video-card white-bg text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".4s">
                        <div class="video-thumbnail">
                            <img src="{{ asset('images/acer-feed-p1.jpg') }}" alt="Acer Feed" class="img-responsive" />
                            <div class="video-overlay gradiant-background"></div>
                            <a href="https://vimeo.com/1090498990?fl=pl&fe=cm" class="video-play" data-effect="mfp-3d-unfold"><i class="fa fa-play"></i></a>
                        </div>
                        <div class="video-details p-30">
                            <h4 class="video-title mb-15">Acer Feed</h4>
                            <p class="video-description">Find out how to enhance the beautiful colours of your Japanese maples and acer trees.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Video 7: Fish Blood & Bone -->
                <div class="col-md-4 col-sm-6 mb-40">
                    <div class="video-card white-bg text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".6s">
                        <div class="video-thumbnail">
                            <img src="{{ asset('images/fish-blood-p1.jpg') }}" alt="Fish Blood & Bone" class="img-responsive" />
                            <div class="video-overlay gradiant-background"></div>
                            <a href="https://vimeo.com/170471587?fl=pl&fe=cm" class="video-play" data-effect="mfp-3d-unfold"><i class="fa fa-play"></i></a>
                        </div>
                        <div class="video-details p-30">
                            <h4 class="video-title mb-15">Fish Blood & Bone</h4>
                            <p class="video-description">Learn about this traditional organic fertiliser perfect for all-round garden use.</p>
                        </div>
                    </div>
                </div>
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
                            <div class="carousel-inner" role="listbox" id="modalCarouselInner">
                            </div>
                            
                            <!-- Controls -->
                            <a class="left carousel-control" href="#productModalCarousel" role="button" data-slide="prev" id="modalCarouselPrev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#productModalCarousel" role="button" data-slide="next" id="modalCarouselNext">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3 id="modalProductTitle" class="product-modal-title"></h3>
                        <p id="modalProductDescription" class="product-modal-description"></p>
                        <div id="modalProductSpecs" class="product-modal-specs mb-20"></div>
                        
                        <!-- Collapsible Sections -->
                        <div class="panel-group accordion" id="productModalAccordion" role="tablist" aria-multiselectable="true" style="margin-top: 20px; margin-bottom: 20px;">
                            
                            <!-- Full Description -->
                            <div class="panel panel-default product-modal-full-description" id="modalProductFullDescriptionSection">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#productModalAccordion" href="#modalProductFullDescriptionCollapse" aria-expanded="true" class="collapsed">
                                            Full Description <i class="fa fa-chevron-down pull-right"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="modalProductFullDescriptionCollapse" class="panel-collapse collapse" role="tabpanel">
                                    <div class="panel-body">
                                        <div id="modalProductFullDescriptionText" class="product-modal-content-text"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Key Features -->
                            <div class="panel panel-default" id="modalProductFeaturesSection">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#productModalAccordion" href="#modalProductFeaturesCollapse" aria-expanded="false" class="collapsed">
                                            Key Features <i class="fa fa-chevron-down pull-right"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="modalProductFeaturesCollapse" class="panel-collapse collapse" role="tabpanel">
                                    <div class="panel-body">
                                        <ul id="modalProductFeaturesList" class="product-features-list"></ul>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Videos -->
                            <div class="panel panel-default product-modal-videos" id="modalProductVideosSection">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#productModalAccordion" href="#modalProductVideosCollapse" aria-expanded="false" class="collapsed">
                                            Videos <i class="fa fa-chevron-down pull-right"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="modalProductVideosCollapse" class="panel-collapse collapse" role="tabpanel">
                                    <div class="panel-body">
                                        <div id="modalProductVideosContent" class="product-modal-content-text"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Application -->
                            <div class="panel panel-default" id="modalProductApplicationSection">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#productModalAccordion" href="#modalProductApplicationCollapse" aria-expanded="false" class="collapsed">
                                            Application <i class="fa fa-chevron-down pull-right"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="modalProductApplicationCollapse" class="panel-collapse collapse" role="tabpanel">
                                    <div class="panel-body">
                                        <div id="modalProductApplicationText" class="product-modal-content-text"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Delivery Info -->
                            <div class="panel panel-default product-modal-delivery" id="modalProductDeliverySection">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#productModalAccordion" href="#modalProductDeliveryCollapse" aria-expanded="false" class="collapsed">
                                            Delivery Information <i class="fa fa-chevron-down pull-right"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="modalProductDeliveryCollapse" class="panel-collapse collapse" role="tabpanel">
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


<div class="section-divider-wave">
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

<div class="section-divider-wave section-divider-wave-bottom" id="divider-faq-bottom">
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
    // Quick view button click handler
    $('.product-quick-view-btn').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var $card = $(this).closest('.product-card-clickable');
        if ($card.length) {
            openProductModal($card);
        }
    });
    
    // Make product image clickable
    $(document).on('click', '.product-card-clickable .product-image img', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var $card = $(this).closest('.product-card-clickable');
        if ($card.length) {
            openProductModal($card);
        }
    });
    
    // Also make the entire product-image div clickable
    $(document).on('click', '.product-card-clickable .product-image', function(e) {
        // Don't trigger if clicking on the quick view button
        if ($(e.target).closest('.product-quick-view-btn').length || 
            $(e.target).closest('.product-quick-view-overlay').length) {
            return;
        }
        e.preventDefault();
        e.stopPropagation();
        var $card = $(this).closest('.product-card-clickable');
        if ($card.length) {
            openProductModal($card);
        }
    });
    
    // Handle product card clicks (for clicking on card itself, not buttons/links)
    $('.product-card-clickable').on('click', function(e) {
        // Don't trigger if clicking on buttons, links, or quick view overlay
        if ($(e.target).closest('.product-button').length || 
            $(e.target).closest('.product-quick-view-overlay').length ||
            $(e.target).closest('a').length ||
            $(e.target).is('a')) {
            return;
        }
        
        // Don't trigger if clicking on image (handled separately above)
        if ($(e.target).closest('.product-image img').length) {
            return;
        }
        
        var $card = $(this);
        openProductModal($card);
    });
    
    // Function to open product modal
    function openProductModal($card) {
        var $card = $card;
        var title = $card.data('product-title');
        var image = $card.data('product-image');
        var image2 = $card.data('product-image-2');
        var image3 = $card.data('product-image-3');
        var image4 = $card.data('product-image-4');
        var video = $card.attr('data-product-video');
        var description = $card.data('product-description');
        // Use attr() instead of data() to get raw attribute values
        var fullDescription = $card.attr('data-product-full-description');
        var videos = $card.attr('data-product-videos');
        var reviews = $card.attr('data-product-reviews');
        var deliveryInfo = $card.attr('data-product-delivery');
        var specs = $card.attr('data-product-specs');
        var ygLink = $card.attr('data-product-yg');
        var amazonLink = $card.attr('data-product-amazon');
        var npk = $card.attr('data-product-npk');
        var features = $card.attr('data-product-features');
        var application = $card.attr('data-product-application');
        var makes = $card.attr('data-product-makes');
        var sku = $card.attr('data-product-sku');
        
        // Debug: Log all data - also log raw attributes BEFORE decoding
        console.log('=== PRODUCT MODAL DATA (RAW) ===');
        console.log('Title:', title);
        console.log('Description:', description);
        console.log('Image:', image);
        console.log('Image2:', image2);
        console.log('Video:', video);
        console.log('Full Description (raw):', $card.attr('data-product-full-description'));
        console.log('Features (raw):', $card.attr('data-product-features'));
        console.log('Videos (raw):', $card.attr('data-product-videos'));
        console.log('Application (raw):', $card.attr('data-product-application'));
        console.log('Delivery Info (raw):', $card.attr('data-product-delivery'));
        console.log('================================');
        
        // Decode HTML entities for text fields (preserve HTML formatting)
        // Use a helper function to decode HTML entities while preserving HTML tags
        function decodeHtmlEntities(html) {
            if (!html || html.trim() === '') return '';
            var textarea = document.createElement('textarea');
            textarea.innerHTML = html;
            return textarea.value;
        }
        
        // Decode but preserve HTML structure
        if (fullDescription && fullDescription.trim() !== '') {
            fullDescription = decodeHtmlEntities(fullDescription);
        }
        if (deliveryInfo && deliveryInfo.trim() !== '') {
            deliveryInfo = decodeHtmlEntities(deliveryInfo);
        }
        if (application && application.trim() !== '') {
            application = decodeHtmlEntities(application);
        }
        if (features && features.trim() !== '') {
            features = decodeHtmlEntities(features);
        }
        
        // Populate basic modal fields
        $('#modalProductTitle').text(title);
        $('#modalProductDescription').text(description);
        
        // Add source parameter to YouGarden links only
        var ygLinkWithSource = ygLink;
        if (ygLink) {
            var separator = ygLink.indexOf('?') !== -1 ? '&' : '?';
            ygLinkWithSource = ygLink + separator + 'source=bloomingfast.com';
        }
        
        $('#modalProductYG').attr('href', ygLinkWithSource);
        $('#modalProductAmazon').attr('href', amazonLink);
        $('#modalProductYGTop').attr('href', ygLinkWithSource);
        $('#modalProductAmazonTop').attr('href', amazonLink);
        
        // Reset collapse states for accordion - all start collapsed (do this first)
        $('#productModalAccordion .panel-collapse').removeClass('in').addClass('collapse');
        $('#productModalAccordion .panel-title a').addClass('collapsed').attr('aria-expanded', 'false');
        
        // Always show Full Description section - use description as fallback if full_description is empty
        var fullDescContent = '';
        
        // Check raw attribute first (before any decoding)
        var rawFullDesc = $card.attr('data-product-full-description');
        console.log('Raw full description:', rawFullDesc, 'Length:', rawFullDesc ? rawFullDesc.length : 0);
        console.log('Description:', description, 'Length:', description ? description.length : 0);
        
        // Use full_description if it exists and has content
        if (rawFullDesc && rawFullDesc.trim() !== '' && rawFullDesc !== 'null' && rawFullDesc !== 'undefined') {
            // Decode HTML entities but preserve HTML structure
            var decodedFullDesc = decodeHtmlEntities(rawFullDesc);
            console.log('Decoded full description preview:', decodedFullDesc.substring(0, 200));
            
            // If decoded content has HTML tags, use it as-is, otherwise convert newlines to <br>
            if (decodedFullDesc.indexOf('<') !== -1) {
                fullDescContent = decodedFullDesc;
            } else {
                // Convert newlines to <br> and preserve paragraph breaks
                fullDescContent = decodedFullDesc.replace(/\n\n+/g, '</p><p>').replace(/\n/g, '<br>');
                if (fullDescContent && !fullDescContent.startsWith('<p>')) {
                    fullDescContent = '<p>' + fullDescContent + '</p>';
                }
            }
            console.log('Using full_description, raw length:', rawFullDesc.length, 'decoded length:', fullDescContent.length);
        }
        
        // ONLY use description as fallback if fullDescContent is still empty (not if full_description exists)
        if (!fullDescContent || fullDescContent.trim() === '') {
            if (description && description.trim() !== '') {
                fullDescContent = description.replace(/\n/g, '<br>');
                console.log('Using description as fallback for Full Description, length:', description.length);
            }
        } else {
            console.log('Full description found, NOT using description fallback');
        }
        
        // Always show Full Description if we have any content
        if (fullDescContent && fullDescContent.trim() !== '') {
            $('#modalProductFullDescriptionText').html(fullDescContent);
            $('#modalProductFullDescriptionSection').show();
            console.log('✓ Showing Full Description section, content length:', fullDescContent.length);
        } else {
            $('#modalProductFullDescriptionSection').hide();
            console.log('✗ Full Description section hidden. Description exists:', !!description, 'Description length:', description ? description.length : 0);
        }
        
        // Populate videos if available (collapsible)
        var hasVideos = videos && 
                       videos !== 'null' && 
                       videos !== 'undefined' && 
                       videos.trim() !== '';
        
        // Also check if there's a single video field (URL only)
        if (!hasVideos && video && video.trim() !== '') {
            // If video is a URL, convert it to embed code
            var videoUrl = video.trim();
            if (videoUrl.indexOf('vimeo.com') !== -1) {
                // Extract Vimeo video ID
                var vimeoMatch = videoUrl.match(/(?:vimeo\.com\/)(\d+)/);
                if (vimeoMatch && vimeoMatch[1]) {
                    var vimeoId = vimeoMatch[1];
                    videos = '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://player.vimeo.com/video/' + vimeoId + '?color=ffffff&title=0&byline=0&portrait=0" allowfullscreen></iframe></div>';
                    hasVideos = true;
                }
            } else if (videoUrl.indexOf('youtube.com') !== -1 || videoUrl.indexOf('youtu.be') !== -1) {
                // Extract YouTube video ID
                var youtubeMatch = videoUrl.match(/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&\n?#]+)/);
                if (youtubeMatch && youtubeMatch[1]) {
                    var youtubeId = youtubeMatch[1];
                    videos = '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' + youtubeId + '" allowfullscreen></iframe></div>';
                    hasVideos = true;
                }
            }
        }
        
        if (hasVideos) {
            // Get the raw attribute value to avoid jQuery's automatic decoding
            var rawVideos = $card.attr('data-product-videos');
            var decodedVideos = '';
            
            if (rawVideos && rawVideos.trim() !== '' && rawVideos !== 'null' && rawVideos !== 'undefined') {
                // Create a temporary textarea element to decode HTML entities
                // This is the most reliable way to decode HTML entities
                var textarea = document.createElement('textarea');
                textarea.innerHTML = rawVideos;
                decodedVideos = textarea.value;
                
                // If still contains entities, try another method
                if (decodedVideos.indexOf('&lt;') !== -1 || decodedVideos.indexOf('&quot;') !== -1) {
                    // Use a div with textContent to set, then innerHTML to get decoded
                    var tempDiv = document.createElement('div');
                    tempDiv.textContent = rawVideos;
                    decodedVideos = tempDiv.innerHTML;
                }
            } else if (videos && typeof videos === 'string' && videos.trim() !== '') {
                // Use the videos variable directly if rawVideos is not available
                decodedVideos = videos;
            }
            
            // Set the decoded HTML content
            if (decodedVideos && decodedVideos.trim() !== '') {
                $('#modalProductVideosContent').html(decodedVideos);
                $('#modalProductVideosSection').show();
                console.log('✓ Showing Videos section');
            } else {
                $('#modalProductVideosSection').hide();
                console.log('✗ Videos content is empty after decoding');
            }
        } else {
            $('#modalProductVideosSection').hide();
            console.log('✗ Videos not available. Value:', videos, 'Type:', typeof videos, 'Video:', video);
        }
        
        // Populate delivery info if available (collapsible)
        var rawDeliveryInfo = $card.attr('data-product-delivery');
        var hasDeliveryInfo = rawDeliveryInfo && 
                             rawDeliveryInfo !== 'null' && 
                             rawDeliveryInfo !== 'undefined' && 
                             rawDeliveryInfo.trim() !== '';
        
        if (hasDeliveryInfo) {
            var decodedDeliveryInfo = decodeHtmlEntities(rawDeliveryInfo);
            // If decoded content has HTML tags, use it as-is, otherwise convert newlines to <br>
            if (decodedDeliveryInfo.indexOf('<') !== -1) {
                $('#modalProductDeliveryContent').html(decodedDeliveryInfo);
            } else {
                $('#modalProductDeliveryContent').html(decodedDeliveryInfo.replace(/\n/g, '<br>'));
            }
            $('#modalProductDeliverySection').show();
            console.log('✓ Showing Delivery Information section, length:', decodedDeliveryInfo.length);
        } else {
            $('#modalProductDeliverySection').hide();
            console.log('✗ Delivery Info not available. Value:', rawDeliveryInfo, 'Type:', typeof rawDeliveryInfo);
        }
        
        // Build carousel items - ORDER: Image 1, Image 2, Video (3rd)
        var carouselInner = $('#modalCarouselInner');
        var carouselIndicators = $('#modalCarouselIndicators');
        carouselInner.empty();
        carouselIndicators.empty();
        
        var itemIndex = 0;
        var firstItemAdded = false;
        
        // Add first image (always first, always active if it exists)
        if (image && image.trim() !== '' && image !== 'null' && image !== 'undefined') {
            var activeClass = !firstItemAdded ? 'active' : '';
            if (!firstItemAdded) firstItemAdded = true;
            carouselInner.append(
                '<div class="item ' + activeClass + '" data-zoom-image="' + image + '">' +
                '<img src="' + image + '" alt="' + title + '" class="img-responsive product-zoom-image" loading="eager" decoding="async" />' +
                '</div>'
            );
            carouselIndicators.append(
                '<li data-target="#productModalCarousel" data-slide-to="' + itemIndex + '" class="' + activeClass + '"></li>'
            );
            itemIndex++;
        }
        
        // Add second image if available (second position)
        if (image2 && image2.trim() !== '' && image2 !== 'null' && image2 !== 'undefined') {
            var activeClass = !firstItemAdded ? 'active' : '';
            if (!firstItemAdded) firstItemAdded = true;
            carouselInner.append(
                '<div class="item ' + activeClass + '" data-zoom-image="' + image2 + '">' +
                '<img src="' + image2 + '" alt="' + title + '" class="img-responsive product-zoom-image" loading="lazy" decoding="async" />' +
                '</div>'
            );
            carouselIndicators.append(
                '<li data-target="#productModalCarousel" data-slide-to="' + itemIndex + '" class="' + activeClass + '"></li>'
            );
            itemIndex++;
        }
        
        // Add third image if available (third position)
        if (image3 && image3.trim() !== '' && image3 !== 'null' && image3 !== 'undefined') {
            var activeClass = !firstItemAdded ? 'active' : '';
            if (!firstItemAdded) firstItemAdded = true;
            carouselInner.append(
                '<div class="item ' + activeClass + '" data-zoom-image="' + image3 + '">' +
                '<img src="' + image3 + '" alt="' + title + '" class="img-responsive product-zoom-image" loading="lazy" decoding="async" />' +
                '</div>'
            );
            carouselIndicators.append(
                '<li data-target="#productModalCarousel" data-slide-to="' + itemIndex + '" class="' + activeClass + '"></li>'
            );
            itemIndex++;
        }
        
        // Add fourth image if available (fourth position)
        if (image4 && image4.trim() !== '' && image4 !== 'null' && image4 !== 'undefined') {
            var activeClass = !firstItemAdded ? 'active' : '';
            if (!firstItemAdded) firstItemAdded = true;
            carouselInner.append(
                '<div class="item ' + activeClass + '" data-zoom-image="' + image4 + '">' +
                '<img src="' + image4 + '" alt="' + title + '" class="img-responsive product-zoom-image" loading="lazy" decoding="async" />' +
                '</div>'
            );
            carouselIndicators.append(
                '<li data-target="#productModalCarousel" data-slide-to="' + itemIndex + '" class="' + activeClass + '"></li>'
            );
            itemIndex++;
        }
        
        // Video is NOT added to carousel - it's only shown in the collapsible "Videos" section
        console.log('Total carousel items:', itemIndex);
        
        // Show/hide carousel controls based on number of items
        if (itemIndex > 1) {
            $('#modalCarouselPrev, #modalCarouselNext').show();
        } else {
            $('#modalCarouselPrev, #modalCarouselNext').hide();
        }
        
        // Reset carousel to first slide (image 1) and reinitialize
        // Remove all active classes first
        $('#modalCarouselInner .item').removeClass('active');
        $('#modalCarouselIndicators li').removeClass('active');
        
        // Set first item as active
        var $firstItem = $('#modalCarouselInner .item').first();
        var $firstIndicator = $('#modalCarouselIndicators li').first();
        if ($firstItem.length) {
            $firstItem.addClass('active');
            $firstIndicator.addClass('active');
        }
        
        // Reset carousel to first slide
        $('#productModalCarousel').carousel(0);
        // Force carousel to refresh after adding items
        $('#productModalCarousel').carousel('pause');
        // Ensure we're on the first slide (image 1, not video)
        setTimeout(function() {
            $('#productModalCarousel').carousel(0);
            // Double-check first item is active
            $('#modalCarouselInner .item').removeClass('active');
            $('#modalCarouselIndicators li').removeClass('active');
            $('#modalCarouselInner .item').first().addClass('active');
            $('#modalCarouselIndicators li').first().addClass('active');
        }, 150);
        
        // Function to shorten badge text to 5-15 characters
        function shortenBadge(text) {
            text = text.trim();
            
            // Common abbreviations
            var abbreviations = {
                'supplied as': '',
                'supplied': '',
                'as a': '',
                'as': '',
                'a': '',
                'resealable': 'Reseal',
                'which treats': '',
                'which': '',
                'treats': '',
                'about': '~',
                'or so': '',
                'or': '',
                'so': '',
                'standard': 'Std',
                'grams': 'g',
                'gram': 'g',
                'kilograms': 'kg',
                'kilogram': 'kg',
                'litres': 'L',
                'litre': 'L',
                'millilitres': 'ml',
                'millilitre': 'ml'
            };
            
            // Replace common words/phrases
            for (var full in abbreviations) {
                var regex = new RegExp('\\b' + full + '\\b', 'gi');
                text = text.replace(regex, abbreviations[full]);
            }
            
            // Remove extra spaces and clean up
            text = text.replace(/\s+/g, ' ');
            text = text.trim();
            
            // Extract key information (numbers, units, important words)
            // First check for "gallons" and skip it (don't convert to "g")
            if (/\d+\s*gallons?/i.test(text)) {
                return ''; // Return empty to filter out
            }
            var numberMatch = text.match(/\d+\s*(g|kg|L|ml|cm|m)/i);
            if (numberMatch) {
                text = numberMatch[0];
            } else {
                var numberOnly = text.match(/\d+/);
                if (numberOnly) {
                    text = numberOnly[0];
                } else {
                    // Get first word if no numbers
                    var words = text.split(' ');
                    text = words[0] || text;
                }
            }
            
            // Limit to 15 characters max
            if (text.length > 15) {
                text = text.substring(0, 15);
            }
            
            return text;
        }
        
        // Parse and display specs
        var specsArray = specs.split(',').map(function(s) { return s.trim(); }).filter(function(s) { 
            // Filter out badges that are just numbers or too short/meaningless
            if (s.length === 0) return false;
            // Skip if it contains "100 gallons" or similar (before shortening)
            if (/\d+\s*gallons?/i.test(s)) {
                return false;
            }
            // Skip if it's just a number (like "12")
            if (/^\d+$/.test(s)) {
                return false;
            }
            // Skip if shortened version would be just a number (like "12" from "12 or so")
            var shortened = shortenBadge(s);
            if (shortened === '' || /^\d+$/.test(shortened)) {
                return false;
            }
            // Skip if shortened is "100g" (from "100 gallons")
            if (shortened === '100g' || shortened === '100G') {
                return false;
            }
            // Skip if shortened is "ready" (from "ready to use")
            if (shortened.toLowerCase() === 'ready') {
                return false;
            }
            // Skip if it's too short and meaningless
            if (s.length < 3) {
                return false;
            }
            return true;
        });
        // Limit to max 2 badges
        specsArray = specsArray.slice(0, 2);
        var specsHtml = '<div class="product-specs">';
        specsArray.forEach(function(spec) {
            var shortened = shortenBadge(spec);
            // Double-check: don't display if shortened is just a number, "100g", or "ready"
            if (!/^\d+$/.test(shortened) && shortened !== '100g' && shortened !== '100G' && shortened.toLowerCase() !== 'ready') {
                specsHtml += '<span class="badge">' + shortened + '</span> ';
            }
        });
        specsHtml += '</div>';
        $('#modalProductSpecs').html(specsHtml);
        
        // Populate NPK if available
        if (npk) {
            $('#modalProductNPKValue').text(npk);
            $('#modalProductNPK').show();
        } else {
            $('#modalProductNPK').hide();
        }
        
        // Populate features - extract from description if features field is empty
        var rawFeatures = $card.attr('data-product-features');
        var hasFeatures = rawFeatures && 
                         rawFeatures !== 'null' && 
                         rawFeatures !== 'undefined' && 
                         rawFeatures.trim() !== '';
        
        if (hasFeatures) {
            // Decode HTML entities first
            var decodedFeatures = decodeHtmlEntities(rawFeatures);
            
            // Split by newline, bullet point, or pipe separator
            var featuresArray = [];
            if (decodedFeatures.indexOf('\n') !== -1) {
                featuresArray = decodedFeatures.split('\n').filter(function(f) { return f.trim().length > 0; });
            } else if (decodedFeatures.indexOf('•') !== -1) {
                featuresArray = decodedFeatures.split('•').filter(function(f) { return f.trim().length > 0; });
            } else if (decodedFeatures.indexOf('|') !== -1) {
                featuresArray = decodedFeatures.split('|').filter(function(f) { return f.trim().length > 0; });
            } else {
                featuresArray = [decodedFeatures];
            }
            
            var featuresHtml = '';
            featuresArray.forEach(function(feature) {
                var cleanFeature = feature.trim();
                cleanFeature = cleanFeature.replace(/^[•\-\*]\s*/, '');
                if (cleanFeature.length > 0) {
                    featuresHtml += '<li>' + cleanFeature + '</li>';
                }
            });
            if (featuresHtml) {
                $('#modalProductFeaturesList').html(featuresHtml);
                $('#modalProductFeaturesSection').show();
                console.log('✓ Showing Features section with', featuresArray.length, 'features');
            } else {
                $('#modalProductFeaturesSection').hide();
            }
        } else if (description && description.trim() !== '') {
            // Fallback: extract key points from description
            var descFeatures = description.split(/[.,;]/).filter(function(s) {
                return s.trim().length > 20; // Only sentences longer than 20 chars
            }).slice(0, 3); // Max 3 features
            
            if (descFeatures.length > 0) {
                var featuresHtml = '';
                descFeatures.forEach(function(feature) {
                    featuresHtml += '<li>' + feature.trim() + '</li>';
                });
                $('#modalProductFeaturesList').html(featuresHtml);
                $('#modalProductFeaturesSection').show();
                console.log('✓ Showing Features section (extracted from description)');
            } else {
                $('#modalProductFeaturesSection').hide();
            }
        } else {
            $('#modalProductFeaturesSection').hide();
        }
        
        // Populate application if available (collapsible)
        var rawApplication = $card.attr('data-product-application');
        var hasApplication = rawApplication && 
                            rawApplication !== 'null' && 
                            rawApplication !== 'undefined' && 
                            rawApplication.trim() !== '';
        
        if (hasApplication) {
            var decodedApplication = decodeHtmlEntities(rawApplication);
            // If decoded content has HTML tags, use it as-is, otherwise convert newlines to <br>
            if (decodedApplication.indexOf('<') !== -1) {
                $('#modalProductApplicationText').html(decodedApplication);
            } else {
                $('#modalProductApplicationText').html(decodedApplication.replace(/\n/g, '<br>'));
            }
            $('#modalProductApplicationSection').show();
            console.log('✓ Showing Application section, length:', decodedApplication.length);
        } else {
            $('#modalProductApplicationSection').hide();
            console.log('✗ Application not available. Value:', rawApplication, 'Type:', typeof rawApplication);
        }
        
        // Populate makes/coverage if available
        if (makes) {
            $('#modalProductMakesValue').text(makes);
            $('#modalProductMakes').show();
        } else {
            $('#modalProductMakes').hide();
        }
        
        // Show modal
        $('#productModal').modal('show');
        
        // Force show sections after modal is shown (double-check visibility)
        $('#productModal').one('shown.bs.modal', function() {
            setTimeout(function() {
                console.log('=== FINAL CHECK: Sections after modal shown ===');
                // Check each section and show if it has content
                var fullDescContent = $('#modalProductFullDescriptionText').html();
                if (fullDescContent && fullDescContent.trim() !== '') {
                    $('#modalProductFullDescriptionSection').show();
                    console.log('✓ Full Description shown, length:', fullDescContent.length);
                } else {
                    console.log('✗ Full Description empty');
                }
                
                var featuresContent = $('#modalProductFeaturesList').html();
                if (featuresContent && featuresContent.trim() !== '') {
                    $('#modalProductFeaturesSection').show();
                    console.log('✓ Features shown, length:', featuresContent.length);
                } else {
                    console.log('✗ Features empty');
                }
                
                var videosContent = $('#modalProductVideosContent').html();
                if (videosContent && videosContent.trim() !== '') {
                    $('#modalProductVideosSection').show();
                    console.log('✓ Videos shown, length:', videosContent.length);
                } else {
                    console.log('✗ Videos empty');
                }
                
                var applicationContent = $('#modalProductApplicationText').html();
                if (applicationContent && applicationContent.trim() !== '') {
                    $('#modalProductApplicationSection').show();
                    console.log('✓ Application shown, length:', applicationContent.length);
                } else {
                    console.log('✗ Application empty');
                }
                
                var deliveryContent = $('#modalProductDeliveryContent').html();
                if (deliveryContent && deliveryContent.trim() !== '') {
                    $('#modalProductDeliverySection').show();
                    console.log('✓ Delivery shown, length:', deliveryContent.length);
                } else {
                    console.log('✗ Delivery empty');
                }
                console.log('==============================================');
            }, 200);
        });
    }
    
    // Reinitialize Feefo widgets when modal is fully shown
    $('#productModal').on('shown.bs.modal', function() {
        // Reinitialize Feefo widgets after modal is fully displayed
        var reinitFeefo = function() {
            if (typeof Feefo !== 'undefined') {
                try {
                    Feefo.init();
                    // Also initialize when reviews section is expanded
                    setTimeout(function() {
                        if (typeof Feefo !== 'undefined') {
                            Feefo.init();
                        }
                    }, 500);
                } catch (e) {
                    console.error('Feefo reinitialization error:', e);
                }
            } else {
                setTimeout(reinitFeefo, 200);
            }
        };
        setTimeout(reinitFeefo, 500);
    });
    
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
        // Only run on mobile devices
        if (window.innerWidth > 767) {
            // On desktop, ensure items are visible
            const items = document.querySelectorAll('.about-feature-stacked-item');
            items.forEach(item => {
                item.classList.add('animate-in');
            });
            return;
        }
        
        const items = document.querySelectorAll('.about-feature-stacked-item');
        if (items.length === 0) return;
        
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
    
    // Scroll-triggered animation for "What's in our Superior Plant Food" section
    function animateFeaturesSection() {
        const section = document.querySelector('.features-section');
        if (!section) return;
        
        // Animate section title
        const sectionHead = section.querySelector('.section-head');
        const cards = section.querySelectorAll('.feature-nutrient-card');
        const productImage = section.querySelector('.features-product-image');
        
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
    });
    
    // Mobile Navigation - Close menu when clicking outside
    $(document).on('click', function(e) {
        var $navbarCollapse = $('#site-collapse-nav');
        var $navbarToggle = $('.navbar-toggle');
        
        // Only handle on mobile (when navbar-collapse is visible)
        if ($(window).width() <= 767 && $navbarCollapse.hasClass('in')) {
            // Check if click is outside the navbar and not on the toggle button
            if (!$navbarCollapse.is(e.target) && 
                $navbarCollapse.has(e.target).length === 0 && 
                !$navbarToggle.is(e.target) && 
                $navbarToggle.has(e.target).length === 0) {
                // Close the mobile menu
                $navbarCollapse.collapse('hide');
            }
        }
    });
    
    // Prevent clicks inside the mobile menu from closing it
    $('#site-collapse-nav').on('click', function(e) {
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

// Newsletter Form Submission
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

// Exit Intent Popup - Enhanced
(function() {
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
})();
</script>
@endpush
