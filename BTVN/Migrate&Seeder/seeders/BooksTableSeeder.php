<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $libraryIds = DB::table('libraries')->pluck('id'); // Lấy danh sách library_id

        for ($i = 0; $i < 100; $i++) { // Seed 100 sách
            DB::table('books')->insert([
                'title' => $faker->sentence(3), // Tiêu đề sách
                'author' => $faker->name, // Tác giả
                'publication_year' => $faker->year, // Năm xuất bản
                'genre' => $faker->word, // Thể loại
                'library_id' => $faker->randomElement($libraryIds), // ID thư viện ngẫu nhiên
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
