@extends('layouts.app')

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
                </div>
            </div><!-- /.container -->
        </nav>
    </div><!-- .navigation -->
    
    <div class="header-content">
        <div class="container">
            <div class="row row-vm">
                <div class="col-md-7">
                    <div class="header-texts tab-center mobile-center">
                        <div class="hero-badge wow fadeInUp" data-wow-duration=".5s">
                            <span>Premium Quality</span>
                        </div>
                        <h2 class="wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".1s">Superior Plant Food Plus</h2>
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
<div id="about" class="about-section section pb-90 white-bg half-header-about about-section-bottom-curved">
    <div class="container tab-fix">
        <div class="section-head text-center">
            <div class="row">
                <div class="col-md-9 col-md-offset-1">
                    <h2 class="heading">About <span>Superior Plant Food PLUS</span></h2>
                    <p class="lead">For stunning displays of first-class flowers and vegetables, this superior plant food is a high potency, professional grade fertiliser for use all year round in your garden, simply mix with water for incredible results.</p>
                    <ul>
                        <li class="one"> <span>PACKED</span> with Potash for flowers, fruits and veg</li>
                        <li class="one"> <span>JAMMED</span> with nitrogen and phosphorous for healthy leaves, shoots and roots</li>
                        <li class="one"> <span>BRIMMING</span> with 7 vital trace elements for maximum health</li>
                        <li class="one"> Plus we've added the magic ingredient – Humic Acid – to BOOST your plants</li>
                        <li class="one"> Fast acting and long lasting – the best results for your money, makes approx 500 litres from a 500g bag</li>
                    </ul>
                </div>
            </div>
        </div><!-- .section-head -->
        <div class="row tab-center mobile-center">
            <div class="col-md-6">
                <div class="video wow fadeInLeft" data-wow-duration=".5s">
                    <img src="{{ asset('images/video.png') }}" alt="about-video" />
                    <div class="video-overlay gradiant-background"></div>
                    <a href="https://vimeo.com/170471588" class="video-play" data-effect="mfp-3d-unfold"><i class="fa fa-play"></i></a>
                </div>
            </div><!-- .col -->
            <div class="col-md-6">
                <div class="txt-entry">
                    <p class="lead">Supplied in a resealable pouch, Superior Plant Food Plus is easy to dissolve in water, giving fast-acting results as it is delivered straight to the plant's roots and leaves.</p>
                    <p>Superior by name and Superior by nature, the only fertiliser you need for your garden for more flowers and more fruit, as well as better roots and shoots too. You can transform the performance of your plants with regular feeding throughout the main growing season.</p>
                    <p>Simple to use, just add one 5g scoop, included in the pack, to a gallon of water (4.5 litres) or a standard watering can full, and simply water on weekly during the growing season.</p>
                    <div class="mt-30">
                        <a href="#products" class="button button-primary">View All Products</a>
                    </div>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
        
    </div><!-- .container -->
</div><!-- .about-section  -->


<!-- Start .features-section  -->
<div id="features" class="features-section section gradiant-background header-curbed features-curved-top features-section-bottom-curved">
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
        <div class="features-content pt-10">
            <div class="row">
                <div class="col-md-3">
                    <div class="features-list text-right tab-left mobile-left">
                        <div class="single-features icon-right wow fadeIn">
                            <em class="ti ti-check"></em>
                            <h4>Nitrogen</h4>
                            <p>(the N in NPK), essential for making proteins and therefore cell growth </p>
                        </div>
                        <div class="single-features icon-right">
                            <em class="ti ti-check"></em>
                            <h4>Potassium oxide </h4>
                            <p>(the K in NPK) for respiration and photosynthesis</p>
                        </div>
                        <div class="single-features icon-right">
                            <em class="ti ti-check"></em>
                            <h4>Boron</h4>
                            <p>for healthy cell growth</p>
                        </div>
                        <div class="single-features icon-right">
                            <em class="ti ti-check"></em>
                            <h4>Iron</h4>
                            <p>for chlorophyll production</p>
                        </div>
                    </div>
                </div><!-- .col -->
                <div class="col-md-3 pull-right">
                    <div class="features-list wow fadeIn">
                        <div class="single-features">
                            <em class="ti ti-check"></em>
                            <h4>Phosphorous pentoxide</h4>
                            <p>(the P in NPK) for respiration and growth</p>
                        </div>
                        <div class="single-features">
                            <em class="ti ti-check"></em>
                            <h4>Magnesium oxide </h4>
                            <p>for photosynthesis (how plants get their energy)</p>
                        </div>
                        <div class="single-features">
                            <em class="ti ti-check"></em>
                            <h4>Copper</h4>
                            <p>for metabolic and respiratory processes </p>
                        </div>
                        <div class="single-features">
                            <em class="ti ti-check"></em>
                            <h4>Manganese</h4>
                            <p>for photosynthesis</p>
                        </div>
                    </div>
                </div><!-- .col -->
                <div class="col-md-6 text-center push-left">
                    <div class="wow fadeInUp" data-wow-duration="1s">
                        <img src="{{ asset('images/superiorback.png') }}" alt="features-mockup" />
                    </div>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .features-content -->
    </div><!-- .container -->
