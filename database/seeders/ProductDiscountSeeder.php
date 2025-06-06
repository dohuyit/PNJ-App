<?php

namespace Database\Seeders;

use App\Models\ProductDiscount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductDiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductDiscount::factory()->count(8)->create();
    }
}
