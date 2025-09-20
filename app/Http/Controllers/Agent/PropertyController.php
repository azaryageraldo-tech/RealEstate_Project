<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Menampilkan daftar properti milik agen.
     */
    public function index()
    {
        $properties = Property::where('user_id', Auth::id())
                              ->latest()
                              ->paginate(10);
                              
        return view('agent.properties.index', compact('properties'));
    }

    /**
     * Menampilkan formulir untuk membuat properti baru.
     */
    public function create()
    {
        return view('agent.properties.create');
    }

    /**
     * Menyimpan properti baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'price' => 'required|numeric',
            'type' => 'required|in:Rumah,Apartemen,Tanah,Ruko',
            'description' => 'required|string',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'surface_area' => 'required|integer',
        ]);

        $imagePath = $request->file('image_url')->store('properties', 'public');

        Property::create(array_merge($validated, [
            'user_id' => Auth::id(),
            'image_url' => $imagePath,
            'status' => 'Tersedia',
        ]));

        return redirect()->route('agent.properties.index')->with('success', 'Properti berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail satu properti.
     */
    public function show(Property $property)
    {
        if (Auth::id() !== $property->user_id) {
            abort(403);
        }

        $viewCount = $property->views()->count();
        $favoriteCount = $property->favoritedByUsers()->count();

        // Ambil 3 properti lain untuk ditampilkan sebagai "properti serupa"
        $relatedProperties = Property::where('id', '!=', $property->id)
                                     ->where('user_id', Auth::id()) // Hanya dari agen yang sama
                                     ->inRandomOrder()
                                     ->take(3)
                                     ->get();

        return view('agent.properties.show', compact('property', 'relatedProperties', 'viewCount', 'favoriteCount'));
    }

    /**
     * Menampilkan formulir untuk mengedit properti.
     */
    public function edit(Property $property)
    {
        if (Auth::id() !== $property->user_id) {
            abort(403);
        }
        return view('agent.properties.edit', compact('property'));
    }

    /**
     * Memperbarui data properti di database.
     */
    public function update(Request $request, Property $property)
    {
        if (Auth::id() !== $property->user_id) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'location' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric',
            'type' => 'sometimes|required|in:Rumah,Apartemen,Tanah,Ruko',
            'description' => 'sometimes|required|string',
            'image_url' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bedrooms' => 'sometimes|required|integer',
            'bathrooms' => 'sometimes|required|integer',
            'surface_area' => 'sometimes|required|integer',
            'status' => 'sometimes|required|in:Tersedia,Terjual,Disewa',
        ]);
        
        if ($request->hasFile('image_url')) {
            if ($property->image_url) {
                Storage::delete('public/' . $property->image_url);
            }
            $validated['image_url'] = $request->file('image_url')->store('properties', 'public');
        }

        $property->update($validated);

        return back()->with('success', 'Properti berhasil diperbarui!');
    }

    /**
     * Menghapus properti dari database.
     */
    public function destroy(Property $property)
    {
        if (Auth::id() !== $property->user_id) {
            abort(403);
        }
        
        if ($property->image_url) {
            Storage::delete('public/' . $property->image_url);
        }

        $property->delete();

        return redirect()->route('agent.properties.index')->with('success', 'Properti berhasil dihapus!');
    }
}