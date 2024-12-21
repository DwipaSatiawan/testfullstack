<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Menyisipkan 10 data kategori
        for ($i = 0; $i < 20; $i++) {
            DB::table('kategori')->insert([
                'nama' => $faker->word, // Nama kategori palsu
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}