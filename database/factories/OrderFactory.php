<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\District;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_code' => 'PNJ-' . random_int(10, 10000) . '-' . now()->format('Ymd'),
            'user_id' => User::factory(),
            'name' => fake()->name,
            'email' => fake()->safeEmail,
            'phone' => fake()->numerify('##########'), // 10 chữ số
            'date' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'total_amount' => fake()->randomFloat(2, 100, 10000),
            'discount_amount' => fake()->optional(0.3)->randomFloat(2, 10, 500),
            'city_id' => City::factory(),
            'district_id' => District::factory(),
            'ward_id' => Ward::factory(),
            'address' => fake()->streetAddress,
            'note' => fake()->optional(0.5)->sentence,
            'payment_method_id' => PaymentMethod::factory(),
            'status_id' => OrderStatus::factory(),
            'transaction_code' => fake()->optional(0.7)->bothify('TRX-########'),
            'payment_status' => fake()->boolean(80),
        ];
    }
}