</div><!-- .features-section  -->



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
                <!-- Product Card 1: Bloom Booster -->
                <div class="col-md-4 col-sm-6 mb-40">
                    <div class="product-card white-bg text-center wow fadeInUp product-card-clickable" data-wow-duration=".5s" data-product-title="Ultimate Rose Bloom Booster" data-product-image="{{ asset('images/bloom-booster-p1.jpg') }}" data-product-image-2="{{ asset('images/bloom-booster-p1.jpg') }}" data-product-video="https://vimeo.com/170471588" data-product-description="Complete fertiliser specially formulated for roses. Promotes bigger, better blooms and healthy growth." data-product-full-description="Ultimate Rose Bloom Booster is a complete fertiliser specially formulated to give your roses the perfect balance of nutrients they need to thrive. This premium formulation promotes bigger, better blooms and encourages healthy, vigorous growth throughout the growing season. Whether you're growing hybrid teas, floribundas, climbers, or shrub roses, this fertiliser provides all the essential nutrients your roses need for stunning displays of beautiful flowers. Simply apply around the base of your roses during the growing season, mix with water, and apply weekly for best results. Your roses will reward you with an abundance of vibrant, healthy blooms." data-product-videos='<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://player.vimeo.com/video/170471588" allowfullscreen></iframe></div>' data-product-reviews='<div class="review-item"><div class="review-rating">★★★★★</div><div class="review-author">Sarah M.</div><div class="review-date">2 weeks ago</div><div class="review-text">Excellent fertiliser! My roses have never looked better. Bigger blooms and healthier plants.</div></div><div class="review-item"><div class="review-rating">★★★★☆</div><div class="review-author">John D.</div><div class="review-date">1 month ago</div><div class="review-text">Great results after just a few weeks. Easy to use and effective.</div></div>' data-product-delivery="Standard Delivery: £4.95 (3-5 working days) | Express Delivery: £7.95 (1-2 working days) | Free Delivery on orders over £50. All orders are dispatched within 1-2 working days. Delivery to UK mainland only. For international delivery, please contact us." data-product-specs="750g, NPK Balanced" data-product-yg="https://www.yougarden.com/item-p-100196/ultimate-rose-bloom-booster-complete-fertiliser-750g" data-product-amazon="https://www.amazon.co.uk/s?k=blooming+fast+ultimate+rose+bloom+booster" data-product-npk="Balanced NPK" data-product-features="Specially formulated for roses|Promotes bigger, better blooms|Encourages healthy growth|Complete fertiliser with all essential nutrients" data-product-application="Apply around the base of roses during the growing season. Mix with water and apply weekly for best results." data-product-makes="750g pack">
                        <div class="product-image mb-20">
                            <img src="{{ asset('images/bloom-booster-p1.jpg') }}" alt="Ultimate Rose Bloom Booster" class="img-responsive" />
                        </div>
                        <div class="product-details p-30">
                            <h4 class="product-title mb-15">Ultimate Rose Bloom Booster</h4>
                            <p class="product-description mb-20">Complete fertiliser specially formulated for roses. Promotes bigger, better blooms and healthy growth.</p>
                            <div class="product-specs mb-20">
                                <span class="badge">750g</span>
                                <span class="badge">NPK Balanced</span>
                            </div>
                            <ul class="product-buttons">
                                <li><a href="https://www.yougarden.com/item-p-100196/ultimate-rose-bloom-booster-complete-fertiliser-750g" class="product-button" target="_blank" rel="noopener" onclick="event.stopPropagation();"><img src="{{ asset('images/yglogosmall.png') }}" alt="YouGarden" /></a></li>
                                <li><a href="https://www.amazon.co.uk/s?k=blooming+fast+ultimate+rose+bloom+booster" class="product-button" target="_blank" rel="noopener" onclick="event.stopPropagation();"><img src="{{ asset('images/amazoncolour.png') }}" alt="Amazon" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 2: Swell Gell & Feed -->
                <div class="col-md-4 col-sm-6 mb-40">
                    <div class="product-card white-bg text-center wow fadeInUp product-card-clickable" data-wow-duration=".5s" data-wow-delay=".1s" data-product-title="Swell Gell & Feed" data-product-image="{{ asset('images/swellgell-1.jpg') }}" data-product-image-2="{{ asset('images/swellgell-1.jpg') }}" data-product-video="https://vimeo.com/170471588" data-product-description="Revolutionary water-retaining gel with built-in plant food. Reduces watering frequency while feeding your plants." data-product-full-description="Swell Gell & Feed is a revolutionary water-retaining gel with built-in plant food that solves two problems at once. The advanced gel technology absorbs and stores water, then releases it gradually to your plants as they need it, significantly reducing watering frequency. At the same time, the built-in plant food provides essential nutrients to promote healthy growth. This innovative product is perfect for containers, hanging baskets, and plants in dry or sunny positions. Simply mix with compost when planting or apply as a top dressing. The gel will absorb water during watering and release it gradually, keeping your plants hydrated and fed for longer periods." data-product-videos="{{ htmlspecialchars('<div class=\"embed-responsive embed-responsive-16by9\"><iframe class=\"embed-responsive-item\" src=\"https://player.vimeo.com/video/170471588\" allowfullscreen></iframe></div>', ENT_QUOTES) }}" data-product-reviews="{{ htmlspecialchars('<div class=\"review-item\"><div class=\"review-rating\">★★★★★</div><div class=\"review-author\">Emma T.</div><div class=\"review-date\">3 weeks ago</div><div class=\"review-text\">Perfect for my hanging baskets! Reduced watering by half and plants look great.</div></div><div class=\"review-item\"><div class=\"review-rating\">★★★★★</div><div class=\"review-author\">Mike R.</div><div class=\"review-date\">1 month ago</div><div class=\"review-text\">Game changer for container gardening. Highly recommend!</div></div>', ENT_QUOTES) }}" data-product-delivery="Standard Delivery: £4.95 (3-5 working days) | Express Delivery: £7.95 (1-2 working days) | Free Delivery on orders over £50. All orders are dispatched within 1-2 working days. Delivery to UK mainland only. For international delivery, please contact us." data-product-specs="250g, Water Retaining" data-product-yg="https://www.yougarden.com/item-p-100118/blooming-fast-swell-gel-and-feed-250g" data-product-amazon="https://www.amazon.co.uk/s?k=blooming+fast+swell+gel+and+feed" data-product-npk="With Plant Growth Stimulant" data-product-features="Water-retaining gel technology|Built-in plant food|Reduces watering frequency|Promotes healthy root development|Ideal for containers and hanging baskets" data-product-application="Mix with compost when planting or apply as a top dressing. The gel absorbs water and releases it gradually to plants." data-product-makes="250g pack">
                        <div class="product-image mb-20">
                            <img src="{{ asset('images/swellgell-1.jpg') }}" alt="Swell Gell & Feed" class="img-responsive" />
                        </div>
                        <div class="product-details p-30">
                            <h4 class="product-title mb-15">Swell Gell & Feed</h4>
                            <p class="product-description mb-20">Revolutionary water-retaining gel with built-in plant food. Reduces watering frequency while feeding your plants.</p>
                            <div class="product-specs mb-20">
                                <span class="badge">250g</span>
                                <span class="badge">Water Retaining</span>
                            </div>
                            <ul class="product-buttons">
                                <li><a href="https://www.yougarden.com/item-p-100118/blooming-fast-swell-gel-and-feed-250g" class="product-button" target="_blank" rel="noopener" onclick="event.stopPropagation();"><img src="{{ asset('images/yglogosmall.png') }}" alt="YouGarden" /></a></li>
                                <li><a href="https://www.amazon.co.uk/s?k=blooming+fast+swell+gel+and+feed" class="product-button" target="_blank" rel="noopener" onclick="event.stopPropagation();"><img src="{{ asset('images/amazoncolour.png') }}" alt="Amazon" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 3: Superior Soluble Fertiliser -->
                <div class="col-md-4 col-sm-6 mb-40">
                    <div class="product-card white-bg text-center wow fadeInUp product-card-clickable" data-wow-duration=".5s" data-wow-delay=".2s" data-product-title="Superior Soluble Fertiliser" data-product-image="{{ asset('images/superiorV4.png') }}" data-product-image-2="{{ asset('images/superiorback.png') }}" data-product-video="https://vimeo.com/170471588" data-product-description="Our best-ever formulation for use all round the garden. More flowers, more fruit, better roots and shoots." data-product-full-description="Superior Soluble Fertiliser is our best-ever formulation, designed for use all round the garden. This high-potency, professional-grade fertiliser delivers exceptional results for flowers, fruits, vegetables, and all garden plants. Packed with Potash for flowers, fruits and veg, jammed with nitrogen and phosphorous for healthy leaves, shoots and roots, and brimming with 7 vital trace elements for maximum health. Plus we've added the magic ingredient – Humic Acid – to boost your plants. Fast acting and long lasting, this superior plant food makes approximately 500 litres from a 500g bag. Simply add one 5g scoop (included) to a gallon of water (4.5 litres) or a standard watering can, and water on weekly during the growing season for incredible results." data-product-videos="{{ htmlspecialchars('<div class=\"embed-responsive embed-responsive-16by9\"><iframe class=\"embed-responsive-item\" src=\"https://player.vimeo.com/video/170471588\" allowfullscreen></iframe></div>', ENT_QUOTES) }}" data-product-reviews="{{ htmlspecialchars('<div class=\"review-item\"><div class=\"review-rating\">★★★★★</div><div class=\"review-author\">David L.</div><div class=\"review-date\">1 week ago</div><div class=\"review-text\">Best fertiliser I\'ve used! Everything in my garden is thriving.</div></div><div class=\"review-item\"><div class=\"review-rating\">★★★★★</div><div class=\"review-author\">Linda K.</div><div class=\"review-date\">2 weeks ago</div><div class=\"review-text\">Amazing results on my vegetables. Highly recommend!</div></div><div class=\"review-item\"><div class=\"review-rating\">★★★★☆</div><div class=\"review-author\">Peter H.</div><div class=\"review-date\">3 weeks ago</div><div class=\"review-text\">Great value for money. Makes a lot of feed from one bag.</div></div>', ENT_QUOTES) }}" data-product-delivery="Standard Delivery: £4.95 (3-5 working days) | Express Delivery: £7.95 (1-2 working days) | Free Delivery on orders over £50. All orders are dispatched within 1-2 working days. Delivery to UK mainland only. For international delivery, please contact us." data-product-specs="500g, NPK 18:18:24" data-product-yg="https://www.yougarden.com/item-p-100062/blooming-fast-superior-soluble-fertiliser-500g" data-product-amazon="https://www.amazon.co.uk/Bloomiing-Soluble-Planter-Fertilsier-litres/dp/B079HYNNN4/ref=sr_1_1?ie=UTF8&amp;qid=1522915651&amp;sr=8-1&amp;keywords=blooming+fast+superior" data-product-npk="18:18:24" data-product-features="Packed with Potash for flowers, fruits and veg|Jammed with nitrogen and phosphorous|Brimming with 7 vital trace elements|Plus Humic Acid to boost your plants|Fast acting and long lasting" data-product-application="Add one 5g scoop (included) to a gallon of water (4.5 litres) or a standard watering can. Water on weekly during the growing season." data-product-makes="Makes approx 500 litres from a 500g bag">
                        <div class="product-image mb-20">
                            <img src="{{ asset('images/superiorV4.png') }}" alt="Superior Soluble Fertiliser" class="img-responsive" />
                        </div>
                        <div class="product-details p-30">
                            <h4 class="product-title mb-15">Superior Soluble Fertiliser</h4>
                            <p class="product-description mb-20">Our best-ever formulation for use all round the garden. More flowers, more fruit, better roots and shoots.</p>
                            <div class="product-specs mb-20">
                                <span class="badge">500g</span>
                                <span class="badge">NPK 18:18:24</span>
                            </div>
                            <ul class="product-buttons">
                                <li><a href="https://www.yougarden.com/item-p-100062/blooming-fast-superior-soluble-fertiliser-500g" class="product-button" target="_blank" rel="noopener" onclick="event.stopPropagation();"><img src="{{ asset('images/yglogosmall.png') }}" alt="YouGarden" /></a></li>
                                <li><a href="https://www.amazon.co.uk/Bloomiing-Soluble-Planter-Fertilsier-litres/dp/B079HYNNN4/ref=sr_1_1?ie=UTF8&amp;qid=1522915651&amp;sr=8-1&amp;keywords=blooming+fast+superior" class="product-button" target="_blank" rel="noopener" onclick="event.stopPropagation();"><img src="{{ asset('images/amazoncolour.png') }}" alt="Amazon" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 4: Citrus Feed -->
                <div class="col-md-4 col-sm-6 mb-40">
                    <div class="product-card white-bg text-center wow fadeInUp product-card-clickable" data-wow-duration=".5s" data-wow-delay=".3s" data-product-title="Citrus Feed" data-product-image="{{ asset('images/cirtus-feed-p1.jpg') }}" data-product-image-2="{{ asset('images/cirtus-feed-p1.jpg') }}" data-product-video="https://vimeo.com/170471588" data-product-description="Specially formulated for citrus trees and plants. Promotes healthy growth, better fruit production and vibrant foliage." data-product-full-description="Citrus Feed is specially formulated to meet the unique nutritional needs of citrus trees and plants. Whether you're growing lemons, oranges, limes, grapefruits, or other citrus varieties, this targeted fertiliser provides the perfect balance of nutrients to promote healthy growth, better fruit production, and vibrant, glossy foliage. Citrus plants have specific requirements, and this feed ensures they receive exactly what they need to thrive. Apply during the growing season by mixing with water according to instructions and applying to the base of your citrus plants regularly. You'll notice improved fruit quality, increased yields, and healthier, more attractive plants." data-product-specs="150g, Citrus Specific" data-product-yg="https://www.yougarden.com/item-p-100016/blooming-fast-citrus-feed-150g" data-product-amazon="https://www.amazon.co.uk/s?k=blooming+fast+citrus+feed" data-product-npk="Citrus Specific Formula" data-product-features="Specially formulated for citrus trees|Promotes healthy growth|Better fruit production|Vibrant foliage|Ideal for lemons, oranges, limes and other citrus" data-product-application="Apply during the growing season. Mix with water according to instructions and apply to the base of citrus plants regularly." data-product-makes="150g pack">
                        <div class="product-image mb-20">
                            <img src="{{ asset('images/cirtus-feed-p1.jpg') }}" alt="Citrus Feed" class="img-responsive" />
                        </div>
                        <div class="product-details p-30">
                            <h4 class="product-title mb-15">Citrus Feed</h4>
                            <p class="product-description mb-20">Specially formulated for citrus trees and plants. Promotes healthy growth, better fruit production and vibrant foliage.</p>
                            <div class="product-specs mb-20">
                                <span class="badge">150g</span>
                                <span class="badge">Citrus Specific</span>
                            </div>
                            <ul class="product-buttons">
                                <li><a href="https://www.yougarden.com/item-p-100016/blooming-fast-citrus-feed-150g" class="product-button" target="_blank" rel="noopener" onclick="event.stopPropagation();"><img src="{{ asset('images/yglogosmall.png') }}" alt="YouGarden" /></a></li>
                                <li><a href="https://www.amazon.co.uk/s?k=blooming+fast+citrus+feed" class="product-button" target="_blank" rel="noopener" onclick="event.stopPropagation();"><img src="{{ asset('images/amazoncolour.png') }}" alt="Amazon" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 5: Acer Feed -->
                <div class="col-md-4 col-sm-6 mb-40">
                    <div class="product-card white-bg text-center wow fadeInUp product-card-clickable" data-wow-duration=".5s" data-wow-delay=".4s" data-product-title="Acer Feed" data-product-image="{{ asset('images/acer-feed-p1.jpg') }}" data-product-image-2="{{ asset('images/acer-feed-p1.jpg') }}" data-product-video="https://vimeo.com/170471588" data-product-description="Perfect nutrition for Japanese maples and acer trees. Enhances leaf colour and promotes healthy growth." data-product-full-description="Acer Feed provides perfect nutrition specifically formulated for Japanese maples and acer trees. These beautiful trees are prized for their stunning foliage, and this specially balanced feed enhances leaf colour intensity and promotes healthy, vigorous growth. The unique formulation ensures your acers receive the exact nutrients they need to develop their characteristic vibrant colours, from the fresh greens of spring to the spectacular reds, oranges, and yellows of autumn. Apply around the base of your acer trees during the growing season and water in well after application. You'll be rewarded with improved autumn colour displays and healthier, more robust trees." data-product-videos="{{ htmlspecialchars('<div class=\"embed-responsive embed-responsive-16by9\"><iframe class=\"embed-responsive-item\" src=\"https://player.vimeo.com/video/170471588\" allowfullscreen></iframe></div>', ENT_QUOTES) }}" data-product-reviews="{{ htmlspecialchars('<div class=\"review-item\"><div class=\"review-rating\">★★★★★</div><div class=\"review-author\">Robert F.</div><div class=\"review-date\">3 weeks ago</div><div class=\"review-text\">My Japanese maple has never looked better. Amazing autumn colours!</div></div><div class=\"review-item\"><div class=\"review-rating\">★★★★☆</div><div class=\"review-author\">Patricia M.</div><div class=\"review-date\">1 month ago</div><div class=\"review-text\">Great for my acer collection. Healthy growth and vibrant leaves.</div></div>', ENT_QUOTES) }}" data-product-delivery="Standard Delivery: £4.95 (3-5 working days) | Express Delivery: £7.95 (1-2 working days) | Free Delivery on orders over £50. All orders are dispatched within 1-2 working days. Delivery to UK mainland only. For international delivery, please contact us." data-product-specs="900g, Acer Specific" data-product-yg="https://www.yougarden.com/item-p-100105/blooming-fast-acer-feed-900g" data-product-amazon="https://www.amazon.co.uk/s?k=blooming+fast+acer+feed" data-product-npk="Acer Specific Formula" data-product-features="Perfect for Japanese maples|Enhances leaf colour|Promotes healthy growth|Specially balanced for acers|Improves autumn colour display" data-product-application="Apply around the base of acer trees during the growing season. Water in well after application." data-product-makes="900g pack">
                        <div class="product-image mb-20">
                            <img src="{{ asset('images/acer-feed-p1.jpg') }}" alt="Acer Feed" class="img-responsive" />
                        </div>
                        <div class="product-details p-30">
                            <h4 class="product-title mb-15">Acer Feed</h4>
                            <p class="product-description mb-20">Perfect nutrition for Japanese maples and acer trees. Enhances leaf colour and promotes healthy growth.</p>
                            <div class="product-specs mb-20">
                                <span class="badge">900g</span>
                                <span class="badge">Acer Specific</span>
                            </div>
                            <ul class="product-buttons">
                                <li><a href="https://www.yougarden.com/item-p-100105/blooming-fast-acer-feed-900g" class="product-button" target="_blank" rel="noopener" onclick="event.stopPropagation();"><img src="{{ asset('images/yglogosmall.png') }}" alt="YouGarden" /></a></li>
                                <li><a href="https://www.amazon.co.uk/s?k=blooming+fast+acer+feed" class="product-button" target="_blank" rel="noopener" onclick="event.stopPropagation();"><img src="{{ asset('images/amazoncolour.png') }}" alt="Amazon" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 6: Clematis Feed -->
                <div class="col-md-4 col-sm-6 mb-40">
                    <div class="product-card white-bg text-center wow fadeInUp product-card-clickable" data-wow-duration=".5s" data-wow-delay=".5s" data-product-title="Clematis Feed" data-product-image="{{ asset('images/clematis-feed-p1.jpg') }}" data-product-image-2="{{ asset('images/clematis-feed-p1.jpg') }}" data-product-video="https://vimeo.com/170471588" data-product-description="Specialised feed for clematis plants. Encourages abundant flowering and strong, healthy growth." data-product-full-description="Clematis Feed is a specialised feed designed specifically for clematis plants to boost flowering and promote strong, healthy growth. Rich in potassium for richer colours, this feed encourages more blooms and longer-lasting flower displays. Whether you're growing clematis in borders, on trellises, or in patio planters, this feed provides the perfect nutrition for these beautiful climbing plants. The formulation promotes strong, healthy growth and has proven results visible within one growing season. For new plants, apply 35-50g around the plant base when growth is strong. For established plants, apply 35-50g in March and repeat every three months during the growing season for best results." data-product-videos="{{ htmlspecialchars('<div class=\"embed-responsive embed-responsive-16by9\"><iframe class=\"embed-responsive-item\" src=\"https://player.vimeo.com/video/170471588\" allowfullscreen></iframe></div>', ENT_QUOTES) }}" data-product-reviews="{{ htmlspecialchars('<div class=\"review-item\"><div class=\"review-rating\">★★★★★</div><div class=\"review-author\">Helen C.</div><div class=\"review-date\">2 weeks ago</div><div class=\"review-text\">My clematis is covered in beautiful flowers! Excellent feed.</div></div><div class=\"review-item\"><div class=\"review-rating\">★★★★★</div><div class=\"review-author\">Andrew P.</div><div class=\"review-date\">1 month ago</div><div class=\"review-text\">Perfect for my climbing plants. Great results this season.</div></div>', ENT_QUOTES) }}" data-product-delivery="Standard Delivery: £4.95 (3-5 working days) | Express Delivery: £7.95 (1-2 working days) | Free Delivery on orders over £50. All orders are dispatched within 1-2 working days. Delivery to UK mainland only. For international delivery, please contact us." data-product-specs="900g, Clematis Specific" data-product-yg="https://www.yougarden.com/item-p-100106/blooming-fast-clematis-feed-900g" data-product-amazon="https://www.amazon.co.uk/s?k=blooming+fast+clematis+feed" data-product-npk="5-5-10 + 2.5% MgO" data-product-features="Rich in potassium for richer colours|More blooms and longer-lasting displays|Promotes strong, healthy growth|Suitable for borders, trellises and patio planters|Proven results within one growing season" data-product-application="New Plants: Apply 35-50g around the plant base when growth is strong. Established Plants: Apply 35-50g in March and repeat every three months during the growing season." data-product-makes="900g pack">
                        <div class="product-image mb-20">
                            <img src="{{ asset('images/clematis-feed-p1.jpg') }}" alt="Clematis Feed" class="img-responsive" />
                        </div>
                        <div class="product-details p-30">
                            <h4 class="product-title mb-15">Clematis Feed</h4>
                            <p class="product-description mb-20">Specialised feed for clematis plants. Encourages abundant flowering and strong, healthy growth.</p>
                            <div class="product-specs mb-20">
                                <span class="badge">900g</span>
                                <span class="badge">Clematis Specific</span>
                            </div>
                            <ul class="product-buttons">
                                <li><a href="https://www.yougarden.com/item-p-100106/blooming-fast-clematis-feed-900g" class="product-button" target="_blank" rel="noopener" onclick="event.stopPropagation();"><img src="{{ asset('images/yglogosmall.png') }}" alt="YouGarden" /></a></li>
                                <li><a href="https://www.amazon.co.uk/s?k=blooming+fast+clematis+feed" class="product-button" target="_blank" rel="noopener" onclick="event.stopPropagation();"><img src="{{ asset('images/amazoncolour.png') }}" alt="Amazon" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 7: Fish Blood & Bone -->
                <div class="col-md-4 col-sm-6 mb-40">
                    <div class="product-card white-bg text-center wow fadeInUp product-card-clickable" data-wow-duration=".5s" data-wow-delay=".6s" data-product-title="Fish Blood & Bone" data-product-image="{{ asset('images/fish-blood-p1.jpg') }}" data-product-image-2="{{ asset('images/fish-blood-p1.jpg') }}" data-product-video="https://vimeo.com/170471588" data-product-description="Traditional organic fertiliser rich in nitrogen, phosphorus and potassium. Perfect for all-round garden use." data-product-full-description="Fish Blood & Bone is a traditional organic fertiliser that has been trusted by gardeners for generations. Rich in nitrogen, phosphorus, and potassium, this natural fertiliser provides essential nutrients for healthy plant growth. The organic formulation encourages strong root development, promotes vibrant blooms, and supports overall plant health. Perfect for all-round garden use, this fertiliser is ideal for flowers, vegetables, shrubs, and trees. For new plants, incorporate into the soil before planting to give them a great start. For established plants, apply as a top dressing around the base of plants and water in well. This natural and organic option is perfect for gardeners who prefer traditional, time-tested methods." data-product-videos="{{ htmlspecialchars('<div class=\"embed-responsive embed-responsive-16by9\"><iframe class=\"embed-responsive-item\" src=\"https://player.vimeo.com/video/170471588\" allowfullscreen></iframe></div>', ENT_QUOTES) }}" data-product-reviews="{{ htmlspecialchars('<div class=\"review-item\"><div class=\"review-rating\">★★★★★</div><div class=\"review-author\">Margaret S.</div><div class=\"review-date\">2 weeks ago</div><div class=\"review-text\">Traditional and effective. My garden has never looked better!</div></div><div class=\"review-item\"><div class=\"review-rating\">★★★★☆</div><div class=\"review-author\">Tom B.</div><div class=\"review-date\">1 month ago</div><div class=\"review-text\">Great organic option. Works well on all my plants.</div></div>', ENT_QUOTES) }}" data-product-delivery="Standard Delivery: £4.95 (3-5 working days) | Express Delivery: £7.95 (1-2 working days) | Free Delivery on orders over £50. All orders are dispatched within 1-2 working days. Delivery to UK mainland only. For international delivery, please contact us." data-product-specs="1.5kg, Organic" data-product-yg="https://www.yougarden.com/item-p-100046/blooming-fast-fish-blood-and-bone-1-5kg-tub" data-product-amazon="https://www.amazon.co.uk/s?k=blooming+fast+fish+blood+and+bone" data-product-npk="Natural NPK" data-product-features="Traditional organic fertiliser|Rich in nitrogen, phosphorus and potassium|Encourages strong root development|Vibrant blooms|Ideal for all-round garden use|Natural and organic" data-product-application="New Plants: Incorporate into the soil before planting. Established Plants: Apply as a top dressing around the base of plants and water in." data-product-makes="1.5kg tub">
                        <div class="product-image mb-20">
                            <img src="{{ asset('images/fish-blood-p1.jpg') }}" alt="Fish Blood & Bone" class="img-responsive" />
                        </div>
                        <div class="product-details p-30">
                            <h4 class="product-title mb-15">Fish Blood & Bone</h4>
                            <p class="product-description mb-20">Traditional organic fertiliser rich in nitrogen, phosphorus and potassium. Perfect for all-round garden use.</p>
                            <div class="product-specs mb-20">
                                <span class="badge">1.5kg</span>
                                <span class="badge">Organic</span>
                            </div>
                            <ul class="product-buttons">
                                <li><a href="https://www.yougarden.com/item-p-100046/blooming-fast-fish-blood-and-bone-1-5kg-tub" class="product-button" target="_blank" rel="noopener" onclick="event.stopPropagation();"><img src="{{ asset('images/yglogosmall.png') }}" alt="YouGarden" /></a></li>
                                <li><a href="https://www.amazon.co.uk/s?k=blooming+fast+fish+blood+and+bone" class="product-button" target="_blank" rel="noopener" onclick="event.stopPropagation();"><img src="{{ asset('images/amazoncolour.png') }}" alt="Amazon" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .products-content -->
    </div><!-- .container -->
