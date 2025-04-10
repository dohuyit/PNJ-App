<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShopStore>
 */
class ShopStoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => 'CODE-' . uniqid(),
            'name' => fake()->word(),
            'description' => fake()->text(),
            'image' => fake()->imageUrl(800, 400, 'wallpaper')
        ];
    }
}
