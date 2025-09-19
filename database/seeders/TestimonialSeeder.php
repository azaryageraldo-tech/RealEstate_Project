<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::create([
            'name' => 'Andi Pratama',
            'role' => 'Pembeli Rumah, Jakarta Selatan',
            'avatar_url' => 'https://i.pravatar.cc/150?u=andi',
            'content' => 'Proses pembelian rumah jadi sangat mudah dan transparan berkat PropertiKita. Agennya sangat profesional dan membantu saya menemukan rumah impian!',
            'rating' => 5,
        ]);

        Testimonial::create([
            'name' => 'Siti Lestari',
            'role' => 'Penyewa Apartemen, Surabaya',
            'avatar_url' => 'https://i.pravatar.cc/150?u=siti',
            'content' => 'Platformnya mudah digunakan, banyak pilihan apartemen bagus dengan harga terjangkau. Saya menemukan unit yang cocok hanya dalam beberapa hari.',
            'rating' => 5,
        ]);

        Testimonial::create([
            'name' => 'Budi Santoso',
            'role' => 'Investor Properti',
            'avatar_url' => 'https://i.pravatar.cc/150?u=budi',
            'content' => 'Sebagai investor, data yang disajikan sangat akurat. Membantu saya dalam mengambil keputusan investasi yang tepat waktu. Sangat direkomendasikan.',
            'rating' => 4,
        ]);
    }
}
