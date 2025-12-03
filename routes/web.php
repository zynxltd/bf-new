<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Product;

Route::get('/', function () {
    $products = Product::where('is_active', true)
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    
    return view('home', compact('products'));
})->name('home');

// Blog Routes
Route::get('/blog', function () {
    return view('blog.index');
})->name('blog.index');

Route::get('/blog/{slug}', function ($slug) {
    return view('blog.show', compact('slug'));
})->name('blog.show');

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    
    // Protected Admin Routes
    Route::middleware('admin')->group(function () {
        Route::resource('products', ProductController::class);
    });
});
