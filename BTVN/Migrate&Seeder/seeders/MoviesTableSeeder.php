<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->sentence(3), // Ví dụ: "Avengers: Endgame"
                'director' => $faker->name, // Đạo diễn
                'release_date' => $faker->date('Y-m-d', 'now'), // Ngày phát hành
                'duration' => $faker->numberBetween(90, 180), // Thời lượng phim (phút)
                'cinema_id' => DB::table('cinemas')->inRandomOrder()->first()->id, // Liên kết ngẫu nhiên với rạp chiếu phim
            ]);
        }
    }
}
