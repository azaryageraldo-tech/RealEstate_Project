<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post; // <-- Menggunakan model Post
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller // <-- Nama class diubah menjadi PostController
{
    /**
     * Menampilkan daftar semua artikel.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Menampilkan form untuk membuat artikel baru.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Menyimpan artikel baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'body' => 'required|string',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validated['image_url'] = $request->file('image_url')->store('posts', 'public');
        $validated['slug'] = Str::slug($validated['title']);
        $validated['published_at'] = now();

        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Artikel berhasil dibuat.');
    }

    /**
     * Menampilkan form untuk mengedit artikel.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Memperbarui artikel di database.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'body' => 'required|string',
            'image_url' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image_url')) {
            if ($post->image_url) {
                Storage::delete('public/' . $post->image_url);
            }
            $validated['image_url'] = $request->file('image_url')->store('posts', 'public');
        }
        
        $validated['slug'] = Str::slug($validated['title']);

        $post->update($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Menghapus artikel dari database.
     */
    public function destroy(Post $post)
    {
        if ($post->image_url) {
            Storage::delete('public/' . $post->image_url);
        }
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Artikel berhasil dihapus.');
    }
}