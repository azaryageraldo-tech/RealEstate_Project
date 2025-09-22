<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Menampilkan daftar semua properti.
     */
    public function index()
    {
        $properties = Property::with('user')
                              ->latest()
                              ->paginate(10);
                              
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Menampilkan detail satu properti dari sisi admin.
     */
    public function show(Property $property)
    {
        return view('admin.properties.show', compact('property'));
    }

    /**
     * Menampilkan form untuk mengedit properti.
     */
    public function edit(Property $property)
    {
        // Ambil semua agen untuk dropdown, agar admin bisa mengubah pemilik properti
        $agents = User::where('role', 'agent')->get();
        return view('admin.properties.edit', compact('property', 'agents'));
    }

    /**
     * Memperbarui data properti di database.
     */
    public function update(Request $request, Property $property)
    {
        // 'sometimes' berarti validasi hanya berjalan jika field tersebut ada di request
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'location' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric',
            'status' => 'sometimes|required|in:Menunggu Review,Tersedia,Terjual,Disewa',
            'type' => 'sometimes|required|in:Rumah,Apartemen,Tanah,Ruko',
            'description' => 'sometimes|required|string',
            'image_url' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'sometimes|required|exists:users,id',
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
        if ($property->image_url) {
            Storage::delete('public/' . $property->image_url);
        }
        $property->delete();
        return redirect()->route('admin.properties.index')->with('success', 'Properti berhasil dihapus!');
    }
    
    // Admin tidak memiliki fitur untuk membuat properti baru secara langsung dari panelnya
    // karena alurnya adalah agen yang membuat, lalu admin memvalidasi.
    public function create() { abort(404); }
    public function store(Request $request) { abort(404); }
}