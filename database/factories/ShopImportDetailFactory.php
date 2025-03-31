<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ShopImport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShopImportDetail>
 */
class ShopImportDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'import_id' => ShopImport::factory(),
            'product_id' => Product::factory(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'unit_price' => $this->faker->randomFloat(2, 5, 500),
        ];
    }
}
