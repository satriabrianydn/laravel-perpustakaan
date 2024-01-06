<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PenerbitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            DB::table('penerbit')->insert([
                    'nama_penerbit' => $faker->company,
                    'alamat_penerbit' => $faker->address,
                    'email_penerbit' => $faker->unique()->safeEmail,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
        }
    }
}
