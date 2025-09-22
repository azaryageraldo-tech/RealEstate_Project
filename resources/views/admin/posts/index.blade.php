<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manajemen Artikel') }}
            </h2>
            <a href="{{ route('admin.posts.create') }}" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold rounded-lg shadow-lg transform hover:scale-105 transition-all">
                + Tulis Artikel Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md" role="alert">
                <p class="font-bold">Sukses</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <div data-aos="fade-up" class="group bg-white rounded-xl shadow-lg overflow-hidden flex flex-col relative">
                    <div class="absolute top-4 right-4 z-10 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <a href="{{ route('admin.posts.edit', $post) }}" class="p-2 rounded-full bg-white/80 backdrop-blur-sm text-blue-600 hover:bg-white hover:text-blue-700 shadow-md transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </a>
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="p-2 rounded-full bg-white/80 backdrop-blur-sm text-red-600 hover:bg-white hover:text-red-700 shadow-md transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>

                    <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="block overflow-hidden">
                        <img src="{{ Storage::url($post->image_url) }}" alt="{{ $post->title }}" class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-105">
                    </a>
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-gray-800 flex-grow">{{ $post->title }}</h3>
                        <p class="mt-2 text-gray-600 text-sm">{{ $post->excerpt }}</p>
                        <p class="mt-4 text-xs text-gray-400">Dipublikasikan pada {{ $post->published_at->format('d M Y') }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-3 bg-white rounded-xl shadow-md p-8 text-center text-gray-500">Tidak ada artikel yang ditemukan.</div>
            @endforelse
        </div>
        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>
</x-admin-layout>