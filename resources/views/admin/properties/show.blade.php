<x-admin-layout>
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
            {{-- Header Detail Properti --}}
            <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-6 pb-6 border-b">
                <div>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $property->name }}</h3>
                    <p class="mt-1 text-gray-500">{{ $property->location }}</p>
                </div>
                <a href="{{ route('admin.properties.edit', $property) }}" class="px-6 py-2 bg-blue-100 text-blue-700 font-semibold rounded-lg flex items-center gap-2 hover:bg-blue-200 transition whitespace-nowrap">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    <span>Edit Properti</span>
                </a>
            </div>

            {{-- Konten Utama --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Kolom Kiri: Gambar, Deskripsi, Info Agen -->
                <div class="lg:col-span-2 space-y-8">
                    <img src="{{ Storage::url($property->image_url) }}" alt="{{ $property->name }}" class="w-full h-auto object-cover rounded-xl shadow-lg">
                    <div>
                        <h4 class="text-2xl font-bold text-gray-800">Deskripsi</h4>
                        <p class="mt-2 text-gray-600 text-justify leading-relaxed">{{ $property->description }}</p>
                    </div>
                     <div>
                        <h4 class="text-2xl font-bold text-gray-800">Informasi Agen</h4>
                        <div class="mt-4 flex items-center bg-slate-50 p-4 rounded-lg border">
                             <img src="{{ $property->user->profile_photo_path ? Storage::url($property->user->profile_photo_path) : 'https://i.pravatar.cc/150?u='.$property->user->id }}" alt="Avatar" class="w-12 h-12 rounded-full object-cover">
                             <div class="ml-4">
                                 <p class="font-bold text-gray-800">{{ $property->user->name }}</p>
                                 <p class="text-sm text-gray-600">{{ $property->user->email }}</p>
                             </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Status & Validasi -->
                <div class="lg:col-span-1">
                    <div class="bg-slate-50 p-6 rounded-xl border sticky top-28">
                        <h4 class="text-xl font-bold text-gray-800 mb-4">Validasi Properti</h4>
                        <p class="text-sm text-gray-600 mb-4">Setujui atau ubah status listing properti ini.</p>
                        <form action="{{ route('admin.properties.update', $property) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="status" class="font-semibold text-sm text-gray-700">Status Saat Ini</label>
                            <select name="status" id="status" class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="Menunggu Review" @selected(old('status', $property->status) == 'Menunggu Review')>Menunggu Review</option>
                                <option value="Tersedia" @selected(old('status', $property->status) == 'Tersedia')>Tersedia (Setujui)</option>
                                <option value="Terjual" @selected(old('status', $property->status) == 'Terjual')>Terjual</option>
                                <option value="Disewa" @selected(old('status', $property->status) == 'Disewa')>Disewa</option>
                            </select>
                            <button type="submit" class="mt-4 w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                                Update Status
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

