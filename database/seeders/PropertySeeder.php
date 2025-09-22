<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\User; // <-- 1. Import User model
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 2. Cari pengguna dengan peran 'agent' yang sudah dibuat oleh UserSeeder
        $agent = User::where('role', 'agent')->first();

        // Cek jika agen ditemukan untuk menghindari error
        if ($agent) {
            // 3. Tambahkan 'user_id' => $agent->id ke setiap properti
            Property::create([
                'user_id' => $agent->id, // <-- TAMBAHKAN INI
                'name' => 'Rumah Mewah di Pondok Indah',
                'location' => 'Jakarta Selatan',
                'price' => 3500000000,
                'status' => 'Menunggu Review',
                'type' => 'Rumah',
                'description' => 'Rumah modern dengan fasilitas lengkap, kolam renang pribadi, dan taman yang asri.',
                'image_url' => 'properties/dummy1.jpg', // Path dummy
                'bedrooms' => 4,
                'bathrooms' => 3,
                'surface_area' => 300
            ]);

            Property::create([
                'user_id' => $agent->id, // <-- TAMBAHKAN INI
                'name' => 'Apartemen Sudirman Park',
                'location' => 'Jakarta Pusat',
                'price' => 1200000000,
                'status' => 'Menunggu Review',
                'type' => 'Apartemen',
                'description' => 'Apartemen 2 kamar tidur dengan pemandangan kota yang menakjubkan.',
                'image_url' => 'properties/dummy2.jpg', // Path dummy
                'bedrooms' => 2,
                'bathrooms' => 1,
                'surface_area' => 80
            ]);

            Property::create([
                'user_id' => $agent->id, // <-- TAMBAHKAN INI
                'name' => 'Villa Asri di Sentul',
                'location' => 'Bogor',
                'price' => 2800000000,
                'status' => 'Menunggu Review',
                'type' => 'Rumah',
                'description' => 'Villa dengan konsep alam, udara sejuk, dan pemandangan pegunungan.',
                'image_url' => 'properties/dummy3.jpg', // Path dummy
                'bedrooms' => 5,
                'bathrooms' => 4,
                'surface_area' => 450
            ]);
        }
    }
}