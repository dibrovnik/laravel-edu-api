<?php

namespace Database\Factories;

use App\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'description' => fake()->text,
            'count' => fake()->randomNumber(),
            'price' => fake()->randomFloat(),
            'status' => fake()->randomElement([ProductStatus::Draft, ProductStatus::Published]),
        ];
    }
}
