<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'template',
        'json_schema',
        'image',
        'category',
        'category_slug',
        'published_date',
        'reading_time',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'published_date' => 'date',
        'is_published' => 'boolean',
        'reading_time' => 'integer',
        'sort_order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
            if (!empty($blog->category) && empty($blog->category_slug)) {
                $blog->category_slug = Str::slug($blog->category);
            }
        });

        static::updating(function ($blog) {
            if ($blog->isDirty('title') && empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
            if ($blog->isDirty('category') && !empty($blog->category)) {
                $blog->category_slug = Str::slug($blog->category);
            }
        });
    }
}
