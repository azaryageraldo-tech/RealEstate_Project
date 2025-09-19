<footer class="bg-black text-slate-300" data-aos="fade-in" data-aos-duration="1000">
    <div class="max-w-6xl mx-auto py-16 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <div class="lg:col-span-4">
                <h3 class="text-2xl font-bold text-white mb-4">Properti<span class="text-blue-500">Kita</span></h3>
                <p class="text-slate-400 max-w-xs">
                    Platform terdepan untuk jual, beli, dan sewa properti di seluruh Indonesia.
                </p>
                <div class="flex space-x-4 mt-6">
                    <a href="#" class="text-slate-400 hover:text-white transition"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35C.582 0 0 .583 0 1.305v21.39C0 23.418.582 24 1.325 24H12.82v-9.29h-3.128V11.12h3.128V8.625c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24h-1.918c-1.504 0-1.795.715-1.795 1.763v2.31h3.587l-.467 3.58h-3.12V24h5.713c.742 0 1.325-.582 1.325-1.305V1.305C24 .583 23.418 0 22.675 0z" /></svg></a>
                    <a href="#" class="text-slate-400 hover:text-white transition"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.85s-.011 3.585-.069 4.85c-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07s-3.585-.012-4.85-.07c-3.252-.148-4.771-1.691-4.919-4.919-.058-1.265-.069-1.645-.069-4.85s.011-3.585.069-4.85c.149-3.225 1.664-4.771 4.919-4.919 1.266-.057 1.644-.069 4.85-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.358-.2 6.78-2.618 6.98-6.98.059-1.281.073-1.689.073-4.948s-.014-3.667-.072-4.947c-.2-4.358-2.618-6.78-6.98-6.98C15.667.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.88 1.44 1.44 0 000-2.88z" /></svg></a>
                    <a href="#" class="text-slate-400 hover:text-white transition"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.223.085a4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" /></svg></a>
                </div>
            </div>

            <div class="lg:col-span-8 grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="font-semibold text-white mb-4">Navigasi</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('landing') }}" class="hover:text-blue-400 transition">Beranda</a></li>
                        <li><a href="{{ route('properti.index') }}" class="hover:text-blue-400 transition">Properti</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-blue-400 transition">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-white mb-4">Perusahaan</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('about') }}" class="hover:text-blue-400 transition">Tentang Kami</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-blue-400 transition">Hubungi Kami</a></li>
                        <li><a href="{{ route('faq') }}" class="hover:text-blue-400 transition">FAQ</a></li>
                    </ul>
                </div>
                
                <div class="md:col-span-2">
                    <h3 class="font-semibold text-white mb-4">Dapatkan Info Properti Terbaru</h3>
                    <p class="mb-4 text-slate-400 text-sm">Jadilah yang pertama tahu tentang listing baru dan penawaran eksklusif.</p>
                    <form action="#">
                        <div class="flex rounded-lg shadow-sm">
                            <input type="email" placeholder="Masukkan email Anda" class="w-full bg-slate-800 border-slate-700 text-white rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-r-lg">
                                Daftar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="border-t border-slate-800 mt-12 pt-8 flex flex-col sm:flex-row justify-between items-center text-sm">
            <p class="text-slate-500 order-2 sm:order-1 mt-4 sm:mt-0">&copy; {{ date('Y') }} PropertiKita. All Rights Reserved.</p>
            <div class="order-1 sm:order-2 flex space-x-6">
                <a href="#" class="hover:text-white transition">Privacy Policy</a>
                <a href="#" class="hover:text-white transition">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>