</div><!-- .products-section  -->

<!-- Product Quick View Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="productModalLabel">Product Quick View</h4>
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
                                    <!-- Feefo Reviews Widget will be loaded here -->
                                    <div id="feefo-reviews-widget" data-feefo-product-id=""></div>
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

<!-- Start .faq-section  -->
<div id="faq" class="faq-section section white-bg pt-120 pb-120 faq-curved-top">
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
            <div class="row tab-fix">
                <div class="col-md-10 col-md-offset-1">
                    <!-- Accordion -->
                    <div class="panel-group accordion" id="another" role="tablist" aria-multiselectable="true">
                        <!-- each panel for accordion -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="accordion-i1">
                                <h6 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#another" href="#accordion-pane-i1" aria-expanded="false">
                                        How often should I use it?
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="accordion-pane-i1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="accordion-i1">
                                <div class="panel-body">
                                      <p>From March to April feed your plants once a week while watering.
From May to September feed your plants twice a week while watering.</p>
                                </div>
                            </div>
                        </div> 
                        <!-- each panel for accordion -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="accordion-i2">
                                <h6 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#another" href="#accordion-pane-i2" aria-expanded="false">
                                        What is the NPK ratio?
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="accordion-pane-i2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-i2">
                                <div class="panel-body">
                                      <p>Superior plant food has a ratio of 18:18:24 NPK with trace elements</p>
                                </div>
                            </div>
                        </div>
                        <!-- each panel for accordion -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="accordion-i3">
                                <h6 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#another" href="#accordion-pane-i3" aria-expanded="false">
                                        How do I store it?
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="accordion-pane-i3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-i3">
                                <div class="panel-body">
                                      <p>Store Superior Plant Food in a cool, dry place with the pack closed.</p>
                                </div>
                            </div>
                        </div>
                        <!-- each panel for accordion -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="accordion-i4">
                                <h6 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#another" href="#accordion-pane-i4" aria-expanded="false">
                                        What kinds of watering devices can I use?
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="accordion-pane-i4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-i4">
                                <div class="panel-body">
                                      <p>The soluble powder needs to be dissolved and diluted into water at the correct rate as per the instructions, once it is dissolved / diluted it can be applied to the plants via a watering can or a jug.</p>
                                </div>
                            </div>
                        </div>
                        <!-- each panel for accordion -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="accordion-i5">
                                <h6 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#another" href="#accordion-pane-i5" aria-expanded="false">
                                        Is it safe for pets and children?
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="accordion-pane-i5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-i5">
                                <div class="panel-body">
                                      <p>Best practice is to keep the powder in its original labeled container out of reach of children & pets</p>
                                </div>
                            </div>
                        </div>
                        <!-- each panel for accordion -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="accordion-i6">
                                <h6 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#another" href="#accordion-pane-i6" aria-expanded="false">
                                        Can I use it in containers?
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="accordion-pane-i6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-i6">
                                <div class="panel-body">
                                      <p>Yes apply in its diluted format at least once a week as part of your normal watering.</p>
                                </div>
                            </div>
                        </div>
                        <!-- each panel for accordion -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="accordion-i7">
                                <h6 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#another" href="#accordion-pane-i7" aria-expanded="false">
                                        Is it suitable for mixing with other products?
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="accordion-pane-i7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-i7">
                                <div class="panel-body">
                                      <p>Best to use it on its own and don't mix with other products … except water!</p>
                                </div>
                            </div>
                        </div>
                        <!-- each panel for accordion -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="accordion-i8">
                                <h6 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#another" href="#accordion-pane-i8" aria-expanded="false">
                                        Can I overdose my plants?
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="accordion-pane-i8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-i8">
                                <div class="panel-body">
                                      <p>Yes – please follow the instructions as per the packaging</p>
                                </div>
                            </div>
                        </div>
                        <!-- each panel for accordion -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="accordion-i9">
                                <h6 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#another" href="#accordion-pane-i9" aria-expanded="false">
                                        Can I water directly onto the plants?
                                        <span class="plus-minus"><span></span></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="accordion-pane-i9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-i9">
                                <div class="panel-body">
                                      <p>Yes you can but best practice is to wash plants with fresh water to dilute and remove any fertiliser residues.</p>
                                </div>
                            </div>
                        </div>
                        
                    </div><!-- Accordion #end -->
                </div><!-- .col  -->
            </div><!-- .row  -->
        </div><!-- .faq  -->
    </div><!-- .container  -->
