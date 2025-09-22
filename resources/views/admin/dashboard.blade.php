<x-admin-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">
            <div>
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    Ringkasan Website
                </h2>
                <p class="text-sm text-gray-500 mt-1">Selamat Datang kembali, {{ Auth::user()->name }}!</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
        <!-- Kartu Statistik Utama -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Listing -->
            <div data-aos="fade-up" class="bg-white p-6 rounded-xl shadow-md flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-semibold">Total Listing</p>
                    <p class="text-4xl font-extrabold text-gray-800">{{ $totalListings }}</p>
                </div>
                <div class="bg-blue-100 p-4 rounded-full">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
            </div>
            <!-- Properti Terjual -->
            <div data-aos="fade-up" data-aos-delay="100" class="bg-white p-6 rounded-xl shadow-md flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-semibold">Properti Terjual</p>
                    <p class="text-4xl font-extrabold text-gray-800">{{ $soldListings }}</p>
                </div>
                <div class="bg-green-100 p-4 rounded-full">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <!-- Total Pengguna -->
            <div data-aos="fade-up" data-aos-delay="200" class="bg-white p-6 rounded-xl shadow-md flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-semibold">Total Pengguna</p>
                    <p class="text-4xl font-extrabold text-gray-800">{{ $totalUsers }}</p>
                </div>
                <div class="bg-orange-100 p-4 rounded-full">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
            </div>
            <!-- Total Traffic -->
            <div data-aos="fade-up" data-aos-delay="300" class="bg-white p-6 rounded-xl shadow-md flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-semibold">Total Traffic</p>
                    <p class="text-4xl font-extrabold text-gray-800">{{ number_format($totalViews) }}</p>
                </div>
                <div class="bg-indigo-100 p-4 rounded-full">
                     <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
            </div>
        </div>

        <!-- Grafik & Tabel Terbaru -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Grafik Traffic -->
            <div data-aos="fade-up" class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Grafik Traffic Website (30 Hari)</h3>
                <div><canvas id="trafficChart"></canvas></div>
            </div>

            <!-- Aktivitas Pengguna Terbaru -->
            <div data-aos="fade-up" data-aos-delay="100" class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Pengguna Baru</h3>
                <ul class="space-y-4">
                    @forelse($recentUsers as $user)
                        <li class="flex items-center gap-4">
                            <img src="https://i.pravatar.cc/150?u={{ $user->id }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full object-cover">
                            <div>
                                <p class="font-semibold text-gray-800">{{ $user->name }}</p>
                                <p class="text-sm text-gray-500">{{ $user->created_at->diffForHumans() }}</p>
                            </div>
                        </li>
                    @empty
                        <li class="text-center text-gray-500">Tidak ada pengguna baru.</li>
                    @endforelse
                </ul>
            </div>
        </div>
        
        <!-- Tabel Properti Terbaru -->
        <div data-aos="fade-up" class="bg-white rounded-xl shadow-md">
            <h3 class="p-6 text-lg font-bold text-gray-800 border-b">Listing Properti Terbaru</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 text-sm text-gray-600 uppercase">
                        <tr>
                            <th class="p-4 font-semibold">Nama Properti</th>
                            <th class="p-4 font-semibold">Agen</th>
                            <th class="p-4 font-semibold">Status</th>
                            <th class="p-4 font-semibold">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentProperties as $property)
                            <tr class="border-b last:border-b-0 hover:bg-slate-50">
                                <td class="p-4"><p class="font-semibold text-gray-800">{{ $property->name }}</p></td>
                                <td class="p-4 text-gray-700">{{ $property->user->name ?? 'N/A' }}</td>
                                <td class="p-4"><span @class(['px-2 py-1 text-xs font-semibold rounded-full', 'bg-green-100 text-green-800' => $property->status == 'Tersedia', 'bg-red-100 text-red-800' => $property->status == 'Terjual', 'bg-orange-100 text-orange-800' => $property->status == 'Disewa'])>{{ $property->status }}</span></td>
                                <td class="p-4 text-gray-700 font-semibold">Rp {{ number_format($property->price) }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="p-8 text-center text-gray-500">Belum ada listing properti.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Script untuk Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('trafficChart').getContext('2d');
            const trafficChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
                    datasets: [{
                        label: 'Total Views',
                        data: [1250, 1980, 3100, 2400], // Data Dummy untuk grafik
                        backgroundColor: 'rgba(59, 130, 246, 0.2)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 2, tension: 0.4, fill: true
                    }]
                },
                options: {
                    responsive: true,
                    scales: { y: { beginAtZero: true } },
                    plugins: { legend: { display: false } }
                }
            });
        });
    </script>
</x-admin-layout>
