<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Halaman Baru') }}
        </h2>
    </x-slot>

    {{-- Script untuk Rich Text Editor (TinyMCE) --}}
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#content',
            plugins: 'code table lists image link fullscreen',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | image link | fullscreen',
            height: 500,
        });
    </script>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-8 rounded-xl shadow-md" data-aos="fade-up"
             x-data="{
                title: '{{ old('title') }}',
                slug: '{{ old('slug') }}',
                generateSlug() {
                    this.slug = this.title.toLowerCase().replace(/[^a-z0-9-]+/g, '-').replace(/^-+|-+$/g, '');
                }
             }">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Formulir Halaman</h3>
            
            <form action="{{ route('admin.pages.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="title" class="font-semibold text-gray-700">Judul Halaman</label>
                    <input type="text" name="title" id="title" x-model="title" @keyup="generateSlug()" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="slug" class="font-semibold text-gray-700">Slug (URL)</label>
                    <input type="text" name="slug" id="slug" x-model="slug" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('slug') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="content" class="font-semibold text-gray-700">Isi Konten</label>
                    <textarea name="content" id="content" class="mt-2 w-full">{{ old('content') }}</textarea>
                    @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <button type="submit" class="w-full mt-4 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg">
                        Simpan Halaman
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>