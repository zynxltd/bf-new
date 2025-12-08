<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display the specified product landing page.
     */
    public function show($slug)
    {
        $product = Product::where('is_active', true)
            ->where(function($query) use ($slug) {
                $query->where('slug', $slug)
                    ->orWhere('sku', $slug)
                    ->orWhere('id', $slug);
            })
            ->firstOrFail();

        // Get all products for navigation
        $products = Product::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('product.show', compact('product', 'products'));
    }
}
