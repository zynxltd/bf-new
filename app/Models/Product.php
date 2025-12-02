<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'full_description',
        'image',
        'image_2',
        'video',
        'videos',
        'reviews',
        'delivery_info',
        'specs',
        'npk',
        'features',
        'application',
        'makes',
        'yg_link',
        'amazon_link',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
