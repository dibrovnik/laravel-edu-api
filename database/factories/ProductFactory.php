<?php

namespace Database\Factories;

use App\Models\Product;
use App\Enums\ProductStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'count' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->numberBetween(100, 1000),
            'status' => $this->faker->randomElement([ProductStatus::Draft, ProductStatus::Published]),
        ];
    }
}