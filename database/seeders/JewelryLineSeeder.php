<?php

namespace Database\Seeders;

use App\Models\JewelryLine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JewelryLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JewelryLine::factory()->count(8)->create();
    }
}
