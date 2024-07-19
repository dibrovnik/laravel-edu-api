<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Создаем 50 записей в таблице product_images с помощью фабрики ProductImageFactory
        ProductImage::factory()->count(50)->create();
    }
}
