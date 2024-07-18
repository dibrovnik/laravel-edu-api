<?php

namespace App\Models;
namespace App\Models\Product;

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

    public function user(): BelongTo
    {
        return $this->belongsTo(User::class);
    }
    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}
