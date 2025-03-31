<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $unitPrice = $this->faker->randomFloat(2, 10, 500);
        $quantity = $this->faker->numberBetween(1, 10);
        $totalPrice = $unitPrice * $quantity;

        return [
            'order_id' => Order::factory(),
            'variant_id' => Variant::factory(),
            'unit_price' => $unitPrice,
            'quantity' => $quantity,
            'total_price' => $totalPrice,
        ];
    }
}
