<x-agent-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Properti Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-8 rounded-xl shadow-md" data-aos="fade-up">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Detail Properti</h3>
            
            {{-- Tampilkan error validasi jika ada --}}
            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Oops!</strong>
                    <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
                    <ul class="mt-3 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- PENTING: enctype untuk upload file --}}
            <form action="{{ route('agent.properties.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div>
                    <label for="name" class="font-semibold text-gray-700">Nama Properti</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="location" class="font-semibold text-gray-700">Lokasi</label>
                    <input type="text" name="location" id="location" value="{{ old('location') }}" required placeholder="cth: Jakarta Selatan" class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="price" class="font-semibold text-gray-700">Harga</label>
                        <input type="number" name="price" id="price" value="{{ old('price') }}" required placeholder="cth: 3500000000" class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="type" class="font-semibold text-gray-700">Tipe Properti</label>
                        <select name="type" id="type" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="Rumah">Rumah</option>
                            <option value="Apartemen">Apartemen</option>
                            <option value="Tanah">Tanah</option>
                            <option value="Ruko">Ruko</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="bedrooms" class="font-semibold text-gray-700">Kamar Tidur</label>
                        <input type="number" name="bedrooms" id="bedrooms" value="{{ old('bedrooms') }}" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="bathrooms" class="font-semibold text-gray-700">Kamar Mandi</label>
                        <input type="number" name="bathrooms" id="bathrooms" value="{{ old('bathrooms') }}" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="surface_area" class="font-semibold text-gray-700">Luas (m²)</label>
                        <input type="number" name="surface_area" id="surface_area" value="{{ old('surface_area') }}" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div>
                    <label for="description" class="font-semibold text-gray-700">Deskripsi</label>
                    <textarea name="description" id="description" rows="5" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label for="image_url" class="font-semibold text-gray-700">Foto Utama</label>
                    <input type="file" name="image_url" id="image_url" required class="mt-2 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200">
                </div>

                <div>
                    <button type="submit" class="w-full mt-4 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg transform hover:scale-105 hover:from-blue-700 hover:to-blue-900 transition-all duration-300">
                        Simpan Properti
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-agent-layout>