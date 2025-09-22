<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Testimonial;
use App\Models\Page;
use App\Models\Property;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Menampilkan halaman utama (landing page) dengan data dinamis.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->take(3)->get();
        $properties = Property::where('status', 'Tersedia')->latest()->take(3)->get();
        
        // Mengambil konten FAQ dari database
        $faqs = Page::where('slug', 'faq')->first(); // Menggunakan variabel $faqs
        
        // Kirim semua data ke view, pastikan 'faqs' ada di dalam compact()
        return view('pages.landing', compact('testimonials', 'properties', 'faqs'));
    }

    /**
     * Menampilkan halaman "Tentang Kami" dari database.
     */
    public function about()
    {
        $page = Page::where('slug', 'tentang-kami')->firstOrFail();
        return view('pages.about', compact('page'));
    }

    /**
     * Menampilkan halaman "Kontak" dari database.
     */
    public function contact()
    {
        $page = Page::where('slug', 'kontak')->firstOrFail();
        return view('pages.contact', compact('page'));
    }
}