<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => $this->faker->userName(),
            'password' => Hash::make('123456'),
            'gender' => $this->faker->randomElement([0, 1]),
            'email' => $this->faker->unique()->safeEmail(),
            'birthday' => $this->faker->dateTimeBetween('-30 years', 'now')->format('Y-m-d'),
            'avatar' => $this->faker->imageUrl(200, 200, 'people'),
            'phone' => $this->faker->phoneNumber(),
            'remember_token' => Str::random(10),
            'activate_code' => $this->faker->uuid(),
            'role_id' => Role::factory(), 
            'city_id' => null,
            'district_id' => null,
            'ward_id' => null,
            'status' => 0,
            'created_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
