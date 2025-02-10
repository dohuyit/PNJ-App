<?php

namespace Database\Seeders;

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
        $faker = \Faker\Factory::create();
        $arrRoleIds = DB::table("roles")->pluck("id");
        $list = [];

        $row = [
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'last_name' => 'Trần Văn',
            'first_name' => 'A',
            'gender' => 0,
            'email' => 'admin@gmail.com',
            'birthday' => date('Y-m-d'),
            'avatar' => '',
            'phone' => '0123456789',
            'remember_token' => '',
            'activate_code' => '',
            'role_id' => 1,
            'city_id' => 2,
            'district_id' => 3,
            'ward_id' => 4,
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        array_push($list, $row);

        for ($i = 0; $i < 10; $i++) {
            $row = [
                'username' => $faker->word(),
                'password' => bcrypt('123456'),
                'last_name' => $faker->word(),
                'first_name' => $faker->word(),
                'gender' => $faker->randomElement([0, 1]),
                'email' => $faker->email(),
                'birthday' => $faker->dateTimeBetween('-30 years', 'now')->format('Y-m-d'),
                'avatar' => 'Stores/Avatar/avatar-df.jpg',
                'phone' => $faker->phoneNumber(),
                'remember_token' => '',
                'activate_code' => $faker->uuid(),
                'role_id' => $faker->randomElement($arrRoleIds),
                'city_id' => NULL,
                'district_id' => NULL,
                'ward_id' => NULL,
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            array_push($list, $row);
        }

        DB::table("users")->insert($list);
    }
}
