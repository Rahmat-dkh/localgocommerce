<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'image',
        'whatsapp_number',
        'vendor_id',
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }

        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }

        // If the path starts with products/, it's definitely in storage
        if (str_starts_with($this->image, 'products/')) {
            return asset('storage/' . $this->image);
        }

        // Check if it exists in public directory directly
        if (file_exists(public_path($this->image))) {
            return asset($this->image);
        }

        // Default to storage
        return asset('storage/' . $this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating') ?: 0;
    }

    public function reviewCount()
    {
        return $this->reviews()->count();
    }
}
