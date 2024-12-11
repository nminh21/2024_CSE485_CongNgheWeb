<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ItCentersTableSeeder extends Seeder
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
            DB::table('it_centers')->insert([
                'name' => $faker->company . ' Tin học', // Ví dụ: "Trung tâm Tin học ABC"
                'location' => $faker->address, // Địa điểm
                'contact_email' => $faker->unique()->safeEmail, // Email liên hệ
            ]);
        }
    }
}
