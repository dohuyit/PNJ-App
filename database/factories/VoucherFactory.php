<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voucher>
 */
class VoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isFixed = fake()->boolean();
        $discountAmount = $isFixed
            ? fake()->randomFloat(2, 5, 50)
            : fake()->randomFloat(2, 5, 30);

        $startDate = fake()->dateTimeBetween('-10 days', '+10 days');
        $endDate = fake()->dateTimeBetween($startDate, '+60 days');

        return [
            'voucher_code' => strtoupper(fake()->unique()->bothify('VCH###')),
            'voucher_name' => fake()->randomElement([
                'Welcome Discount',
                'Summer Sale',
                'Holiday Special',
                'New Customer',
                'Weekend Deal',
                'Flash Sale',
                'Loyalty Reward',
                'Anniversary Offer',
                'Seasonal Promotion'
            ]),
            'description' => fake()->optional(0.7)->sentence(8),
            'uses' => 0,
            'max_uses' => fake()->randomElement([1, 5, 10, 50, 100]),
            'max_uses_user' => fake()->randomElement([1, 2, 5]),
            'min_order_value' => fake()->randomFloat(2, 10, 100),
            'type' => fake()->randomElement([0, 1, 2]),
            'discount_amount' => $discountAmount,
            'is_fixed' => $isFixed ? 1 : 0,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ];
    }
}
