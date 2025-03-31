<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Thêm bản ghi đầu tiên (admin)
        User::create([
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'gender' => 0,
            'email' => 'admin@gmail.com',
            'birthday' => date('Y-m-d'),
            'avatar' => '',
            'phone' => '0123456789',
            'remember_token' => '',
            'activate_code' => '',
            'role_id' => 1,
            'city_id' => null,
            'district_id' => null,
            'ward_id' => null,
            'status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::factory(10)->create();
    }
}
