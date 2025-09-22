<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Menampilkan daftar semua halaman statis.
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Menampilkan form untuk mengedit halaman.
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Memperbarui konten halaman di database.
     */
    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        $page->update($validated);

        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil diperbarui.');
    }

    // Method berikut tidak kita gunakan karena halaman dibuat melalui seeder.
    public function create() { abort(404); }
    public function store(Request $request) { abort(404); }
    public function show(Page $page) { abort(404); }
    public function destroy(Page $page) { abort(404); }
}