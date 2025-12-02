<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
});
