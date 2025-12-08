<!-- Footer Top Divider - Curved Wave -->
<div class="section-divider-wave" id="footer-top-divider" style="height: 120px; width: 100%; overflow: visible !important; background: #404040 !important; background-color: #404040 !important; background-image: none !important; display: block !important; visibility: visible !important; position: relative; z-index: 10; filter: none !important; -webkit-filter: none !important; backdrop-filter: none !important; -webkit-backdrop-filter: none !important;">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="display: block !important; width: 100% !important; height: 100% !important; position: relative; z-index: 1; filter: none !important; -webkit-filter: none !important;">
        <path d="M0,0 C150,80 350,80 600,40 C850,0 1050,0 1200,40 L1200,120 L0,120 Z" fill="#404040" style="filter: none !important; -webkit-filter: none !important;"></path>
    </svg>
</div>

<!-- Start .footer-section  -->
<div class="footer-section gradiant-background section pt-80 pb-40">
    <div class="container">
        <div class="row">
            <!-- Footer Brand Column -->
            <div class="col-md-3 col-sm-6 mb-40">
                <div class="footer-brand">
                    <a href="{{ route('home') }}">
                        {!! webp_picture('images/logo.png', 'Blooming Fast', ['class' => 'footer-logo mb-20', 'style' => 'filter: brightness(0) invert(1);']) !!}
                    </a>
                    <p class="heading-light">Premium plant foods and fertilisers for bigger, better blooms and healthier plants. Professional grade formulations for your garden.</p>
                </div>
            </div><!-- .col -->
            
            <!-- Quick Links & Legal Column -->
            <div class="col-md-3 col-sm-6 mb-40">
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
                <h5 class="heading-light mb-20 mt-30">Legal</h5>
                <ul class="footer-links-list">
                    <li><a href="{{ route('legal.privacy') }}" class="heading-light">Privacy Policy</a></li>
                    <li><a href="{{ route('legal.terms') }}" class="heading-light">Terms of Service</a></li>
                    <li><a href="{{ route('legal.cookies') }}" class="heading-light">Cookie Policy</a></li>
                </ul>
            </div><!-- .col -->
            
            <!-- Products Column -->
            <div class="col-md-3 col-sm-6 mb-40">
                <h5 class="heading-light mb-20">Our Products</h5>
                <ul class="footer-links-list">
                    <li><a href="{{ route('product.show', 'superior-soluble-fertiliser') }}" class="heading-light">Superior Soluble Fertiliser</a></li>
                    <li><a href="{{ route('product.show', 'ultimate-rose-bloom-booster') }}" class="heading-light">Rose Bloom Booster</a></li>
                    <li><a href="{{ route('product.show', 'swell-gell-feed') }}" class="heading-light">Swell Gell & Feed</a></li>
                    <li><a href="{{ route('product.show', 'citrus-feed') }}" class="heading-light">Citrus Feed</a></li>
                    <li><a href="{{ route('home') }}#products" class="heading-light">View All Products</a></li>
                </ul>
            </div><!-- .col -->
            
            <!-- Where to Buy Column -->
            <div class="col-md-3 col-sm-6 mb-40">
                <h5 class="heading-light mb-20">Where to Buy</h5>
                <ul class="footer-links-list">
                    <li><a href="https://www.yougarden.com?source=bloomingfast.com" class="heading-light" target="_blank" rel="noopener">YouGarden</a></li>
                    <li><a href="https://www.amazon.co.uk/stores/YouGarden/page/5D2120F1-F052-4812-AAF7-6FE644404EC7?lp_asin=B0FBX38VQT&ref_=ast_bln&store_ref=bl_ast_dp_brandLogo_sto" class="heading-light" target="_blank" rel="noopener">Amazon</a></li>
                    <li><a href="https://www.yougarden.com/item-p-820001/yg-discount-club-annual-membership?source=bloomingfast.com" class="heading-light" target="_blank" rel="noopener" style="font-weight: 600; color: #ffd700;">✨ YouGarden Discount Club</a></li>
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
                    <p class="heading-light mt-10 mb-0" style="font-size: 14px;">
                        <a href="{{ route('sitemap') }}" class="heading-light" style="text-decoration: underline;">Sitemap</a>
                    </p>
                    @auth
                    <p class="heading-light mt-10 mb-0">
                        <a href="{{ route('admin.blogs.index') }}" class="heading-light" style="text-decoration: underline;">Admin Dashboard</a> | 
                        <a href="{{ route('admin.logout') }}" class="heading-light admin-logout-link" style="text-decoration: underline;" data-logout-form="logout-form">Logout</a>
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

