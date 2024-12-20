<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('computers')->insert([
                'computers_name' => $faker->regexify('Lab[1-9]-PC[0-9]{2}'), // Tên máy tính
                'model' => $faker->randomElement(['Dell Optiplex 7090', 'HP EliteDesk 800', 'Lenovo ThinkCentre M720']), // Model
                'operating_system' => $faker->randomElement(['Windows 11 Pro', 'Ubuntu 20.04', 'macOS Ventura']), // Hệ điều hành
                'processor' => $faker->randomElement(['Intel Core i5-12400', 'AMD Ryzen 5 6600G', 'Intel Core i7-12700']), // Bộ vi xử lý
                'memory' => $faker->randomElement([8, 16, 32]), // RAM
                'available' => $faker->boolean(), // Trạng thái hoạt động
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
