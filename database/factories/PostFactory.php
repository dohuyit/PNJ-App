<?php

namespace Database\Factories;

use App\Models\PostsCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->words(6, true);
        return [
            'post_slug' => str($title)->slug(),
            'post_title' => $title,
            'post_content' => fake()->paragraphs(5, true),
            'post_excerpt' => fake()->paragraph(),
            'post_type' => fake()->randomElement(['post', 'page', 'product']),
            'post_status' => fake()->randomElement(['draft', 'published', 'pending', 'private']),
            'post_image' => fake()->imageUrl(800, 600),
            'user_id' => User::factory(),
            'post_category_id' => PostsCategory::factory(),
        ];
    }
}
