<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyView;

class PropertyController extends Controller
{
    // Menampilkan semua properti
    public function index()
    {
        $properties = Property::latest()->paginate(9); // Ambil data terbaru, 9 per halaman
        return view('pages.properti.index', compact('properties'));
    }

    // Menampilkan detail satu properti
    public function show(Property $property)
{
    // Logika untuk melacak view unik per sesi
    $sessionKey = 'property_viewed_' . $property->id;
    if (!session()->has($sessionKey)) {
        PropertyView::create([
            'property_id' => $property->id,
            'session_id' => session()->getId(),
        ]);
        session()->put($sessionKey, true);
    }
    // Ambil 3 properti lain secara acak untuk ditampilkan sebagai "properti serupa"
    $relatedProperties = Property::where('id', '!=', $property->id)
                                 ->inRandomOrder()
                                 ->take(3)
                                 ->get();

     return view('pages.properti.show', compact('property'));
}
}