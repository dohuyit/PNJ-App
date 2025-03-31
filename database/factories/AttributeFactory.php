<?php

namespace Database\Factories;

use App\Models\AttributeGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attribute>
 */
class AttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_attribute_id' =>  AttributeGroup::factory(),
            'name' => fake()->word(),
            'is_wedding' => random_int(0, 1)
        ];
    }
}
