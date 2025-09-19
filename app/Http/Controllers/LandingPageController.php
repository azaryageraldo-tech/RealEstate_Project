<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Menampilkan halaman utama (landing page) beserta data testimoni dan FAQ.
     */
    public function index()
    {
        // 1. Mengambil 3 data testimoni terbaru dari database
        $testimonials = Testimonial::latest()->take(3)->get();

        // 2. Menyiapkan data FAQ secara statis
        $faqs = [
            [
                'question' => 'Bagaimana cara mendaftar untuk menjual properti?',
                'answer' => 'Anda dapat mendaftar sebagai agen melalui halaman registrasi kami. Setelah akun Anda diverifikasi, Anda akan mendapatkan akses ke dashboard untuk mulai memasang listing properti Anda.'
            ],
            [
                'question' => 'Apakah ada biaya untuk memasang iklan properti?',
                'answer' => 'Kami menawarkan beberapa paket, termasuk paket gratis dengan batasan jumlah listing. Untuk fitur lebih lanjut dan listing tanpa batas, Anda dapat memilih paket premium kami yang terjangkau.'
            ],
            [
                'question' => 'Bagaimana cara menghubungi agen properti?',
                'answer' => 'Untuk melihat informasi kontak agen, Anda harus login terlebih dahulu. Setelah login, Anda akan melihat detail kontak di setiap halaman detail properti.'
            ],
        ];

        // 3. Mengirim kedua data (testimonials dan faqs) ke view
        return view('pages.landing', compact('testimonials', 'faqs'));
    }

    /**
     * Menampilkan halaman "Tentang Kami".
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Menampilkan halaman "Kontak".
     */
    public function contact()
    {
        return view('pages.contact');
    }

    // Method faq() tidak lagi diperlukan karena FAQ sekarang menjadi bagian dari landing page.
}