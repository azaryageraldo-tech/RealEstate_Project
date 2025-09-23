<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Halaman: <span class="text-blue-600">{{ $page->title }}</span>
        </h2>
    </x-slot>

    {{-- Script TinyMCE sudah dihapus --}}

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-8 rounded-xl shadow-md" data-aos="fade-up">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Editor Konten</h3>
            
            <form action="{{ route('admin.pages.update', $page) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div>
                    <label for="title" class="font-semibold text-gray-700">Judul Halaman</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $page->title) }}" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <input type="hidden" name="slug" value="{{ $page->slug }}">

                <div>
                    <label for="content" class="font-semibold text-gray-700">Isi Konten (Boleh menggunakan tag HTML)</label>
                    <textarea name="content" id="content" rows="15" class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('content', $page->content) }}</textarea>
                </div>

                <div>
                    <button type="submit" class="w-full mt-4 bg-gradient-to-r from-green-500 to-green-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg">
                        Update Halaman
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>