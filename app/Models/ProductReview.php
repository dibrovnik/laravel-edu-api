<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'rating'
    ];

    protected $casts = [
        'rating' => 'int'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
