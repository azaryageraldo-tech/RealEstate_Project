<x-app-layout>
    <section class="bg-slate-50 pt-32 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-right">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center"><a href="{{ route('landing') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">Beranda</a></li>
                        <li aria-current="page"><div class="flex items-center"><svg class="w-3 h-3 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg><span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Blog</span></div></li>
                    </ol>
                </nav>
                <h1 class="mt-4 text-4xl font-extrabold text-gray-900">Wawasan Terbaru Seputar Properti</h1>
            </div>
        </div>
    </section>

    <div class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($posts->count() > 0)
                @php
                    $featuredPost = $posts->shift();
                @endphp
                <section class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-20">
                    <div data-aos="fade-right" class="group rounded-xl overflow-hidden shadow-lg"><a href="{{ route('blog.show', $featuredPost->slug) }}"><img src="{{ Storage::url($featuredPost->image_url) }}" alt="{{ $featuredPost->title }}" class="w-full h-96 object-cover transition-transform duration-300 group-hover:scale-105"></a></div>
                    <div data-aos="fade-left" data-aos-delay="200">
                        <span class="text-blue-600 font-semibold text-sm">ARTIKEL TERBARU</span>
                        <h2 class="mt-2 text-3xl font-extrabold text-gray-900 leading-tight"><a href="{{ route('blog.show', $featuredPost->slug) }}" class="hover:text-blue-700 transition">{{ $featuredPost->title }}</a></h2>
                        <p class="mt-4 text-lg text-gray-600">{{ $featuredPost->excerpt }}</p>
                        <div class="mt-6"><a href="{{ route('blog.show', $featuredPost->slug) }}" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold rounded-lg shadow-lg">Baca Selengkapnya</a></div>
                    </div>
                </section>
            @endif

            @if($posts->count() > 0)
                <h2 class="text-3xl font-bold text-center mb-12">Artikel Lainnya</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $index => $post)
                        <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" class="group bg-white rounded-xl shadow-lg overflow-hidden flex flex-col"><a href="{{ route('blog.show', $post->slug) }}" class="block overflow-hidden"><img src="{{ Storage::url($post->image_url) }}" alt="{{ $post->title }}" class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-105"></a><div class="p-6 flex flex-col flex-grow"><p class="text-sm text-gray-500">{{ $post->published_at->format('d F Y') }}</p><h3 class="mt-2 text-xl font-bold text-gray-800 flex-grow"><a href="{{ route('blog.show', $post->slug) }}" class="hover:text-blue-600 transition">{{ $post->title }}</a></h3><div class="mt-4"><a href="{{ route('blog.show', $post->slug) }}" class="font-semibold text-blue-600 hover:text-blue-800">Baca Selengkapnya &rarr;</a></div></div></div>
                    @endforeach
                </div>
            @else
                @if(!isset($featuredPost))
                    <p class="col-span-3 text-center text-gray-500 py-16">Belum ada artikel yang dipublikasikan.</p>
                @endif
            @endif

            <div class="mt-16">{{ $posts->links() }}</div>
        </div>
    </div>
</x-app-layout>