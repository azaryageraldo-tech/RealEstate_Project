<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Halaman Statis') }}
            </h2>
            {{-- TOMBOL BARU DITAMBAHKAN DI SINI --}}
            <a href="{{ route('admin.pages.create') }}" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold rounded-lg shadow-lg">
                + Tambah Halaman
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

        <div class="bg-white rounded-xl shadow-md p-6" data-aos="fade-up">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Daftar Halaman</h3>
            <div class="space-y-4">
                @forelse ($pages as $page)
                    <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg border hover:shadow-sm transition">
                        <div class="flex items-center gap-4">
                            <div class="bg-blue-100 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800">{{ $page->title }}</p>
                                <p class="text-sm text-gray-500">Slug: `{{ $page->slug }}`</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.pages.edit', $page) }}" class="px-4 py-2 bg-blue-600 text-white font-semibold text-sm rounded-lg hover:bg-blue-700 transition">
                            Edit Konten
                        </a>
                    </div>
                @empty
                    <p class="text-center text-gray-500">Tidak ada halaman yang ditemukan.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-admin-layout>