<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::factory(10)->create()->each(function ($user) {
            \App\Models\Product::factory(5)->create(['user_id' => $user->id])->each(function ($product) {
                \App\Models\ProductReview::factory(3)->create(['product_id' => $product->id]);
                \App\Models\ProductImage::factory(2)->create(['product_id' => $product->id]);
            });
        });
    }
}