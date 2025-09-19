<section class="relative px-4 -mt-12 md:-mt-16 z-20">
    <div
        data-aos="fade-up" data-aos-delay="700"
        class="max-w-6xl mx-auto bg-white/80 backdrop-blur-md p-6 sm:p-8 rounded-xl shadow-2xl">

        <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6">Cari Properti Ideal Anda</h2>

        <form action="#" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 items-end">
            
            <div>
                <label for="lokasi" class="block text-sm font-semibold text-gray-600 mb-2">Lokasi</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <input type="text" id="lokasi" name="lokasi" placeholder="cth: Jakarta Selatan"
                        class="w-full pl-10 pr-4 py-3 bg-gray-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                </div>
            </div>

            <div>
                <label for="tipe" class="block text-sm font-semibold text-gray-600 mb-2">Tipe Properti</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a2 2 0 002 2h10a2 2 0 002-2V10M9 20h6"></path></svg>
                    </div>
                    <select id="tipe" name="tipe"
                        class="w-full pl-10 pr-4 py-3 bg-gray-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none transition">
                        <option>Rumah</option>
                        <option>Apartemen</option>
                        <option>Tanah</option>
                        <option>Ruko</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="harga" class="block text-sm font-semibold text-gray-600 mb-2">Rentang Harga</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v.01"></path></svg>
                    </div>
                    <select id="harga" name="harga"
                        class="w-full pl-10 pr-4 py-3 bg-gray-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none transition">
                        <option>Semua Harga</option>
                        <option>Rp 500 Jt - 1 M</option>
                        <option>Rp 1 M - 3 M</option>
                        <option>> Rp 3 M</option>
                    </select>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg transform hover:scale-105 hover:from-blue-700 hover:to-blue-900 transition-all duration-300 flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span>Cari</span>
            </button>
        </form>
    </div>
</section>