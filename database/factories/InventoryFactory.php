<?php

namespace Database\Factories;

use App\Models\ShopStore;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'variant_id' => Variant::factory(), // Giả sử variant_id từ 1-100
            'store_id'   => ShopStore::factory(),  // Giả sử store_id từ 1-10
            'quantity'   => fake()->numberBetween(0, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
