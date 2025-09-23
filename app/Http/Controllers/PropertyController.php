<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyView;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Menampilkan semua properti yang tersedia untuk publik.
     */
    public function index()
    {
        $properties = Property::where('status', 'Tersedia')
                              ->latest()
                              ->paginate(9);
                              
        return view('pages.properti.index', compact('properties'));
    }

    /**
     * Menampilkan detail satu properti.
     */
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
        
        // Ambil 3 properti lain yang statusnya "Tersedia" secara acak
        $relatedProperties = Property::where('status', 'Tersedia')
                                     ->where('id', '!=', $property->id)
                                     ->inRandomOrder()
                                     ->take(3)
                                     ->get();

        // Kirim data properti dan properti terkait ke view
        return view('pages.properti.show', compact('property', 'relatedProperties'));
    }
}