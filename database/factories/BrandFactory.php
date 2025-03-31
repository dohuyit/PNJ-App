<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'image_thumbnail' => fake()->imageUrl(255, 255, 'jewelry'),
            'banner_image' => fake()->imageUrl(800, 400, 'jewelry'),
            'description' => fake()->text(),
            'is_active' => fake()->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
