<x-agent-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Properti') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{-- Menampilkan pesan sukses setelah update --}}
        @if (session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white p-8 rounded-xl shadow-md">
            <h3 class="text-3xl font-bold text-gray-800">{{ $property->name }}</h3>
            <p class="mt-1 text-gray-500">{{ $property->location }}</p>

            <div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-6">
                    <img src="{{ Storage::url($property->image_url) }}" alt="{{ $property->name }}" class="w-full h-auto object-cover rounded-xl shadow-lg">
                    <div>
                        <h4 class="text-xl font-bold text-gray-800">Deskripsi</h4>
                        <p class="mt-2 text-gray-600 text-justify">{{ $property->description }}</p>
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
                        <div class="space-y-2">
                            <p><strong>Total Views:</strong> 8,421 (dummy)</p>
                            <p><strong>Leads Bulan Ini:</strong> 15 (dummy)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-agent-layout>