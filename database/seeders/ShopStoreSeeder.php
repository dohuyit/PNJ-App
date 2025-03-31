<?php

namespace Database\Seeders;

use App\Models\ShopStore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShopStore::factory()->count(8)->create();
    }
}
