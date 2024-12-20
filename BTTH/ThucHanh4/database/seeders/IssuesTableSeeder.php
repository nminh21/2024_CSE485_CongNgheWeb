<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1, 50), // Khóa ngoại tham chiếu tới bảng computers
                'reported_by' => $faker->optional()->name(), // Người báo cáo (tùy chọn)
                'reported_date' => $faker->dateTimeBetween('-1 year', 'now'), // Ngày báo cáo
                'description' => $faker->sentence(10), // Mô tả chi tiết
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']), // Mức độ sự cố
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']), // Trạng thái sự cố
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
