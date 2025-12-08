<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateProductSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:generate-slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate slugs for all products that are missing them';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::all();
        $updated = 0;

        foreach ($products as $product) {
            if (empty($product->slug) && !empty($product->title)) {
                $slug = Str::slug($product->title);
                
                // Ensure uniqueness
                $originalSlug = $slug;
                $count = 1;
                while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                    $slug = $originalSlug . '-' . $count;
                    $count++;
                }
                
                $product->slug = $slug;
                $product->saveQuietly();
                $updated++;
                
                $this->info("Generated slug '{$slug}' for product: {$product->title}");
            }
        }

        if ($updated > 0) {
            $this->info("Successfully generated {$updated} slug(s).");
        } else {
            $this->info("All products already have slugs.");
        }

        return Command::SUCCESS;
    }
}
