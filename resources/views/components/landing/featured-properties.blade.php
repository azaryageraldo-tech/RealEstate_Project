@php
// Data dummy untuk properti. Nantinya ini akan datang dari controller.
$properties = [
    [
        'image' => 'https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=2070&auto-format&fit=crop',
        'type' => 'Dijual',
        'name' => 'Rumah Mewah di Pondok Indah',
        'location' => 'Jakarta Selatan',
        'price' => '3.5 M',
        'beds' => 4,
        'baths' => 3,
        'area' => 300,
    ],
    [
        'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto-format&fit=crop',
        'type' => 'Disewa',
        'name' => 'Apartemen Modern Sudirman',
        'location' => 'Jakarta Pusat',
        'price' => '120 Jt/thn',
        'beds' => 2,
        'baths' => 1,
        'area' => 80,
    ],
    [
        'image' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=2070&auto-format&fit=crop',
        'type' => 'Dijual',
        'name' => 'Villa Klasik di Sentul',
        'location' => 'Bogor, Jawa Barat',
        'price' => '2.8 M',
        'beds' => 5,
        'baths' => 4,
        'area' => 450,
    ],
];
@endphp

<section class="bg-slate-50 py-20 sm:py-24">
    <div class="max-w-6xl mx-auto px-4">
        
        <div data-aos="fade-up" class="text-center">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">Properti Pilihan Untuk Anda</h2>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">Jelajahi listing properti terbaik yang telah kami kurasi khusus untuk memenuhi kebutuhan Anda.</p>
        </div>

        <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @foreach ($properties as $index => $property)
                <div data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}" class="group bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="relative">
                        <img src="{{ $property['image'] }}" alt="{{ $property['name'] }}" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105">
                        <div class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full uppercase">{{ $property['type'] }}</div>
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 truncate">{{ $property['name'] }}</h3>
                        
                        <p class="mt-2 flex items-center gap-2 text-gray-500">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /></svg>
                            {{ $property['location'] }}
                        </p>
                        
                        <div class="mt-4 text-3xl font-extrabold text-blue-700">
                            Rp {{ $property['price'] }}
                        </div>
                        
                        <div class="border-t my-4"></div>
                        
                        <div class="flex justify-between items-center text-gray-600">
                            <span class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M9 21v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4h6z"></path></svg> {{ $property['beds'] }} KT</span>
                            <span class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg> {{ $property['baths'] }} KM</span>
                            <span class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg> {{ $property['area'] }} m²</span>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        
        <div class="mt-16 text-center">
            <a href="{{ route('properti.index') }}" class="px-8 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
                Lihat Semua Properti
            </a>
        </div>
    </div>
</section>