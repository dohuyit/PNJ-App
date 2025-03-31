<?php

namespace Database\Factories;

use App\Models\ShopStore;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShopImport>
 */
class ShopImportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'store_id' => ShopStore::factory(),
            'user_id' => User::factory(),
            'import_date' => fake()->dateTime()
        ];
    }
}
