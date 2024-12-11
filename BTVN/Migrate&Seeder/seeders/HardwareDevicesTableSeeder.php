<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class HardwareDevicesTableSeeder extends Seeder
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
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->word . ' ' . $faker->randomElement(['G502', 'K120', 'H370']), // Ví dụ: "Logitech G502"
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']), // Loại thiết bị
                'status' => $faker->boolean, // Trạng thái hoạt động
                'center_id' => DB::table('it_centers')->inRandomOrder()->first()->id, // Liên kết ngẫu nhiên với trung tâm tin học
            ]);
        }
    }
}
