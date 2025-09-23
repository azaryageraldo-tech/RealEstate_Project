<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Banner: <span class="text-blue-600">{{ $banner->title }}</span>
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-8 rounded-xl shadow-md">
            <form action="{{ route('admin.banners.update', $banner) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div>
                    <label for="title" class="font-semibold text-gray-700">Judul Banner</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $banner->title) }}" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg">
                </div>
                
                <div>
                    <label for="link_url" class="font-semibold text-gray-700">Link URL (Opsional)</label>
                    <input type="url" name="link_url" id="link_url" value="{{ old('link_url', $banner->link_url) }}" placeholder="https://..." class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg">
                </div>

                <div>
                    <label for="image_path" class="font-semibold text-gray-700">Ganti Gambar Banner (Opsional)</label>
                    <img src="{{ Storage::url($banner->image_path) }}" alt="Current Banner" class="my-4 w-48 h-auto rounded-lg">
                    <input type="file" name="image_path" id="image_path" class="mt-2 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" @checked(old('is_active', $banner->is_active)) class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="is_active" class="ml-2 block text-sm text-gray-900">Aktifkan banner ini?</label>
                </div>

                <div>
                    <button type="submit" class="w-full mt-4 bg-gradient-to-r from-green-500 to-green-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg">
                        Update Banner
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>