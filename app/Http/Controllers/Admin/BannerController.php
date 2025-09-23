<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Menampilkan daftar semua banner.
     */
    public function index()
    {
        $banners = Banner::latest()->paginate(10);
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Menampilkan form untuk membuat banner baru.
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Menyimpan banner baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'link_url' => 'nullable|url',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'sometimes|boolean',
        ]);

        $validated['image_path'] = $request->file('image_path')->store('banners', 'public');
        $validated['is_active'] = $request->has('is_active');

        Banner::create($validated);

        return redirect()->route('admin.banners.index')->with('success', 'Banner berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit banner.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Memperbarui banner di database.
     */
    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'link_url' => 'nullable|url',
            'image_path' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'sometimes|boolean',
        ]);
        
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image_path')) {
            if ($banner->image_path) {
                Storage::delete('public/' . $banner->image_path);
            }
            $validated['image_path'] = $request->file('image_path')->store('banners', 'public');
        }

        $banner->update($validated);

        return redirect()->route('admin.banners.index')->with('success', 'Banner berhasil diperbarui.');
    }

    /**
     * Menghapus banner dari database.
     */
    public function destroy(Banner $banner)
    {
        if ($banner->image_path) {
            Storage::delete('public/' . $banner->image_path);
        }
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner berhasil dihapus.');
    }
    
    public function show(Banner $banner) { abort(404); }
}