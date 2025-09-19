@extends('layouts.app', ['title' => $post->title])

@section('content')
    <section class="bg-slate-50 pt-32 pb-12 text-center">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up">
                <nav class="flex justify-center" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center"><a href="{{ route('landing') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">Beranda</a></li>
                        <li><div class="flex items-center"><svg class="w-3 h-3 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg><a href="{{ route('blog.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Blog</a></div></li>
                    </ol>
                </nav>
                <h1 class="mt-4 text-4xl font-extrabold text-gray-900 leading-tight">{{ $post->title }}</h1>
                <p class="mt-4 text-gray-500">
                    <span>Oleh <span class="font-semibold text-gray-800">Tim PropertiKita</span></span> &bull;
                    <span>Dipublikasikan pada {{ $post->published_at->format('d F Y') }}</span>
                </p>
            </div>
        </div>
    </section>

    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8">
                <div class="hidden lg:block lg:col-span-1">
                    <div class="sticky top-28 text-center space-y-4">
                        <p class="text-xs font-semibold uppercase text-gray-500">Share</p>
                        <a href="#" class="block text-gray-400 hover:text-blue-600"><svg class="w-6 h-6 mx-auto" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.223.085a4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" /></svg></a>
                        <a href="#" class="block text-gray-400 hover:text-blue-600"><svg class="w-6 h-6 mx-auto" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35C.582 0 0 .583 0 1.305v21.39C0 23.418.582 24 1.325 24H12.82v-9.29h-3.128V11.12h3.128V8.625c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24h-1.918c-1.504 0-1.795.715-1.795 1.763v2.31h3.587l-.467 3.58h-3.12V24h5.713c.742 0 1.325-.582 1.325-1.305V1.305C24 .583 23.418 0 22.675 0z" /></svg></a>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-8">
                    <img data-aos="zoom-in" data-aos-duration="1000" src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-auto object-cover rounded-xl shadow-xl mb-12">
                    
                    <article data-aos="fade-up" class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                        {!! nl2br(e($post->body)) !!}
                    </article>

                    <div class="mt-16 flex items-center bg-slate-50 p-6 rounded-xl">
                        <img class="w-16 h-16 rounded-full" src="https://i.pravatar.cc/150?u=tim" alt="Tim PropertiKita">
                        <div class="ml-4">
                            <p class="font-bold text-gray-800">Tim PropertiKita</p>
                            <p class="text-sm text-gray-600">Tim editorial kami terdiri dari para ahli di bidang real estate yang berdedikasi untuk memberikan informasi akurat dan bermanfaat bagi Anda.</p>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:block lg:col-span-3"></div>
            </div>
        </div>
    </div>

    <div class="bg-slate-50 mt-12 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-10">Baca Artikel Lainnya</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($otherPosts as $otherPost)
                    <div class="group bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 flex flex-col">
                        <a href="{{ route('blog.show', $otherPost->slug) }}" class="block overflow-hidden"><img src="{{ $otherPost->image_url }}" alt="{{ $otherPost->title }}" class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-105"></a>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="mt-2 text-xl font-bold text-gray-800 flex-grow"><a href="{{ route('blog.show', $otherPost->slug) }}" class="hover:text-blue-600 transition">{{ $otherPost->title }}</a></h3>
                            <div class="mt-4"><a href="{{ route('blog.show', $otherPost->slug) }}" class="font-semibold text-blue-600 hover:text-blue-800">Baca Selengkapnya &rarr;</a></div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500">Tidak ada artikel lainnya.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection