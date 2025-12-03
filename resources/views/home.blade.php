@extends('layouts.app')

@php
use Illuminate\Support\Str;
@endphp

@section('title', 'Blooming Fast Plant Foods')

@section('content')
<!-- Start .header-section -->
<div id="home" class="header-section half-header section gradiant-background header-curbed">
    
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
    
    <!-- Desktop Slide-Out Menu -->
    <div class="desktop-slide-menu" id="desktopSlideMenu">
        <div class="desktop-slide-menu-overlay" id="desktopMenuOverlay"></div>
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
            </ul>
        </div>
    </div><!-- .navigation -->
    
    <div class="header-content">
        <div class="container">
            <div class="row row-vm">
                <div class="col-md-7">
                    <div class="header-texts tab-center mobile-center hero-content-mobile">
                        <div class="hero-badge wow fadeInUp" data-wow-duration=".5s">
                            <span>Premium Quality</span>
                        </div>
                        <h2 class="hero-title-gradient wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".1s">Superior Plant Food</h2>
                        <p class="lead hero-description wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">Our best-ever formulation for use all round the garden for <strong>more flowers</strong>, <strong>more fruit</strong>, <strong>better roots</strong> and <strong>better shoots</strong>.</p>
                        <div class="hero-sizes wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                            <span class="size-label">Available in 3 sizes:</span>
                            <div class="size-badges">
                                <span class="size-badge">1.25kg</span>
                                <span class="size-badge">500g</span>
                                <span class="size-badge">50g Trial</span>
                            </div>
                        </div>
                        <h3 class="heading-light hero-cta wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".4s">Click below to buy it from one of our stockists</h3>
                        <ul class="buttons">
                            <li><a href="https://www.yougarden.com/item-p-100062/blooming-fast-superior-soluble-fertiliser" class="button wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s" target="_blank" rel="noopener"><img src="{{ asset('images/yglogosmall.png') }}" alt="YouGarden" /></a></li>
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
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s" >
                        <img style="z-index: 999;" src="{{ asset('images/superiorV4.png') }}" alt="Citrus Feed" />
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .header-content -->
</div><!-- .header-section -->


<!-- Start .about-section  -->
<div id="about" class="about-section section pb-90 white-bg half-header-about about-section-bottom-curved about-section-top-curved">
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
                        <li class="about-feature-stacked-item" data-animation-delay="600">
                            <div class="about-feature-title"><strong>Fast</strong></div>
                            <div class="about-feature-content">acting and long lasting – the best results for your money, makes approx 500 litres from a 500g bag</div>
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


<!-- Start .features-section  -->
<div id="features" class="features-section section gradiant-background header-curbed features-curved-top">
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
                                <img src="{{ asset('images/superiorback.png') }}" alt="Superior Plant Food" />
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
                        <a class="left carousel-control" href="#testimonialsCarousel" role="button" data-slide="prev">
                            <span class="fa fa-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#testimonialsCarousel" role="button" data-slide="next">
                            <span class="fa fa-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>
                </div>
            </div>
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .customer-reviews-section  -->



<!-- Start .products-section  -->
<div id="products" class="products-section section gradiant-background pt-120 pb-120 products-curved-top products-section-bottom-curved">
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
                        <div class="product-image mb-20">
                            @if($index < 2)
                            <span class="best-seller-badge">Best Seller</span>
                            @endif
                            <img src="{{ $product->image ? asset($product->image) : asset('images/superiorV4.png') }}" alt="{{ $product->title }}" class="img-responsive" />
                        </div>
                        <div class="product-details p-30">
                            <h4 class="product-title mb-15">{{ $product->title }}</h4>
                            <p class="product-description mb-20">{{ $product->description ?? '' }}</p>
                            @if($product->specs)
                            <div class="product-specs mb-20">
                                @php
                                    $specs = explode(',', $product->specs);
                                    // Filter out badges that are just numbers or too short/meaningless
                                    $specs = array_filter(array_map('trim', $specs), function($spec) {
                                        $spec = trim($spec);
                                        // Skip if it's just a number (like "12")
                                        if (preg_match('/^\d+$/', $spec)) {
                                            return false;
                                        }
                                        // Skip if it's too short and meaningless
                                        if (strlen($spec) < 3) {
                                            return false;
                                        }
                                        return true;
                                    });
                                    // Limit to max 2 badges
                                    $specs = array_slice($specs, 0, 2);
                                    
                                    // Function to shorten badge text to 5-15 characters
                                    $shortenBadge = function($text) {
                                        $text = trim($text);
                                        
                                        // Common abbreviations
                                        $abbreviations = [
                                            'supplied as' => '',
                                            'supplied' => '',
                                            'as a' => '',
                                            'as' => '',
                                            'a' => '',
                                            'resealable' => 'Reseal',
                                            'resealable' => 'Reseal',
                                            'which treats' => '',
                                            'which' => '',
                                            'treats' => '',
                                            'about' => '~',
                                            'or so' => '',
                                            'or' => '',
                                            'so' => '',
                                            'standard' => 'Std',
                                            'grams' => 'g',
                                            'gram' => 'g',
                                            'kilograms' => 'kg',
                                            'kilogram' => 'kg',
                                            'litres' => 'L',
                                            'litre' => 'L',
                                            'millilitres' => 'ml',
                                            'millilitre' => 'ml',
                                        ];
                                        
                                        // Replace common words/phrases
                                        foreach ($abbreviations as $full => $short) {
                                            $text = preg_replace('/\b' . preg_quote($full, '/') . '\b/i', $short, $text);
                                        }
                                        
                                        // Remove extra spaces and clean up
                                        $text = preg_replace('/\s+/', ' ', $text);
                                        $text = trim($text);
                                        
                                        // Extract key information (numbers, units, important words)
                                        // Try to get first meaningful word or number
                                        if (preg_match('/\d+\s*(g|kg|L|ml|cm|m)/i', $text, $matches)) {
                                            $text = $matches[0];
                                        } elseif (preg_match('/\d+/', $text, $matches)) {
                                            $text = $matches[0];
                                        } else {
                                            // Get first word if no numbers
                                            $words = explode(' ', $text);
                                            $text = !empty($words[0]) ? $words[0] : $text;
                                        }
                                        
                                        // Limit to 15 characters max, ensure at least 5 if possible
                                        if (strlen($text) > 15) {
                                            $text = substr($text, 0, 15);
                                        }
                                        
                                        // If too short, try to add context
                                        if (strlen($text) < 5 && preg_match('/\d+/', $text)) {
                                            // Keep as is if it has a number
                                        }
                                        
                                        return $text;
                                    };
                                @endphp
                                @foreach($specs as $spec)
                                    <span class="badge">{{ $shortenBadge($spec) }}</span>
                                @endforeach
                        </div>
                            @endif
                            <ul class="product-buttons">
                                @if($product->yg_link)
                                <li><a href="{{ $product->yg_link }}" class="product-button" target="_blank" rel="noopener" onclick="event.stopPropagation();"><img src="{{ asset('images/yglogosmall.png') }}" alt="YouGarden" /></a></li>
                                @endif
                                @if($product->amazon_link)
                                <li><a href="{{ $product->amazon_link }}" class="product-button" target="_blank" rel="noopener" onclick="event.stopPropagation();"><img src="{{ asset('images/amazoncolour.png') }}" alt="Amazon" /></a></li>
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
                        
                        <!-- Product Buttons Below Specs -->
                        <div class="product-modal-buttons-top mb-30">
                            <ul class="product-buttons">
                                <li><a id="modalProductYGTop" href="" class="product-button" target="_blank" rel="noopener"><img src="{{ asset('images/yglogosmall.png') }}" alt="YouGarden" /></a></li>
                                <li><a id="modalProductAmazonTop" href="" class="product-button" target="_blank" rel="noopener"><img src="{{ asset('images/amazoncolour.png') }}" alt="Amazon" /></a></li>
                            </ul>
                        </div>
                        
                        <!-- Collapsible Full Description -->
                        <div class="product-modal-full-description mb-20">
                            <a class="collapsed" data-toggle="collapse" href="#modalProductFullDescription" aria-expanded="false" aria-controls="modalProductFullDescription">
                                <strong>Full Description <i class="fa fa-chevron-down"></i></strong>
                            </a>
                            <div class="collapse" id="modalProductFullDescription">
                                <div class="well" id="modalProductFullDescriptionText">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Collapsible Videos -->
                        <div class="product-modal-videos mb-20" style="display: none;">
                            <a class="collapsed" data-toggle="collapse" href="#modalProductVideos" aria-expanded="false" aria-controls="modalProductVideos">
                                <strong>Videos <i class="fa fa-chevron-down"></i></strong>
                            </a>
                            <div class="collapse" id="modalProductVideos">
                                <div class="well" id="modalProductVideosContent">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Collapsible Reviews -->
                        <div class="product-modal-reviews mb-20" style="display: none;">
                            <a class="collapsed" data-toggle="collapse" href="#modalProductReviews" aria-expanded="false" aria-controls="modalProductReviews">
                                <strong>Reviews <i class="fa fa-chevron-down"></i></strong>
                            </a>
                            <div class="collapse" id="modalProductReviews">
                                <div class="well" id="modalProductReviewsContent">
                                    <!-- Feefo Reviews Widgets will be loaded here -->
                                    <div id="feefo-product-review-widgetId" class="feefo-review-widget-product" data-feefo-initialized="true" style="flex: 1 1 auto;"></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Collapsible Delivery Info -->
                        <div class="product-modal-delivery mb-20" style="display: none;">
                            <a class="collapsed" data-toggle="collapse" href="#modalProductDelivery" aria-expanded="false" aria-controls="modalProductDelivery">
                                <strong>Delivery Information <i class="fa fa-chevron-down"></i></strong>
                            </a>
                            <div class="collapse" id="modalProductDelivery">
                                <div class="well" id="modalProductDeliveryContent">
                                </div>
                            </div>
                        </div>
                        
                        <div id="modalProductDetails" class="product-modal-details">
                            <div id="modalProductNPK" class="product-detail-item mb-15" style="display: none;">
                                <strong>NPK Ratio:</strong> <span id="modalProductNPKValue"></span>
                            </div>
                            <div id="modalProductFeatures" class="product-detail-item mb-15" style="display: none;">
                                <strong>Key Features:</strong>
                                <ul id="modalProductFeaturesList" class="product-features-list"></ul>
                            </div>
                            <div id="modalProductApplication" class="product-detail-item mb-15" style="display: none;">
                                <strong>Application:</strong>
                                <div id="modalProductApplicationText"></div>
                            </div>
                            <div id="modalProductMakes" class="product-detail-item mb-20" style="display: none;">
                                <strong>Coverage:</strong> <span id="modalProductMakesValue"></span>
                            </div>
                        </div>
                        
                        <div class="product-modal-buttons">
                            <ul class="product-buttons">
                                <li><a id="modalProductYG" href="" class="product-button" target="_blank" rel="noopener"><img src="{{ asset('images/yglogosmall.png') }}" alt="YouGarden" /></a></li>
                                <li><a id="modalProductAmazon" href="" class="product-button" target="_blank" rel="noopener"><img src="{{ asset('images/amazoncolour.png') }}" alt="Amazon" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <a href="{{ route('blog.show', $article->slug) }}">
                            <img src="{{ $article->image ? asset($article->image) : asset('images/superiorV4.png') }}" alt="{{ $article->title }}" class="img-responsive" />
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
                            <a href="{{ route('blog.show', $article->slug) }}">{{ $article->title }}</a>
                        </h3>
                        <p class="blog-excerpt mb-20">{{ $article->excerpt ?? Str::limit(strip_tags($article->content ?? ''), 150) }}</p>
                        <a href="{{ route('blog.show', $article->slug) }}" class="button button-primary">Read Guide</a>
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

