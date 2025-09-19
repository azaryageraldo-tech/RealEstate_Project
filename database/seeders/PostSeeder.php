<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::create([
            'title' => '5 Tips Cerdas Investasi Properti untuk Pemula',
            'slug' => '5-tips-cerdas-investasi-properti-pemula',
            'image_url' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?q=80&w=2070&auto=format&fit=crop',
            'excerpt' => 'Investasi properti bisa sangat menguntungkan jika dilakukan dengan benar. Pelajari langkah-langkah awal yang harus Anda ambil.',
            'body' => 'Investasi properti dianggap sebagai salah satu cara paling stabil untuk membangun kekayaan jangka panjang. Namun, bagi pemula, dunia properti bisa terasa menakutkan. Berikut adalah lima tips cerdas untuk memulai perjalanan investasi properti Anda...',
            'published_at' => now(),
        ]);

        Post::create([
            'title' => 'Panduan Lengkap Membeli Rumah Pertama Anda',
            'slug' => 'panduan-lengkap-membeli-rumah-pertama',
            'image_url' => 'https://images.unsplash.com/photo-1448630360428-65456885c650?q=80&w=2067&auto=format&fit=crop',
            'excerpt' => 'Membeli rumah pertama adalah tonggak sejarah besar. Jangan sampai salah langkah, ikuti panduan lengkap kami dari awal hingga akhir.',
            'body' => 'Membeli rumah pertama adalah salah satu keputusan finansial terbesar dalam hidup Anda. Prosesnya bisa rumit, tetapi dengan persiapan yang matang, Anda bisa menjalaninya dengan lancar. Mulai dari menabung untuk uang muka, mencari KPR terbaik, hingga proses serah terima kunci, kami akan membahas semuanya...',
            'published_at' => now(),
        ]);
    }
}
