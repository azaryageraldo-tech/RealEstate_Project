<x-agent-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Properti') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{-- Menampilkan pesan sukses setelah update status --}}
        @if (session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white p-8 rounded-xl shadow-md">
            {{-- Header Detail Properti --}}
            <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-6 pb-6 border-b">
                <div>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $property->name }}</h3>
                    <p class="mt-1 text-gray-500 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                        {{ $property->location }}
                    </p>
                </div>
                <a href="{{ route('agent.properties.edit', $property) }}" class="px-6 py-2 bg-blue-100 text-blue-700 font-semibold rounded-lg flex items-center gap-2 hover:bg-blue-200 transition whitespace-nowrap">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    <span>Edit Properti</span>
                </a>
            </div>

            {{-- Konten Utama --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-8">
                    <img src="{{ Storage::url($property->image_url) }}" alt="{{ $property->name }}" class="w-full h-auto object-cover rounded-xl shadow-lg">
                    <div>
                        <h4 class="text-2xl font-bold text-gray-800">Deskripsi</h4>
                        <p class="mt-2 text-gray-600 text-justify leading-relaxed">{{ $property->description }}</p>
                    </div>
                </div>

                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-slate-50 p-6 rounded-xl border">
                        <h4 class="text-xl font-bold text-gray-800 mb-4">Status Properti</h4>
                        <form action="{{ route('agent.properties.update', $property) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="status" class="sr-only">Ubah Status</label>
                            <select name="status" id="status" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="Tersedia" @selected($property->status == 'Tersedia')>Tersedia</option>
                                <option value="Terjual" @selected($property->status == 'Terjual')>Terjual</option>
                                <option value="Disewa" @selected($property->status == 'Disewa')>Disewa</option>
                            </select>
                            <button type="submit" class="mt-4 w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                                Update Status
                            </button>
                        </form>
                    </div>
                    <div class="bg-slate-50 p-6 rounded-xl border">
                        <h4 class="text-xl font-bold text-gray-800 mb-4">Statistik Listing</h4>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center"><span class="font-semibold text-gray-600">Total Dilihat:</span><span class="font-extrabold text-lg text-gray-800">{{ $viewCount }}</span></div>
                            <div class="flex justify-between items-center"><span class="font-semibold text-gray-600">Total Favorit:</span><span class="font-extrabold text-lg text-gray-800">{{ $favoriteCount }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-16">
            <h2 class="text-3xl font-bold text-center mb-10 text-gray-800">Properti Anda Lainnya</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($relatedProperties as $relatedProperty)
                    <div class="group bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                        <div class="relative"><a href="{{ route('agent.properties.show', $relatedProperty) }}"><img src="{{ Storage::url($relatedProperty->image_url) }}" alt="{{ $relatedProperty->name }}" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105"></a><div class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full uppercase">{{ $relatedProperty->type }}</div></div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 truncate"><a href="{{ route('agent.properties.show', $relatedProperty) }}" class="hover:text-blue-600">{{ $relatedProperty->name }}</a></h3>
                            <p class="mt-2 flex items-center gap-2 text-gray-500"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>{{ $relatedProperty->location }}</p>
                            <div class="mt-4 text-3xl font-extrabold text-blue-700">Rp {{ number_format($relatedProperty->price, 0, ',', '.') }}</div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500">Tidak ada properti serupa.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-agent-layout>