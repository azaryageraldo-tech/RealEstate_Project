@extends('layouts.app', ['title' => 'Hubungi Kami'])

@section('content')
    <section class="bg-slate-50 pt-32 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-right">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center"><a href="{{ route('landing') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">Beranda</a></li>
                        <li aria-current="page"><div class="flex items-center"><svg class="w-3 h-3 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg><span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Hubungi Kami</span></div></li>
                    </ol>
                </nav>
                <h1 class="mt-4 text-4xl font-extrabold text-gray-900">Get in Touch</h1>
                <p class="mt-2 text-lg text-gray-600">Kami siap membantu mewujudkan properti impian Anda. Hubungi kami melalui form di bawah ini atau kunjungi kantor kami.</p>
            </div>
        </div>
    </section>

    <section class="bg-slate-50 pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <div data-aos="fade-right" class="bg-slate-900 p-8 sm:p-12 text-white">
                        <h2 class="text-3xl font-bold mb-8">Informasi Kontak</h2>
                        <div class="space-y-8">
                            <div class="flex items-start gap-4">
                                <div class="bg-slate-800 p-3 rounded-lg"><svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg></div>
                                <div>
                                    <h3 class="font-semibold text-lg">Alamat Kantor</h3>
                                    <p class="text-slate-400">Gedung PropertiKita, Jl. Jenderal Sudirman Kav. 5, Jakarta Pusat</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="bg-slate-800 p-3 rounded-lg"><svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg></div>
                                <div>
                                    <h3 class="font-semibold text-lg">Telepon</h3>
                                    <p class="text-slate-400">(021) 123-4567</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="bg-slate-800 p-3 rounded-lg"><svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg></div>
                                <div>
                                    <h3 class="font-semibold text-lg">Email</h3>
                                    <p class="text-slate-400">contact@propertikita.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-12 rounded-xl overflow-hidden h-64"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.52901984242!2d106.82194931476902!3d-6.193635995516086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f418a9e706c5%3A0x2984920215712163!2sPlaza%20Indonesia!5e0!3m2!1sen!2sid!4v1675865181754!5m2!1sen!2sid" class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                    </div>

                    <div data-aos="fade-left" class="p-8 sm:p-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-8">Kirim Pesan</h2>
                        <form action="#" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label for="name" class="font-semibold text-gray-700">Nama Lengkap</label>
                                <input type="text" name="name" id="name" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                            </div>
                             <div>
                                <label for="email" class="font-semibold text-gray-700">Alamat Email</label>
                                <input type="email" name="email" id="email" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                            </div>
                            <div>
                                <label for="message" class="font-semibold text-gray-700">Pesan</label>
                                <textarea name="message" id="message" rows="5" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="w-full mt-4 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg transform hover:scale-105 hover:from-blue-700 hover:to-blue-900 transition-all duration-300 flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                    <span>Kirim Pesan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection