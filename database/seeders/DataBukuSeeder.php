<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataBuku = [
            [
                'kode_buku' => 'BK-001',
                'nama_buku' => 'The Adventures of Sherlock Holmes',
                'id_penerbit' => null,
                'id_kategori' => null,
                'tanggal_terbit' => now(),
                'jumlah_halaman' => '200',
                'foto_buku' => null,
                'deskripsi' => 'Classic detective stories featuring Sherlock Holmes.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_buku' => 'BK-002',
                'nama_buku' => 'To Kill a Mockingbird',
                'id_penerbit' => null,
                'id_kategori' => null,
                'tanggal_terbit' => now(),
                'jumlah_halaman' => '281',
                'foto_buku' => null,
                'deskripsi' => 'A novel about racial injustice in the American South.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_buku' => 'BK-003',
                'nama_buku' => '1984',
                'id_penerbit' => null,
                'id_kategori' => null,
                'tanggal_terbit' => now(),
                'jumlah_halaman' => '328',
                'foto_buku' => null,
                'deskripsi' => 'Dystopian novel by George Orwell.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_buku' => 'BK-004',
                'nama_buku' => 'The Great Gatsby',
                'id_penerbit' => null,
                'id_kategori' => null,
                'tanggal_terbit' => now(),
                'jumlah_halaman' => '180',
                'foto_buku' => null,
                'deskripsi' => 'A story of the American Dream during the Roaring Twenties.',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        Book::insert($dataBuku);
    }
}