<!-- Start .footer-section  -->
<div class="footer-section gradiant-background section pt-80 pb-40">
    <div class="container">
        <div class="row">
            <!-- Footer Brand Column -->
            <div class="col-md-4 col-sm-6 mb-40">
                <div class="footer-brand">
                    <img src="{{ asset('images/logo.png') }}" alt="Blooming Fast" class="footer-logo mb-20" style="max-width: 200px; filter: brightness(0) invert(1);" />
                    <p class="heading-light">Premium plant foods and fertilisers for bigger, better blooms and healthier plants. Professional grade formulations for your garden.</p>
                </div>
            </div><!-- .col -->
            
            <!-- Quick Links Column -->
            <div class="col-md-2 col-sm-6 mb-40">
                <h5 class="heading-light mb-20">Quick Links</h5>
                <ul class="footer-links-list">
                    <li><a href="#home" class="heading-light">Home</a></li>
                    <li><a href="#about" class="heading-light">About</a></li>
                    <li><a href="#features" class="heading-light">Features</a></li>
                    <li><a href="#products" class="heading-light">Products</a></li>
                    <li><a href="#videos" class="heading-light">Videos</a></li>
                    <li><a href="#faq" class="heading-light">FAQ</a></li>
                    <li><a href="{{ route('blog.index') }}" class="heading-light">Blog & Guides</a></li>
                </ul>
            </div><!-- .col -->
            
            <!-- Products Column -->
            <div class="col-md-3 col-sm-6 mb-40">
                <h5 class="heading-light mb-20">Our Products</h5>
                <ul class="footer-links-list">
                    <li><a href="https://www.yougarden.com/item-p-100062/blooming-fast-superior-soluble-fertiliser-500g" class="heading-light" target="_blank" rel="noopener">Superior Soluble Fertiliser</a></li>
                    <li><a href="https://www.yougarden.com/item-p-100196/ultimate-rose-bloom-booster-complete-fertiliser-750g" class="heading-light" target="_blank" rel="noopener">Rose Bloom Booster</a></li>
                    <li><a href="https://www.yougarden.com/item-p-100118/blooming-fast-swell-gel-and-feed-250g" class="heading-light" target="_blank" rel="noopener">Swell Gell & Feed</a></li>
                    <li><a href="https://www.yougarden.com/item-p-100016/blooming-fast-citrus-feed-150g" class="heading-light" target="_blank" rel="noopener">Citrus Feed</a></li>
                    <li><a href="#products" class="heading-light">View All Products</a></li>
                </ul>
            </div><!-- .col -->
            
            <!-- Where to Buy Column -->
            <div class="col-md-3 col-sm-6 mb-40">
                <h5 class="heading-light mb-20">Where to Buy</h5>
                <ul class="footer-links-list">
                    <li><a href="https://www.yougarden.com" class="heading-light" target="_blank" rel="noopener">YouGarden</a></li>
                    <li><a href="https://www.amazon.co.uk" class="heading-light" target="_blank" rel="noopener">Amazon</a></li>
                </ul>
                <div class="footer-social mt-30">
                    <p class="heading-light mb-15">Follow Us</p>
                    <ul class="social-links">
                        <li><a href="#" class="heading-light" aria-label="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="heading-light" aria-label="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="heading-light" aria-label="Instagram"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
        
        <!-- Footer Bottom -->
        <div class="row">
            <div class="col-md-12">
                <div class="footer-bottom text-center pt-40 border-top-footer">
                    <p class="heading-light mb-0">Copyright © {{ date('Y') }} Blooming Fast. All rights reserved.</p>
                    @auth
                    <p class="heading-light mt-10 mb-0">
                        <a href="{{ route('admin.blogs.index') }}" class="heading-light" style="text-decoration: underline;">Admin Dashboard</a> | 
                        <a href="{{ route('admin.logout') }}" class="heading-light" style="text-decoration: underline;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </p>
                    @else
                    <p class="heading-light mt-10 mb-0">
                        <a href="{{ route('admin.login') }}" class="heading-light" style="text-decoration: underline;">Admin Login</a>
                    </p>
                    @endauth
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container  -->
</div><!-- .footer-section  -->
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Handle product card clicks
    $('.product-card-clickable').on('click', function(e) {
        // Don't trigger if clicking on buttons
        if ($(e.target).closest('.product-button').length) {
            return;
        }
        
        var $card = $(this);
        var title = $card.data('product-title');
        var image = $card.data('product-image');
        var image2 = $card.data('product-image-2');
        var video = $card.data('product-video');
        var description = $card.data('product-description');
        var fullDescription = $card.data('product-full-description');
        var videos = $card.data('product-videos');
        var reviews = $card.data('product-reviews');
        var deliveryInfo = $card.data('product-delivery');
        var specs = $card.data('product-specs');
        var ygLink = $card.data('product-yg');
        var amazonLink = $card.data('product-amazon');
        var npk = $card.data('product-npk');
        var features = $card.data('product-features');
        var application = $card.data('product-application');
        var makes = $card.data('product-makes');
        var sku = $card.data('product-sku');
        
        // Populate basic modal fields
        $('#modalProductTitle').text(title);
        $('#modalProductDescription').text(description);
        $('#modalProductYG').attr('href', ygLink);
        $('#modalProductAmazon').attr('href', amazonLink);
        $('#modalProductYGTop').attr('href', ygLink);
        $('#modalProductAmazonTop').attr('href', amazonLink);
        
        // Populate full description if available
        if (fullDescription) {
            $('#modalProductFullDescriptionText').html(fullDescription.replace(/\n/g, '<br>'));
            $('.product-modal-full-description').show();
        } else {
            $('.product-modal-full-description').hide();
        }
        
        // Populate videos if available
        if (videos) {
            // Get the raw attribute value to avoid jQuery's automatic decoding
            var rawVideos = $card.attr('data-product-videos');
            var decodedVideos = '';
            
            if (rawVideos) {
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
            } else if (typeof videos === 'string') {
                // Fallback: try to decode the videos string directly
                var textarea = document.createElement('textarea');
                textarea.innerHTML = videos;
                decodedVideos = textarea.value;
                
                if (decodedVideos.indexOf('&lt;') !== -1 || decodedVideos.indexOf('&quot;') !== -1) {
                    var tempDiv = document.createElement('div');
                    tempDiv.textContent = videos;
                    decodedVideos = tempDiv.innerHTML;
                } else {
                    decodedVideos = videos;
                }
            }
            
            // Set the decoded HTML content
            $('#modalProductVideosContent').html(decodedVideos);
            $('.product-modal-videos').show();
        } else {
            $('.product-modal-videos').hide();
        }
        
        // Populate Feefo reviews if available
        // Check for SKU first (for Ultimate Rose Bloom Booster SKU: 100196 or other products with SKU)
        // Fallback: Check product title for specific products
        if (!sku && title) {
            var titleLower = title.toLowerCase();
            if (titleLower.includes('ultimate rose bloom booster')) {
                sku = '100196';
            } else if (titleLower.includes('swellgel') || titleLower.includes('swell gel') || titleLower.includes('swellgell')) {
                sku = '100118';
            } else if (titleLower.includes('superior soluble fertiliser') || titleLower.includes('superior soluble')) {
                sku = '100062';
            } else if (titleLower.includes('citrus feed') || titleLower.includes('citrus')) {
                sku = '100016';
            } else if (titleLower.includes('acer feed') || titleLower.includes('acer')) {
                sku = '100105';
            } else if (titleLower.includes('clematis feed') || titleLower.includes('clematis')) {
                sku = '100106';
            } else if (titleLower.includes('fish blood') || titleLower.includes('fish blood and bone')) {
                sku = '100046';
            }
        }
        
        if (sku) {
            // Clear previous content and use Feefo widget format with unique ID
            var widgetId = 'feefo-product-review-widgetId-modal-' + sku;
            var feefoWidget = '<div id="' + widgetId + '" class="feefo-review-widget-product" data-product-sku="' + sku + '" style="flex: 1 1 auto; min-height: 200px;"></div>';
            
            $('#modalProductReviewsContent').html(feefoWidget);
            
            // Store SKU for later initialization
            window.currentProductSKU = sku;
            
            // Function to initialize Feefo widgets
            var initFeefoWidgets = function() {
                if (typeof Feefo !== 'undefined') {
                    try {
                        // Ensure widgets are in DOM before initializing
                        var widgetElement = $('#' + widgetId);
                        if (widgetElement.length > 0) {
                            console.log('Initializing Feefo widget for SKU:', sku, 'Widget ID:', widgetId);
                            
                            // Initialize Feefo
                            Feefo.init();
                            
                            // Re-initialize after a delay to ensure widgets render
                            setTimeout(function() {
                                if (typeof Feefo !== 'undefined') {
                                    Feefo.init();
                                }
                            }, 500);
                            
                            // One more initialization after widget should be loaded
                            setTimeout(function() {
                                if (typeof Feefo !== 'undefined') {
                                    Feefo.init();
                                }
                            }, 1500);
                        }
                    } catch (e) {
                        console.error('Feefo initialization error:', e);
                    }
                } else {
                    // Wait for Feefo to be available (max 10 seconds)
                    var attempts = 0;
                    var checkFeefo = setInterval(function() {
                        attempts++;
                        if (typeof Feefo !== 'undefined' || attempts > 50) {
                            clearInterval(checkFeefo);
                            if (typeof Feefo !== 'undefined') {
                                initFeefoWidgets();
                            }
                        }
                    }, 200);
                }
            };
            
            // Initialize widgets when reviews section is expanded (Bootstrap 3/4 compatible)
            $('#modalProductReviews').off('shown.bs.collapse shown').on('shown.bs.collapse shown', function() {
                console.log('Reviews section expanded, initializing Feefo widget');
                setTimeout(function() {
                    initFeefoWidgets();
                }, 300);
            });
            
            // Also initialize when modal is shown
            $('#productModal').one('shown.bs.modal', function() {
                console.log('Modal shown, initializing Feefo widget');
                setTimeout(function() {
                    initFeefoWidgets();
                }, 1000);
            });
            
            // Feefo widgets are loaded via feefo_widgets_loader.js in the layout
            // Wait for Feefo to be available and initialize
            setTimeout(function() {
                initFeefoWidgets();
            }, 1000);
            
            // Always show reviews section if we have a SKU
            $('.product-modal-reviews').show();
        } else if (reviews) {
            // Clear previous content
            $('#modalProductReviewsContent').html('<div id="feefo-product-review-widgetId" class="feefo-review-widget-product" data-feefo-initialized="true" style="flex: 1 1 auto;"></div>');
            
            // If reviews is a Feefo product ID (format: feefo:PRODUCT_ID), load Feefo widget
            if (reviews.startsWith('feefo:')) {
                var feefoProductId = reviews.replace('feefo:', '');
                var feefoWidget = '<div class="feefo-review-widget" data-feefo-product-id="' + feefoProductId + '"></div>';
                $('#feefo-reviews-widget').html(feefoWidget);
                
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
                
                $('.product-modal-reviews').show();
            } else {
                // Fallback: Use iframe embed for Feefo reviews
                // Format: feefo-embed:WIDGET_URL
                if (reviews.startsWith('feefo-embed:')) {
                    var embedUrl = reviews.replace('feefo-embed:', '');
                    var iframeHtml = '<iframe src="' + embedUrl + '" width="100%" height="600" frameborder="0" style="border: none;"></iframe>';
                    $('#feefo-reviews-widget').html(iframeHtml);
                    $('.product-modal-reviews').show();
                } else {
                    // Legacy HTML reviews (fallback) - decode HTML entities if escaped
                    var tempDiv = document.createElement('div');
                    tempDiv.innerHTML = reviews;
                    var decodedReviews = tempDiv.innerHTML;
                    $('#modalProductReviewsContent').html(decodedReviews);
                    $('.product-modal-reviews').show();
                }
            }
        } else {
            $('.product-modal-reviews').hide();
        }
        
        // Populate delivery info if available
        if (deliveryInfo) {
            $('#modalProductDeliveryContent').html(deliveryInfo.replace(/\n/g, '<br>'));
            $('.product-modal-delivery').show();
        } else {
            $('.product-modal-delivery').hide();
        }
        
        // Reset collapse states
        $('#modalProductFullDescription, #modalProductVideos, #modalProductReviews, #modalProductDelivery').collapse('hide');
        
        // Build carousel items
        var carouselInner = $('#modalCarouselInner');
        var carouselIndicators = $('#modalCarouselIndicators');
        carouselInner.empty();
        carouselIndicators.empty();
        
        var itemIndex = 0;
        
        // Add first image
        if (image) {
            var activeClass = itemIndex === 0 ? 'active' : '';
            carouselInner.append(
                '<div class="item ' + activeClass + '" data-zoom-image="' + image + '">' +
                '<img src="' + image + '" alt="' + title + '" class="img-responsive product-zoom-image" />' +
                '</div>'
            );
            carouselIndicators.append(
                '<li data-target="#productModalCarousel" data-slide-to="' + itemIndex + '" class="' + activeClass + '"></li>'
            );
            itemIndex++;
        }
        
        // Add second image if available
        if (image2) {
            var activeClass = itemIndex === 0 ? 'active' : '';
            carouselInner.append(
                '<div class="item ' + activeClass + '" data-zoom-image="' + image2 + '">' +
                '<img src="' + image2 + '" alt="' + title + '" class="img-responsive product-zoom-image" />' +
                '</div>'
            );
            carouselIndicators.append(
                '<li data-target="#productModalCarousel" data-slide-to="' + itemIndex + '" class="' + activeClass + '"></li>'
            );
            itemIndex++;
        }
        
        // Add video if available
        if (video) {
            var activeClass = itemIndex === 0 ? 'active' : '';
            carouselInner.append(
                '<div class="item ' + activeClass + '">' +
                '<div class="embed-responsive embed-responsive-16by9">' +
                '<iframe class="embed-responsive-item" src="' + video + '" allowfullscreen></iframe>' +
                '</div>' +
                '</div>'
            );
            carouselIndicators.append(
                '<li data-target="#productModalCarousel" data-slide-to="' + itemIndex + '" class="' + activeClass + '"></li>'
            );
            itemIndex++;
        }
        
        // Show/hide carousel controls based on number of items
        if (itemIndex > 1) {
            $('#modalCarouselPrev, #modalCarouselNext').show();
        } else {
            $('#modalCarouselPrev, #modalCarouselNext').hide();
        }
        
        // Reset carousel to first slide
        $('#productModalCarousel').carousel(0);
        
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
            // Skip if it's just a number (like "12")
            if (/^\d+$/.test(s)) {
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
            specsHtml += '<span class="badge">' + shortenBadge(spec) + '</span> ';
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
        
        // Populate features if available
        if (features) {
            // Split by newline, bullet point, or pipe separator
            var featuresArray = [];
            if (features.indexOf('\n') !== -1) {
                // Split by newlines
                featuresArray = features.split('\n').filter(function(f) { return f.trim().length > 0; });
            } else if (features.indexOf('•') !== -1) {
                // Split by bullet points
                featuresArray = features.split('•').filter(function(f) { return f.trim().length > 0; });
            } else if (features.indexOf('|') !== -1) {
                // Split by pipe
                featuresArray = features.split('|').filter(function(f) { return f.trim().length > 0; });
            } else {
                // Single feature
                featuresArray = [features];
            }
            
            var featuresHtml = '';
            featuresArray.forEach(function(feature) {
                var cleanFeature = feature.trim();
                // Remove leading bullet if still present
                cleanFeature = cleanFeature.replace(/^[•\-\*]\s*/, '');
                if (cleanFeature.length > 0) {
                    featuresHtml += '<li>' + cleanFeature + '</li>';
                }
            });
            $('#modalProductFeaturesList').html(featuresHtml);
            $('#modalProductFeatures').show();
        } else {
            $('#modalProductFeatures').hide();
        }
        
        // Populate application if available
        if (application) {
            $('#modalProductApplicationText').html(application.replace(/\n/g, '<br>'));
            $('#modalProductApplication').show();
        } else {
            $('#modalProductApplication').hide();
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
    });
    
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
</script>
@endpush
