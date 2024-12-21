<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create(); // Membuat instance Faker

        // Menyisipkan 250 data buku ke dalam tabel 'buku'
        for ($i = 0; $i < 250; $i++) {
            DB::table('buku')->insert([
                'judul' => $faker->sentence(3),  // Judul buku palsu
                'kategori_id' => rand(1, 10),    // Random kategori_id antara 1 sampai 10
                'pengarang_id' => rand(1, 10),   // Random pengarang_id antara 1 sampai 10
                'tahun' => $faker->year,         // Tahun penerbitan buku
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
