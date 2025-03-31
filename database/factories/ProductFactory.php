<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Collection;
use App\Models\JewelryLine;
use App\Models\ProductType;
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
            'product_name' => fake()->word(),
            'original_price' => fake()->randomFloat(2, 100, 10000), // Giá từ 100 đến 10,000
            'sale_price' => fake()->optional()->randomFloat(2, 50, 9000), // Có thể null
            'product_image' => fake()->imageUrl(255, 255, 'Products'), // Ảnh giả
            'description' => fake()->text(200),
            'is_featured' => fake()->boolean(),
            'product_status' => fake()->boolean(),
            'category_id' => Category::factory(),
            'jewelry_line_id' => JewelryLine::factory(),
            'collection_id' => Collection::factory(),
            'brand_id' => Brand::factory(),
            'product_type_id' => ProductType::factory(),
        ];
    }
}
