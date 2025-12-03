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

