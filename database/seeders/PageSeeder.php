<?php
use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        Page::create([
            'title' => 'Tentang Kami',
            'slug' => 'tentang-kami',
            'content' => '<h3>Misi Kami</h3><p>Tulis konten awal halaman tentang kami di sini...</p>',
        ]);

        Page::create([
            'title' => 'Kontak',
            'slug' => 'kontak',
            'content' => '<p>Detail kontak seperti alamat dan nomor telepon...</p>',
        ]);

         Page::create([
            'title' => 'FAQ',
            'slug' => 'faq',
            'content' => '<p>Isi FAQ dalam format HTML di sini...</p>',
        ]);
    }
}