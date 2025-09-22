<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,      // <-- PINDAHKAN KE PALING ATAS
            PropertySeeder::class,
            PostSeeder::class,
            TestimonialSeeder::class,
            
        ]);
    }
}