<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tulis Artikel Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-8 rounded-xl shadow-md" data-aos="fade-up">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Detail Artikel</h3>
            
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div>
                    <label for="title" class="font-semibold text-gray-700">Judul Artikel</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="excerpt" class="font-semibold text-gray-700">Ringkasan (Excerpt)</label>
                    <textarea name="excerpt" id="excerpt" rows="3" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('excerpt') }}</textarea>
                    @error('excerpt') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="body" class="font-semibold text-gray-700">Isi Konten</label>
                    <textarea name="body" id="body" rows="10" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('body') }}</textarea>
                    @error('body') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="image_url" class="font-semibold text-gray-700">Gambar Utama (Featured Image)</label>
                    <input type="file" name="image_url" id="image_url" required class="mt-2 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200">
                    @error('image_url') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <button type="submit" class="w-full mt-4 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg">
                        Publikasikan Artikel
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>