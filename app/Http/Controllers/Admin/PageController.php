<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
     * Menampilkan form untuk membuat halaman baru.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Menyimpan halaman baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|alpha_dash|max:255|unique:pages',
            'content' => 'nullable|string',
        ]);

        Page::create($validated);

        return redirect()->route('admin.pages.index')->with('success', 'Halaman baru berhasil dibuat.');
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
            'slug' => 'required|string|alpha_dash|max:255|unique:pages,slug,' . $page->id,
            'content' => 'nullable|string',
        ]);

        $page->update($validated);

        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil diperbarui.');
    }

    /**
     * Menghapus halaman dari database.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil dihapus.');
    }
    
    public function show(Page $page) { abort(404); }
}