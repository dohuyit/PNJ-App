<?php

namespace Database\Seeders;

use App\Models\PostsCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostsCategory::factory()->count(8)->create();
    }
}
