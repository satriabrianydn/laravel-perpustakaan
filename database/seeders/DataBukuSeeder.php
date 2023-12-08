<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DataBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $idPenerbitA = DB::table('penerbit')->where('nama_penerbit', 'Penerbit A')->value('id');
        $idPenerbitB = DB::table('penerbit')->where('nama_penerbit', 'Penerbit B')->value('id');

        for ($i = 0; $i < 2; $i++) {
            $idPenerbit = ($i % 2 == 0) ? $idPenerbitA : $idPenerbitB;

            DB::table('data_buku')->insert([
                'kode_buku' => $faker->unique()->ean13,
                'nama_buku' => $faker->sentence(3),
                'tanggal_terbit' => $faker->date,
                'jumlah_halaman' => $faker->numberBetween(100, 500),
                'nama_pengarang' => $faker->name,
                'created_at' => now(),
                'updated_at' => now(),
                'id_penerbit' => $idPenerbit,
            ]);
        }
    }
}
