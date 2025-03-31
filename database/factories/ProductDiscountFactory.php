<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductDiscount>
 */
class ProductDiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('-30 days', '+30 days');
        $endDate = $this->faker->dateTimeBetween($startDate, '+60 days');

        return [
            'product_id' => Product::factory(),
            'discount_name' => $this->faker->randomElement([
                'Spring Sale',
                'Summer Promotion',
                'Flash Sale',
                'Holiday Discount',
                'Weekend Special',
                'Clearance',
                'New Customer',
                'Loyalty Reward',
                'Bundle Discount'
            ]),
            'discount_amount' => $this->faker->randomFloat(2, 5, 50),
            'is_fixed' => $this->faker->boolean(),
            'start_date' => $startDate,
            'end_date' => $endDate,
        ];
    }
}
