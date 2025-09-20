<x-agent-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard Agen') }}
            </h2>
            <a href="#" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold rounded-lg shadow-lg transform hover:scale-105 hover:from-blue-700 hover:to-blue-900 transition-all duration-300">
                Tambah Properti Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
        <!-- Kartu Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Listing Aktif -->
            <div data-aos="fade-up" class="bg-white p-6 rounded-xl shadow-md flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 uppercase">Listing Aktif</p>
                    <p class="text-4xl font-extrabold text-gray-800">12</p>
                </div>
                <div class="bg-blue-100 p-4 rounded-full">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a2 2 0 002 2h10a2 2 0 002-2V10M9 20h6"></path></svg>
                </div>
            </div>
            <!-- Total View -->
            <div data-aos="fade-up" data-aos-delay="100" class="bg-white p-6 rounded-xl shadow-md flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 uppercase">Total View Bulan Ini</p>
                    <p class="text-4xl font-extrabold text-gray-800">8,4k</p>
                </div>
                <div class="bg-green-100 p-4 rounded-full">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
            </div>
            <!-- Leads Baru -->
            <div data-aos="fade-up" data-aos-delay="200" class="bg-white p-6 rounded-xl shadow-md flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 uppercase">Leads Baru</p>
                    <p class="text-4xl font-extrabold text-gray-800">3</p>
                </div>
                <div class="bg-orange-100 p-4 rounded-full">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                </div>
            </div>
        </div>

        <!-- Tabel Properti Terbaru & Grafik -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Tabel Properti Terbaru -->
            <div data-aos="fade-up" class="lg:col-span-2 bg-white rounded-xl shadow-md">
                <h3 class="p-6 text-lg font-bold text-gray-800 border-b">Listing Properti Terbaru Anda</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50 text-sm text-gray-600">
                            <tr>
                                <th class="p-4 font-semibold">Nama Properti</th>
                                <th class="p-4 font-semibold">Status</th>
                                <th class="p-4 font-semibold">Harga</th>
                                <th class="p-4 font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $properties = [ // Data Dummy
                                    ['name' => 'Villa Modern di Canggu', 'status' => 'Aktif', 'price' => '3.2 M'],
                                    ['name' => 'Apartemen Studio di SCBD', 'status' => 'Aktif', 'price' => '1.5 M'],
                                    ['name' => 'Rumah Klasik Menteng', 'status' => 'Menunggu Review', 'price' => '15 M'],
                                    ['name' => 'Tanah Kavling di Sentul', 'status' => 'Nonaktif', 'price' => '800 Jt'],
                                ];
                            @endphp
                            @forelse($properties as $property)
                                <tr class="border-b last:border-b-0 hover:bg-slate-50">
                                    <td class="p-4 font-semibold text-gray-800">{{ $property['name'] }}</td>
                                    <td class="p-4">
                                        <span @class([
                                            'px-2 py-1 text-xs font-semibold rounded-full',
                                            'bg-green-100 text-green-800' => $property['status'] == 'Aktif',
                                            'bg-yellow-100 text-yellow-800' => $property['status'] == 'Menunggu Review',
                                            'bg-red-100 text-red-800' => $property['status'] == 'Nonaktif',
                                        ])>{{ $property['status'] }}</span>
                                    </td>
                                    <td class="p-4 text-gray-700">Rp {{ $property['price'] }}</td>
                                    <td class="p-4 flex gap-2">
                                        <a href="#" class="text-blue-600 hover:text-blue-800">Edit</a>
                                        <a href="#" class="text-red-600 hover:red-blue-800">Hapus</a>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="p-4 text-center text-gray-500">Anda belum memiliki listing.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Grafik Performa -->
            <div data-aos="fade-up" data-aos-delay="100" class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Performa Views (30 Hari)</h3>
                <div>
                    <canvas id="viewsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('viewsChart').getContext('2d');
            const viewsChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
                    datasets: [{
                        label: 'Total Views',
                        data: [1200, 1900, 3000, 2200], // Data Dummy
                        backgroundColor: 'rgba(59, 130, 246, 0.2)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true }
                    },
                    plugins: { legend: { display: false } }
                }
            });
        });
    </script>
</x-agent-layout>