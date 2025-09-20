<x-agent-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Properti Saya') }}
            </h2>
            <a href="{{ route('agent.properties.create') }}" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold rounded-lg shadow-lg transform hover:scale-105 transition-all">
                Tambah Properti
            </a>
        </div>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
        @if (session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        
        <div class="bg-white rounded-xl shadow-md" data-aos="fade-up">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 text-sm text-gray-600">
                        <tr>
                            <th class="p-4 font-semibold">Properti</th>
                            <th class="p-4 font-semibold">Status</th>
                            <th class="p-4 font-semibold">Harga</th>
                            <th class="p-4 font-semibold">Tanggal Dibuat</th>
                            <th class="p-4 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($properties as $property)
                            <tr class="border-b last:border-b-0 hover:bg-slate-50">
                                <td class="p-4">
                                    <a href="{{ route('agent.properties.show', $property) }}" class="flex items-center gap-4 group">
                                        <img src="{{ Storage::url($property->image_url) }}" alt="{{ $property->name }}" class="w-20 h-14 object-cover rounded-md">
                                        <div>
                                            <p class="font-semibold text-gray-800 group-hover:text-blue-600 transition">{{ $property->name }}</p>
                                            <p class="text-sm text-gray-500">{{ $property->location }}</p>
                                        </div>
                                    </a>
                                </td>
                                <td class="p-4">
                                    <span @class([
                                        'px-2 py-1 text-xs font-semibold rounded-full',
                                        'bg-green-100 text-green-800' => $property->status == 'Tersedia',
                                        'bg-red-100 text-red-800' => $property->status == 'Terjual',
                                        'bg-orange-100 text-orange-800' => $property->status == 'Disewa',
                                    ])>{{ $property->status }}</span>
                                </td>
                                <td class="p-4 text-gray-700 font-semibold">Rp {{ number_format($property->price) }}</td>
                                <td class="p-4 text-gray-500">{{ $property->created_at->format('d M Y') }}</td>
                                <td class="p-4">
                                    <div class="flex gap-2">
                                        {{-- Tombol Edit yang Diperbaiki --}}
                                        <a href="{{ route('agent.properties.edit', $property) }}" class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold flex items-center gap-1 hover:bg-blue-200 transition">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                            <span>Edit</span>
                                        </a>
                                        {{-- Tombol Hapus --}}
                                        <form action="{{ route('agent.properties.destroy', $property) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus properti ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold flex items-center gap-1 hover:bg-red-200 transition">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-gray-500">Anda belum memiliki listing.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t bg-slate-50 rounded-b-xl">
                {{ $properties->links() }}
            </div>
        </div>
    </div>
</x-agent-layout>