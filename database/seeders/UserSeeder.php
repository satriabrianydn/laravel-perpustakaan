<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Mahasiswa;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::Create([
            'name' => 'ADMINISTRATOR',
            'email' => 'admin@gmail.com',
            'email_verified_at' => null,
            'password' => Hash::make('12345678'),
            'role' => 'Administrator',
            'created_at' => now()
        ]);

        Admin::Create([
            'user_id' => 1,
            'nip' => '0000000000',
            'alamat' => 'Unknown Street',
            'gender' => 'Laki-Laki',
            'no_telp' => '088888888888',
            'avatar' => 'default_avatar.jpg',
            'created_at' => now()
        ]);

        User::Create([
            'name' => 'PETUGAS',
            'email' => 'petugas@gmail.com',
            'email_verified_at' => null,
            'password' => Hash::make('12345678'),
            'role' => 'Petugas',
            'created_at' => now()
        ]);

        Petugas::Create([
            'user_id' => 2,
            'nip' => '200000',
            'alamat_petugas' => 'Unknown Street',
            'gender' => 'Laki-Laki',
            'no_telp' => '088888888888',
            'avatar' => 'default_avatar.jpg',
            'created_at' => now()
        ]);


        User::Create([
            'name' => 'MAHASISWA',
            'email' => 'mahasiswa@gmail.com',
            'email_verified_at' => null,
            'password' => Hash::make('12345678'),
            'role' => 'Mahasiswa',
            'created_at' => now()
        ]);

        Mahasiswa::Create([
            'user_id' => 3,
            'nim' => '220103000',
            'gender' => 'Laki-Laki',
            'prodi' => 'Teknik Informatika',
            'kelas' => 'TI22A5',
            'angkatan' => '2022',
            'no_telp' => '012345678910',
            'avatar' => 'default_avatar.jpg',
            'created_at' => now()
        ]);

        
    }
}
