<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buat Pengguna Super Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@propertikita.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        // 2. Buat Pengguna Agen
        User::create([
            'name' => 'Agen Properti',
            'email' => 'agent@propertikita.com',
            'role' => 'agent',
            'password' => Hash::make('password'),
        ]);

        // 3. Buat Pengguna Biasa
        User::create([
            'name' => 'Pengguna Biasa',
            'email' => 'user@propertikita.com',
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);
    }
}