<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Artikel: <span class="text-blue-600">{{ Str::limit($post->title, 30) }}</span>
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-8 rounded-xl shadow-md" data-aos="fade-up">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Update Detail Artikel</h3>
            
            <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div>
                    <label for="title" class="font-semibold text-gray-700">Judul Artikel</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg">
                </div>

                <div>
                    <label for="excerpt" class="font-semibold text-gray-700">Ringkasan (Excerpt)</label>
                    <textarea name="excerpt" id="excerpt" rows="3" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg">{{ old('excerpt', $post->excerpt) }}</textarea>
                </div>

                <div>
                    <label for="body" class="font-semibold text-gray-700">Isi Konten</label>
                    <textarea name="body" id="body" rows="10" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg">{{ old('body', $post->body) }}</textarea>
                </div>

                <div>
                    <label for="image_url" class="font-semibold text-gray-700">Ganti Gambar Utama (Opsional)</label>
                    <img src="{{ Storage::url($post->image_url) }}" alt="Current Image" class="my-4 w-48 h-auto rounded-lg">
                    <input type="file" name="image_url" id="image_url" class="mt-2 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200">
                </div>

                <div>
                    <button type="submit" class="w-full mt-4 bg-gradient-to-r from-green-500 to-green-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg">
                        Update Artikel
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>