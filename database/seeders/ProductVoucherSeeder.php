<?php

namespace Database\Seeders;

use App\Models\ProductVoucher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductVoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductVoucher::factory()->count(8)->create();
    }
}
