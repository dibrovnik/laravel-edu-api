<?php

namespace App\Models;

// namespace App\Models\Product;

use App\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'count',
        'price',
        'status',
    ];

    protected $casts = [
        'status' => ProductStatus::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class)->select('path');
    }

    public function rating(): int|float
    {
        return $this->reviews()->avg('rating');
    }
}
