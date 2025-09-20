<x-agent-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Properti: ') }} <span class="text-blue-600">{{ $property->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-8 rounded-xl shadow-md" data-aos="fade-up">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Update Detail Properti</h3>
            
            <form action="{{ route('agent.properties.update', $property) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT') {{-- PENTING: Method untuk update --}}
                
                <div>
                    <label for="name" class="font-semibold text-gray-700">Nama Properti</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $property->name) }}" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="location" class="font-semibold text-gray-700">Lokasi</label>
                    <input type="text" name="location" id="location" value="{{ old('location', $property->location) }}" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="price" class="font-semibold text-gray-700">Harga</label>
                        <input type="number" name="price" id="price" value="{{ old('price', $property->price) }}" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="type" class="font-semibold text-gray-700">Tipe Properti</label>
                        <select name="type" id="type" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="Rumah" @selected(old('type', $property->type) == 'Rumah')>Rumah</option>
                            <option value="Apartemen" @selected(old('type', $property->type) == 'Apartemen')>Apartemen</option>
                            <option value="Tanah" @selected(old('type', $property->type) == 'Tanah')>Tanah</option>
                            <option value="Ruko" @selected(old('type', $property->type) == 'Ruko')>Ruko</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="description" class="font-semibold text-gray-700">Deskripsi</label>
                    <textarea name="description" id="description" rows="5" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $property->description) }}</textarea>
                </div>

                <div>
                    <label for="image_url" class="font-semibold text-gray-700">Ganti Foto Utama (Opsional)</label>
                    <img src="{{ Storage::url($property->image_url) }}" alt="Current Image" class="my-4 w-48 h-auto rounded-lg">
                    <input type="file" name="image_url" id="image_url" class="mt-2 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200">
                </div>

                <div>
                    <button type="submit" class="w-full mt-4 bg-gradient-to-r from-green-500 to-green-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300">
                        Update Properti
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-agent-layout>