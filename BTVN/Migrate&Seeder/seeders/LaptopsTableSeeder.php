<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class LaptopsTableSeeder extends Seeder
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
            DB::table('laptops')->insert([
                'brand' => $faker->randomElement(['Dell', 'HP', 'Asus', 'Acer', 'Lenovo']),
                'model' => $faker->word . ' ' . $faker->numberBetween(1000, 9000),
                'specifications' => $faker->randomElement(['i3, 4GB RAM, 128GB SSD', 'i5, 8GB RAM, 256GB SSD', 'i7, 16GB RAM, 512GB SSD']),
                'rental_status' => $faker->boolean,
                'renter_id' => DB::table('renters')->inRandomOrder()->first()->id, // liên kết với người thuê ngẫu nhiên
            ]);
        }
    }
}
