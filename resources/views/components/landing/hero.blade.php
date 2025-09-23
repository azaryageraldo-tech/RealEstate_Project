@props(['banner'])

{{-- Tentukan gambar background. Jika ada banner aktif, gunakan gambar banner. Jika tidak, gunakan gambar default. --}}
@php
    $backgroundImage = $banner ? Storage::url($banner->image_path) : 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto=format&fit=crop';
@endphp

<section
    class="relative h-[80vh] md:h-[90vh] bg-cover bg-center flex items-center"
    style="background-image: url('{{ $backgroundImage }}');">

    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

    <div class="relative z-10 w-full max-w-6xl mx-auto px-6 md:px-10 text-white">
        <div class="max-w-2xl text-left">
            <span data-aos="fade-down" class="bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-full text-sm font-semibold">
                ✨ Properti Terbaik Pilihan Anda
            </span>

            <h1 data-aos="fade-up" data-aos-delay="200" class="mt-4 text-4xl sm:text-5xl md:text-7xl font-extrabold leading-tight tracking-tight">
                Temukan Rumah, <br> Wujudkan Impian.
            </h1>

            <p data-aos="fade-up" data-aos-delay="400" class="mt-6 text-lg md:text-xl text-gray-200">
                Platform terpercaya untuk menemukan properti idaman Anda. Mulai pencarian Anda bersama kami sekarang.
            </p>

            <div data-aos="fade-up" data-aos-delay="600" class="mt-8 flex flex-wrap gap-4">
                {{-- Tombol utama sekarang dinamis. Jika banner punya link, gunakan link itu. Jika tidak, arahkan ke halaman properti. --}}
                <a href="{{ $banner->link_url ?? route('properti.index') }}"
                    class="px-8 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
                    Pelajari Lebih Lanjut
                </a>
                <a href="#" class="px-8 py-3 bg-transparent border-2 border-white/80 text-white font-bold rounded-lg hover:bg-white/10 transition-all duration-300">
                    Jual Properti
                </a>
            </div>
        </div>
    </div>
</section>