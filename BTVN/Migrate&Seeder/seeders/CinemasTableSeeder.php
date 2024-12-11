<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CinemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('cinemas')->insert([
                'name' => $faker->company . ' Cinemas', // Ví dụ: "CGV Vincom"
                'location' => $faker->address, // Địa chỉ
                'total_seats' => $faker->numberBetween(200, 500), // Tổng số ghế ngồi
            ]);
        }
    }
}
