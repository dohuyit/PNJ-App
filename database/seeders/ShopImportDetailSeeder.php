<?php

namespace Database\Seeders;

use App\Models\ShopImport;
use App\Models\ShopImportDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopImportDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShopImportDetail::factory()->count(8)->create();
    }
}
