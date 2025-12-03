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
        ->get(['id', 'title', 'description', 'image', 'badge_1', 'badge_2', 'sku', 'yg_link', 'amazon_link', 'sort_order']);
    
    return view('home', compact('products'));
})->name('home');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

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
