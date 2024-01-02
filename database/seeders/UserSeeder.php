<?php

namespace Database\Seeders;

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

        Mahasiswa::Create([
            'user_id' => 1,
            'avatar' => 'default_avatar.jpg',
            'created_at' => now()
        ]);

        User::Create([
            'name' => 'PETUGAS',
            'email' => 'petugas@gmail.com',
            'email_verified_at' => null,
            'password' => Hash::make('12345678'),
            'role' => 'Administrator',
            'created_at' => now()
        ]);

        Mahasiswa::Create([
            'user_id' => 2,
            'avatar' => 'default_avatar.jpg',
            'created_at' => now()
        ]);
    }
}
