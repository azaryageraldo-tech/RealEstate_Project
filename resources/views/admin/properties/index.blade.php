<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Properti') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md" role="alert">
                <p class="font-bold">Sukses</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="mb-8 p-6 bg-white rounded-xl shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <input type="text" placeholder="Cari nama properti..." class="w-full md:col-span-2 bg-slate-100 border-none rounded-lg focus:ring-2 focus:ring-blue-500">
                <select class="w-full bg-slate-100 border-none rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Semua Status</option>
                    <option value="Menunggu Review">Menunggu Review</option>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Terjual">Terjual</option>
                    <option value="Disewa">Disewa</option>
                </select>
                <button class="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">Filter</button>
            </div>
        </div>
        
        <div class="grid grid-cols-1 gap-8">
            @forelse($properties as $property)
                <div data-aos="fade-up" class="bg-white rounded-xl shadow-md overflow-hidden md:flex">
                    <div class="md:w-1/3">
                        <img src="{{ Storage::url($property->image_url) }}" alt="{{ $property->name }}" class="w-full h-48 md:h-full object-cover">
                    </div>

                    <div class="p-6 flex-1">
                        <div class="flex flex-col sm:flex-row justify-between sm:items-start">
                            <div>
                                <span @class(['px-2 py-1 text-xs font-semibold rounded-full uppercase', 'bg-yellow-100 text-yellow-800' => $property->status == 'Menunggu Review', 'bg-green-100 text-green-800' => $property->status == 'Tersedia', 'bg-red-100 text-red-800' => $property->status == 'Terjual', 'bg-orange-100 text-orange-800' => $property->status == 'Disewa'])>{{ $property->status }}</span>
                                <h3 class="mt-2 text-2xl font-bold text-gray-800">{{ $property->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $property->location }}</p>
                            </div>
                            
                            <div x-data="{ open: false }" @click.outside="open = false" class="relative inline-block text-left mt-4 sm:mt-0 flex-shrink-0">
                                <div>
                                    <button @click="open = !open" type="button" class="p-2 rounded-full text-gray-400 hover:text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                                    </button>
                                </div>
                                <div x-show="open" x-transition class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                                    <div class="py-1" role="menu" aria-orientation="vertical">
                                        <a href="{{ route('admin.properties.show', $property) }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            <span>Lihat Detail</span>
                                        </a>
                                        <a href="{{ route('admin.properties.edit', $property) }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                             <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                            <span>Edit</span>
                                        </a>
                                        <form action="{{ route('admin.properties.destroy', $property) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="w-full flex items-center gap-3 px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-800" role="menuitem">
                                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border-t my-4"></div>

                        <div class="flex justify-between items-center">
                            <div><p class="text-sm text-gray-500">Agen</p><p class="font-semibold text-gray-800">{{ $property->user->name ?? 'N/A' }}</p></div>
                            <div><p class="text-sm text-gray-500">Harga</p><p class="font-semibold text-gray-800">Rp {{ number_format($property->price) }}</p></div>
                            <div><p class="text-sm text-gray-500">Tanggal Listing</p><p class="font-semibold text-gray-800">{{ $property->created_at->format('d M Y') }}</p></div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-xl shadow-md p-8 text-center text-gray-500">Tidak ada properti yang ditemukan.</div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $properties->links() }}
        </div>
    </div>
</x-admin-layout>