<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [];

        $row1 = [
            'name' => 'Admin',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $row2 = [
            'name' => 'User',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $row3 = [
            'name' => 'Employee',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        array_push($list, $row1, $row2, $row3);

        DB::table("roles")->insert($list);
    }
}
