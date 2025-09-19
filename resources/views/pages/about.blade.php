@extends('layouts.app', ['title' => 'Tentang Kami'])

@section('content')
    <section class="bg-slate-50 pt-32 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-right">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center"><a href="{{ route('landing') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">Beranda</a></li>
                        <li aria-current="page"><div class="flex items-center"><svg class="w-3 h-3 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg><span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Tentang Kami</span></div></li>
                    </ol>
                </nav>
                <h1 class="mt-4 text-4xl font-extrabold text-gray-900">Mengenal PropertiKita Lebih Dekat</h1>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <span class="text-blue-600 font-semibold">Misi Kami</span>
                <h2 class="mt-2 text-3xl font-extrabold text-gray-900">Merevolusi Cara Anda Menemukan Properti</h2>
                <p class="mt-4 text-lg text-gray-600">Kami percaya setiap orang berhak mendapatkan akses yang mudah, transparan, dan terpercaya ke rumah impian mereka. PropertiKita hadir untuk menjembatani kesenjangan antara pencari properti dengan agen profesional melalui platform teknologi yang inovatif dan berpusat pada pengguna.</p>
            </div>
            <div data-aos="fade-left" data-aos-delay="200" class="h-80">
                <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=2100&auto=format&fit=crop" alt="Tim PropertiKita" class="w-full h-full object-cover rounded-xl shadow-lg">
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center" data-aos="fade-up">
                <h2 class="text-3xl font-extrabold text-gray-900">Nilai-Nilai yang Kami Pegang Teguh</h2>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">Fondasi yang memandu setiap langkah kami dalam melayani Anda.</p>
            </div>
            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div data-aos="fade-up" data-aos-delay="100" class="bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-blue-100 text-blue-600 mx-auto"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                    <h3 class="mt-6 text-xl font-bold text-gray-900">Kepercayaan</h3>
                    <p class="mt-2 text-gray-600">Setiap listing diverifikasi untuk memastikan keamanan dan kenyamanan transaksi Anda.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-blue-100 text-blue-600 mx-auto"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg></div>
                    <h3 class="mt-6 text-xl font-bold text-gray-900">Profesionalisme</h3>
                    <p class="mt-2 text-gray-600">Kami bekerja sama dengan agen-agen berlisensi dan berpengalaman di bidangnya.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="300" class="bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-blue-100 text-blue-600 mx-auto"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg></div>
                    <h3 class="mt-6 text-xl font-bold text-gray-900">Inovasi</h3>
                    <p class="mt-2 text-gray-600">Terus mengembangkan teknologi untuk mempermudah proses pencarian properti Anda.</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="bg-blue-700">
        <div class="max-w-4xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
            <h2 data-aos="zoom-in" class="text-3xl font-extrabold text-white sm:text-4xl">
                <span class="block">Siap Menemukan Properti Impian Anda?</span>
            </h2>
            <p data-aos="zoom-in" data-aos-delay="100" class="mt-4 text-lg leading-6 text-blue-200">
                Jelajahi ribuan listing kami atau hubungi agen kami untuk konsultasi gratis hari ini.
            </p>
            <a data-aos="zoom-in" data-aos-delay="200" href="{{ route('properti.index') }}" class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50 sm:w-auto">
                Lihat Semua Properti
            </a>
        </div>
    </section>
@endsection