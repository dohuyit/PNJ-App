<?php

namespace Database\Seeders;

use App\Models\AttributeGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AttributeGroup::factory()->create(['name' => 'Size']);
        AttributeGroup::factory(2)->create();
    }
}
