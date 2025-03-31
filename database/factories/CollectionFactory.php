<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true),
            'image_thumbnail' => fake()->imageUrl(255, 255, 'jewelry'),
            'banner_image' => fake()->imageUrl(800, 400, 'jewelry'),
            'description' => fake()->paragraph(2),
            'brand_id' => Brand::factory(),
            'is_wedding_collection' => fake()->boolean(50), // 50% xác suất nhận 1 hoặc 0
            'is_active' => fake()->boolean(80), // 80% là 1, 20% là 0
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
