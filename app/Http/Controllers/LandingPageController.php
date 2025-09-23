<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Testimonial;
use App\Models\Page;
use App\Models\Property;
use App\Models\Banner;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->take(3)->get();
        $properties = Property::where('status', 'Tersedia')->latest()->take(3)->get();
        $faqs = Page::where('slug', 'faq')->first();
        $banner = Banner::where('is_active', true)->latest()->first();
        
        return view('pages.landing', compact('testimonials', 'properties', 'faqs', 'banner'));
    }

    public function about()
    {
        $page = Page::where('slug', 'tentang-kami')->firstOrFail();
        return view('pages.about', compact('page'));
    }

    public function contact()
    {
        $page = Page::where('slug', 'kontak')->firstOrFail();
        return view('pages.contact', compact('page'));
    }
}