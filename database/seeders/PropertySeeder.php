<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        Property::create([
            'name' => 'Rumah Mewah di Pondok Indah',
            'location' => 'Jakarta Selatan',
            'price' => 3500000000,
            'type' => 'Rumah',
            'description' => 'Rumah modern dengan fasilitas lengkap, kolam renang pribadi, dan taman yang asri. Lokasi strategis dekat dengan pusat perbelanjaan dan sekolah internasional.',
            'image_url' => 'https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=2070&auto=format&fit=crop',
            'bedrooms' => 4,
            'bathrooms' => 3,
            'surface_area' => 300
        ]);

        Property::create([
            'name' => 'Apartemen Sudirman Park',
            'location' => 'Jakarta Pusat',
            'price' => 1200000000,
            'type' => 'Apartemen',
            'description' => 'Apartemen 2 kamar tidur dengan pemandangan kota yang menakjubkan. Fasilitas gym, kolam renang, dan keamanan 24 jam.',
            'image_url' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto=format&fit=crop',
            'bedrooms' => 2,
            'bathrooms' => 1,
            'surface_area' => 80
        ]);

        Property::create([
            'name' => 'Villa Asri di Sentul',
            'location' => 'Bogor',
            'price' => 2800000000,
            'type' => 'Rumah',
            'description' => 'Villa dengan konsep alam, udara sejuk, dan pemandangan pegunungan. Cocok untuk tempat tinggal atau investasi.',
            'image_url' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=2070&auto=format&fit=crop',
            'bedrooms' => 5,
            'bathrooms' => 4,
            'surface_area' => 450
        ]);
    }
}