</div><!-- .faq-section  -->

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
                    <li><a href="#faq" class="heading-light">FAQ</a></li>
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
        
        // Populate basic modal fields
        $('#modalProductTitle').text(title);
        $('#modalProductDescription').text(description);
        $('#modalProductYG').attr('href', ygLink);
        $('#modalProductAmazon').attr('href', amazonLink);
        
        // Populate full description if available
        if (fullDescription) {
            $('#modalProductFullDescriptionText').html(fullDescription.replace(/\n/g, '<br>'));
            $('.product-modal-full-description').show();
        } else {
            $('.product-modal-full-description').hide();
        }
        
        // Populate videos if available
        if (videos) {
            $('#modalProductVideosContent').html(videos);
            $('.product-modal-videos').show();
        } else {
            $('.product-modal-videos').hide();
        }
        
        // Populate Feefo reviews if available
        if (reviews) {
            // Clear previous content
            $('#modalProductReviewsContent').html('<div id="feefo-reviews-widget"></div>');
            
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
                    // Legacy HTML reviews (fallback)
                    $('#modalProductReviewsContent').html(reviews);
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
                '<div class="item ' + activeClass + '">' +
                '<img src="' + image + '" alt="' + title + '" class="img-responsive" />' +
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
                '<div class="item ' + activeClass + '">' +
                '<img src="' + image2 + '" alt="' + title + '" class="img-responsive" />' +
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
        
        // Parse and display specs
        var specsArray = specs.split(', ');
        var specsHtml = '<div class="product-specs">';
        specsArray.forEach(function(spec) {
            specsHtml += '<span class="badge">' + spec.trim() + '</span> ';
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
            var featuresArray = features.split('|');
            var featuresHtml = '';
            featuresArray.forEach(function(feature) {
                featuresHtml += '<li>' + feature.trim() + '</li>';
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
});
</script>
@endpush
