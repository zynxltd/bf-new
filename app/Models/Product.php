<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'full_description',
        'image',
        'image_2',
        'image_3',
        'image_4',
        'package_color',
        'video',
        'videos',
        'reviews',
        'faqs',
        'delivery_info',
        'specs',
        'badge_1',
        'badge_2',
        'npk',
        'features',
        'application',
        'makes',
        'sku',
        'yg_link',
        'amazon_link',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get the slug attribute, generating it if missing
     */
    public function getSlugAttribute($value)
    {
        if (empty($value) && !empty($this->attributes['title'])) {
            // Generate slug from title if missing
            $slug = Str::slug($this->attributes['title']);
            // Ensure uniqueness
            $originalSlug = $slug;
            $count = 1;
            while (static::where('slug', $slug)->where('id', '!=', $this->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
            // Store in attributes
            $this->attributes['slug'] = $slug;
            // Save only if not already saved (check if this is a fresh instance)
            if ($this->exists && !$this->wasRecentlyCreated) {
                // Use updateQuietly to avoid triggering events
                static::withoutEvents(function () use ($slug) {
                    $this->updateQuietly(['slug' => $slug]);
                });
            }
            return $slug;
        }
        return $value;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->title);
                // Ensure uniqueness
                $originalSlug = $product->slug;
                $count = 1;
                while (static::where('slug', $product->slug)->exists()) {
                    $product->slug = $originalSlug . '-' . $count;
                    $count++;
                }
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('title') && empty($product->slug)) {
                $product->slug = Str::slug($product->title);
                // Ensure uniqueness (excluding current product)
                $originalSlug = $product->slug;
                $count = 1;
                while (static::where('slug', $product->slug)->where('id', '!=', $product->id)->exists()) {
                    $product->slug = $originalSlug . '-' . $count;
                    $count++;
                }
            }
        });
    }
}
