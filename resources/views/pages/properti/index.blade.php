@extends('layouts.app', ['title' => 'Daftar Properti'])

@section('content')
    <section class="bg-slate-50 pt-32 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-right">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('landing') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                                Beranda
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Properti</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="mt-4 text-4xl font-extrabold text-gray-900">Temukan Properti Pilihan Anda</h1>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
            <p class="text-gray-600 text-sm">
                Menampilkan {{ $properties->firstItem() }}-{{ $properties->lastItem() }} dari {{ $properties->total() }} properti
            </p>
            <div>
                <label for="sort" class="sr-only">Urutkan</label>
                <select id="sort" name="sort" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                    <option selected>Urutkan: Terbaru</option>
                    <option>Harga: Tertinggi ke Terendah</option>
                    <option>Harga: Terendah ke Tertinggi</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($properties as $index => $property)
                <div data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}" class="group bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="relative">
                        <a href="{{ route('properti.show', $property) }}">
                            <img src="{{ $property->image_url }}" alt="{{ $property->name }}" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105">
                        </a>
                        <div class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full uppercase">{{ $property->type }}</div>
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 truncate">
                            <a href="{{ route('properti.show', $property) }}" class="hover:text-blue-600">{{ $property->name }}</a>
                        </h3>
                        <p class="mt-2 flex items-center gap-2 text-gray-500">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /></svg>
                            {{ $property->location }}
                        </p>
                        <div class="mt-4 text-3xl font-extrabold text-blue-700">
                            Rp {{ number_format($property->price, 0, ',', '.') }}
                        </div>
                        <div class="border-t my-4"></div>
                        <div class="flex justify-between items-center text-gray-600">
                            <span class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M9 21v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4h6z"></path></svg> {{ $property->bedrooms }} KT</span>
                            <span class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg> {{ $property->bathrooms }} KM</span>
                            <span class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg> {{ $property->surface_area }} m²</span>
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-500">Properti tidak ditemukan.</p>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $properties->links() }}
        </div>
    </div>
@endsection