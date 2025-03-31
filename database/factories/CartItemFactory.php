<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartItem>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cart_id' => Cart::factory(),
            'variant_id' => Variant::factory(),
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
