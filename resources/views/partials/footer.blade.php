<!-- Footer Top Divider - Curved Wave -->
<div class="section-divider-wave">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="display: block; width: 100%; height: 100%;">
        <defs>
            <linearGradient id="gradient-divider-footer" x1="0%" y1="100%" x2="100%" y2="100%" gradientUnits="objectBoundingBox">
                <stop offset="0%" style="stop-color:#404040;stop-opacity:1" />
                <stop offset="100%" style="stop-color:#404040;stop-opacity:1" />
            </linearGradient>
        </defs>
        <path d="M0,0 C150,80 350,80 600,40 C850,0 1050,0 1200,40 L1200,120 L0,120 Z" fill="url(#gradient-divider-footer)"></path>
    </svg>
</div>

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
                    <li><a href="{{ route('home') }}#home" class="heading-light">Home</a></li>
                    <li><a href="{{ route('home') }}#about" class="heading-light">About</a></li>
                    <li><a href="{{ route('home') }}#features" class="heading-light">Features</a></li>
                    <li><a href="{{ route('home') }}#products" class="heading-light">Products</a></li>
                    <li><a href="{{ route('home') }}#videos" class="heading-light">Videos</a></li>
                    <li><a href="{{ route('home') }}#faq" class="heading-light">FAQ</a></li>
                    <li><a href="{{ route('blog.index') }}" class="heading-light">Blog & Guides</a></li>
                </ul>
            </div><!-- .col -->
            
            <!-- Products Column -->
            <div class="col-md-3 col-sm-6 mb-40">
                <h5 class="heading-light mb-20">Our Products</h5>
                <ul class="footer-links-list">
                    <li><a href="https://www.yougarden.com/item-p-100062/blooming-fast-superior-soluble-fertiliser-500g?source=bloomingfast.com" class="heading-light" target="_blank" rel="noopener">Superior Soluble Fertiliser</a></li>
                    <li><a href="https://www.yougarden.com/item-p-100196/ultimate-rose-bloom-booster-complete-fertiliser-750g?source=bloomingfast.com" class="heading-light" target="_blank" rel="noopener">Rose Bloom Booster</a></li>
                    <li><a href="https://www.yougarden.com/item-p-100118/blooming-fast-swell-gel-and-feed-250g?source=bloomingfast.com" class="heading-light" target="_blank" rel="noopener">Swell Gell & Feed</a></li>
                    <li><a href="https://www.yougarden.com/item-p-100016/blooming-fast-citrus-feed-150g?source=bloomingfast.com" class="heading-light" target="_blank" rel="noopener">Citrus Feed</a></li>
                    <li><a href="{{ route('home') }}#products" class="heading-light">View All Products</a></li>
                </ul>
            </div><!-- .col -->
            
            <!-- Where to Buy Column -->
            <div class="col-md-3 col-sm-6 mb-40">
                <h5 class="heading-light mb-20">Where to Buy</h5>
                <ul class="footer-links-list">
                    <li><a href="https://www.yougarden.com?source=bloomingfast.com" class="heading-light" target="_blank" rel="noopener">YouGarden</a></li>
                    <li><a href="https://www.amazon.co.uk/stores/page/5D2120F1-F052-4812-AAF7-6FE644404EC7/search?lp_asin=B0D44VQZ1S&ref_=ast_bln&store_ref=bl_ast_dp_brandLogo_sto&terms=blooming%20fast" class="heading-light" target="_blank" rel="noopener">Amazon</a></li>
                </ul>
                <div class="footer-social mt-30">
                    <p class="heading-light mb-15">Follow Us</p>
                    <ul class="social-links">
                        <li><a href="https://www.facebook.com/YouGardenUK" class="heading-light" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCLMujNspgKbXY3oAQ4qUvYg" class="heading-light" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="https://www.instagram.com/yougardenuk/" class="heading-light" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://uk.pinterest.com/yougardenltd/" class="heading-light" target="_blank" rel="noopener noreferrer" aria-label="Pinterest"><i class="fa fa-pinterest"></i></a></li>
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

