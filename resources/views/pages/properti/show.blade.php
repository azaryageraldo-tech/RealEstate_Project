@extends('layouts.app', ['title' => $property->name])

@section('content')
<div class="bg-white pt-24 sm:pt-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div data-aos="fade-right">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center"><a href="{{ route('landing') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">Beranda</a></li>
                    <li><div class="flex items-center"><svg class="w-3 h-3 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg><a href="{{ route('properti.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Properti</a></div></li>
                    <li aria-current="page"><div class="flex items-center"><svg class="w-3 h-3 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg><span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 truncate max-w-[150px] sm:max-w-none">{{ $property->name }}</span></div></li>
                </ol>
            </nav>
            <h1 class="mt-4 text-4xl font-extrabold text-gray-900">{{ $property->name }}</h1>
            <p class="mt-2 flex items-center gap-2 text-gray-500 text-lg">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /></svg>
                {{ $property->location }}
            </p>
        </div>
        
        <div data-aos="fade-up" data-aos-delay="200" class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4 h-[60vh]">
            <div class="md:col-span-2 h-full"><img src="{{ $property->image_url }}" alt="{{ $property->name }}" class="w-full h-full object-cover rounded-xl shadow-md"></div>
            <div class="hidden md:grid grid-rows-2 gap-4 h-full">
                <div class="h-full"><img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?q=80&w=2071&auto=format&fit=crop" alt="Detail Properti 1" class="w-full h-full object-cover rounded-xl shadow-md"></div>
                <div class="h-full"><img src="https://images.unsplash.com/photo-1543269324-3569a64a38a7?q=80&w=2070&auto=format&fit=crop" alt="Detail Properti 2" class="w-full h-full object-cover rounded-xl shadow-md"></div>
            </div>
        </div>

        <div class="mt-12 grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
            <div class="lg:col-span-2">
                <h2 class="text-2xl font-bold text-gray-800">Spesifikasi Utama</h2>
                <div class="mt-4 grid grid-cols-2 sm:grid-cols-4 gap-4 text-center border-y py-4">
                    <div data-aos="fade-up" data-aos-delay="100"><p class="font-bold text-xl">{{ $property->bedrooms }}</p><p class="text-sm text-gray-500">Kamar Tidur</p></div>
                    <div data-aos="fade-up" data-aos-delay="200"><p class="font-bold text-xl">{{ $property->bathrooms }}</p><p class="text-sm text-gray-500">Kamar Mandi</p></div>
                    <div data-aos="fade-up" data-aos-delay="300"><p class="font-bold text-xl">{{ $property->surface_area }} <span class="text-base">m²</span></p><p class="text-sm text-gray-500">Luas Bangunan</p></div>
                    <div data-aos="fade-up" data-aos-delay="400"><p class="font-bold text-xl">{{ $property->type }}</p><p class="text-sm text-gray-500">Tipe Properti</p></div>
                </div>

                <h2 class="text-2xl font-bold text-gray-800 mt-8">Deskripsi</h2>
                <div data-aos="fade-up" class="mt-4 prose max-w-none text-gray-600 leading-relaxed text-justify">
                    <p>{{ $property->description }}</p>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div data-aos="fade-left" data-aos-delay="500" class="bg-slate-50 p-6 rounded-xl shadow-lg sticky top-28">
                    <p class="text-gray-600">Harga Mulai</p>
                    <p class="text-4xl font-extrabold text-blue-700">Rp {{ number_format($property->price, 0, ',', '.') }}</p>
                    <div class="mt-6 border-t pt-6">
                        @auth
                            <h3 class="font-bold text-lg mb-4 text-gray-800">Hubungi Agen</h3>
                            <div class="flex items-center space-x-4">
                                <img class="w-14 h-14 rounded-full" src="https://i.pravatar.cc/150?u=johndoe" alt="John Doe">
                                <div>
                                    <p class="font-bold text-gray-900">John Doe</p>
                                    <p class="text-sm text-gray-500">Agen Properti</p>
                                </div>
                            </div>
                             <button class="mt-6 w-full bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg transform hover:scale-105 hover:from-blue-700 hover:to-blue-900 transition-all duration-300">
                                Jadwalkan Kunjungan
                            </button>
                        @endauth
                        @guest
                            <div class="bg-blue-100/50 border border-blue-200 text-blue-800 p-4 rounded-lg" role="alert">
                                <p class="font-bold mb-2">Lihat Informasi Agen</p>
                                <p class="text-sm">Untuk melihat detail kontak agen dan menjadwalkan kunjungan, silakan login atau daftar terlebih dahulu.</p>
                                <div class="mt-4 flex gap-4">
                                    <a href="{{ route('login') }}" class="w-full text-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">Login</a>
                                    <a href="{{ route('register') }}" class="w-full text-center px-4 py-2 bg-transparent border border-blue-600 text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition">Daftar</a>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-slate-50 mt-20 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-10">Properti Serupa Lainnya</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($relatedProperties as $relatedProperty)
                    {{-- Kita menggunakan komponen yang sama persis dengan halaman listing --}}
                    <div class="group bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                        <div class="relative"><a href="{{ route('properti.show', $relatedProperty) }}"><img src="{{ $relatedProperty->image_url }}" alt="{{ $relatedProperty->name }}" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105"></a><div class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full uppercase">{{ $relatedProperty->type }}</div></div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 truncate"><a href="{{ route('properti.show', $relatedProperty) }}" class="hover:text-blue-600">{{ $relatedProperty->name }}</a></h3>
                            <p class="mt-2 flex items-center gap-2 text-gray-500"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>{{ $relatedProperty->location }}</p>
                            <div class="mt-4 text-3xl font-extrabold text-blue-700">Rp {{ number_format($relatedProperty->price, 0, ',', '.') }}</div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500">Tidak ada properti serupa.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection