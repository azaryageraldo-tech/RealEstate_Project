<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Banner Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-8 rounded-xl shadow-md">
            <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div>
                    <label for="title" class="font-semibold text-gray-700">Judul Banner</label>
                    <p class="text-sm text-gray-500">Judul ini hanya untuk referensi Anda di panel admin.</p>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label for="link_url" class="font-semibold text-gray-700">Link URL (Opsional)</label>
                    <p class="text-sm text-gray-500">URL tujuan saat banner di-klik. Kosongkan jika tidak ada.</p>
                    <input type="url" name="link_url" id="link_url" value="{{ old('link_url') }}" placeholder="https://..." class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="image_path" class="font-semibold text-gray-700">File Gambar Banner</label>
                    <p class="text-sm text-gray-500">Rekomendasi ukuran: 1920x1080 piksel.</p>
                    <input type="file" name="image_path" id="image_path" required class="mt-2 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200">
                    @error('image_path') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="is_active" class="ml-2 block text-sm text-gray-900">Aktifkan banner ini?</label>
                </div>

                <div>
                    <button type="submit" class="w-full mt-4 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg">
                        Simpan Banner
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>