<?php

namespace App\Http\Controllers; // <-- 1. Namespace WAJIB ada

use Illuminate\Routing\Controller; // <-- 2. Import Controller WAJIB ada
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Menampilkan semua artikel.
     */
    public function index()
    {
        $posts = Post::whereNotNull('published_at')
                     ->latest('published_at')
                     ->paginate(6);

        return view('pages.blog.index', compact('posts'));
    }

    /**
     * Menampilkan satu artikel.
     */
   public function show(Post $post)
{
    // Ambil 3 artikel lain secara acak
    $otherPosts = Post::where('slug', '!=', $post->slug)
                      ->whereNotNull('published_at')
                      ->inRandomOrder()
                      ->take(3)
                      ->get();
                      
    return view('pages.blog.show', compact('post', 'otherPosts'));
}
}