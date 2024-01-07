<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriList = [
            'Horror',
            'Puisi',
            'Nonfiksi',
            'Fiksi',
            'Cerpen',
            'Ekonomi',
            'Biologi',
            'Teknologi',
            'Sejarah',
            'Agama Islam',
            'Fisika',
            'Matematika',
            'Inggris'
        ];

        $kategoriData = [];

        foreach ($kategoriList as $kategori) {
            $kategoriData[] = [
                'kategori' => $kategori,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        Kategori::insert($kategoriData);
    }
}

