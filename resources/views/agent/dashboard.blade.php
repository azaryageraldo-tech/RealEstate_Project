<x-agent-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">
            <div>
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    Selamat Datang, {{ Auth::user()->name }}!
                </h2>
                <p class="text-sm text-gray-500 mt-1">Berikut adalah ringkasan performa properti Anda.</p>
            </div>
            <a href="{{ route('agent.properties.create') }}" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold rounded-lg shadow-lg transform hover:scale-105 transition-all whitespace-nowrap">
                + Tambah Properti Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div data-aos="fade-up" class="bg-white p-6 rounded-xl shadow-md flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-semibold">Listing Aktif</p>
                    <p class="text-4xl font-extrabold text-gray-800">{{ $activeListingsCount }}</p>
                </div>
                <div class="bg-blue-100 p-4 rounded-full">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-delay="100" class="bg-white p-6 rounded-xl shadow-md flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-semibold">Total View</p>
                    <p class="text-4xl font-extrabold text-gray-800">{{ number_format($totalViews) }}</p>
                </div>
                <div class="bg-green-100 p-4 rounded-full">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-delay="200" class="bg-white p-6 rounded-xl shadow-md flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-semibold">Leads Baru</p>
                    <p class="text-4xl font-extrabold text-gray-800">{{ $newLeadsCount }}</p>
                </div>
                <div class="bg-orange-100 p-4 rounded-full">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                </div>
            </div>
        </div>

        <div data-aos="fade-up" class="bg-white rounded-xl shadow-md">
            <h3 class="p-6 text-lg font-bold text-gray-800 border-b">Listing Properti Terbaru Anda</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 text-sm text-gray-600 uppercase">
                        <tr>
                            <th class="p-4 font-semibold">Nama Properti</th>
                            <th class="p-4 font-semibold">Status</th>
                            <th class="p-4 font-semibold">Harga</th>
                            <th class="p-4 font-semibold">Views</th>
                            <th class="p-4 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentProperties as $property)
                            <tr class="border-b last:border-b-0 hover:bg-slate-50">
                                <td class="p-4"><a href="{{ route('agent.properties.show', $property) }}" class="font-semibold text-gray-800 hover:text-blue-600">{{ $property->name }}</a></td>
                                <td class="p-4"><span @class(['px-2 py-1 text-xs font-semibold rounded-full', 'bg-green-100 text-green-800' => $property->status == 'Tersedia', 'bg-red-100 text-red-800' => $property->status == 'Terjual', 'bg-orange-100 text-orange-800' => $property->status == 'Disewa'])>{{ $property->status }}</span></td>
                                <td class="p-4 text-gray-700">Rp {{ number_format($property->price) }}</td>
                                <td class="p-4 text-gray-700 font-semibold">{{ $property->views()->count() }}</td>
                                <td class="p-4"><a href="{{ route('agent.properties.edit', $property) }}" class="font-semibold text-blue-600 hover:text-blue-800">Detail & Edit</a></td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="p-8 text-center text-gray-500">Anda belum memiliki listing properti.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-agent-layout>