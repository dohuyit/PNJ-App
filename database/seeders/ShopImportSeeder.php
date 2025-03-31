<?php

namespace Database\Seeders;

use App\Models\ShopImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopImportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShopImport::factory()->count(8)->create();
    }
}
