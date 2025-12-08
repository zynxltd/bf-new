<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Product;

Route::get('/', function () {
    $products = Product::where('is_active', true)
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get(); // Get all fields needed for the product modal
    
    return view('home', compact('products'));
})->name('home');

// Product Landing Pages
Route::get('/product/{slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{category_slug}/{slug}', [BlogController::class, 'show'])->name('blog.show');
// Legacy route for backward compatibility - redirect to new format
Route::get('/blog/{slug}', [BlogController::class, 'showLegacy'])->name('blog.show.legacy');

// Legal Pages
Route::get('/privacy-policy', [\App\Http\Controllers\LegalController::class, 'privacy'])->name('legal.privacy');
Route::get('/terms-of-service', [\App\Http\Controllers\LegalController::class, 'terms'])->name('legal.terms');
Route::get('/cookie-policy', [\App\Http\Controllers\LegalController::class, 'cookies'])->name('legal.cookies');

// Sitemap
Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

// Serve blocked hero images through Laravel (bypasses web server security rules)
// Using different URL paths that don't match actual filenames to avoid .htaccess rewrite conflicts
Route::get('/hero-images/swell-gell', function () {
    $path = public_path('images/swel-gel-heor-no-bg.png');
    if (file_exists($path)) {
        return response()->file($path, ['Content-Type' => 'image/png']);
    }
    abort(404);
})->name('image.swell-gell-hero');

Route::get('/hero-images/citrus-feed', function () {
    $path = public_path('images/cirtus-feed-hero-image-no-bg.png');
    if (file_exists($path)) {
        return response()->file($path, ['Content-Type' => 'image/png']);
    }
    abort(404);
})->name('image.citrus-feed-hero');

Route::get('/hero-images/bloom-booster', function () {
    $path = public_path('images/bloom-booster-hero-no-bg.png');
    if (file_exists($path)) {
        return response()->file($path, ['Content-Type' => 'image/png']);
    }
    abort(404);
})->name('image.bloom-booster-hero');

Route::get('/hero-images/acer-feed', function () {
    $path = public_path('images/acer-feed-hero-no-bg.png');
    if (file_exists($path)) {
        return response()->file($path, ['Content-Type' => 'image/png']);
    }
    abort(404);
})->name('image.acer-feed-hero');

Route::get('/hero-images/clematis-feed', function () {
    $path = public_path('images/clematis-feed-p1-n-bg-front.png');
    if (file_exists($path)) {
        return response()->file($path, ['Content-Type' => 'image/png']);
    }
    abort(404);
})->name('image.clematis-feed-hero');

// Newsletter
Route::post('/newsletter/subscribe', [\App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    
    // Protected Admin Routes
    Route::middleware('admin')->group(function () {
        Route::resource('products', ProductController::class);
        Route::resource('blogs', AdminBlogController::class);
    });
});
