<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manajemen Banner') }}
            </h2>
            <a href="{{ route('admin.banners.create') }}" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold rounded-lg shadow-lg">
                + Tambah Banner Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-md">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 text-sm text-gray-600 uppercase">
                        <tr>
                            <th class="p-4 font-semibold">Gambar</th>
                            <th class="p-4 font-semibold">Judul</th>
                            <th class="p-4 font-semibold">Link</th>
                            <th class="p-4 font-semibold">Status</th>
                            <th class="p-4 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($banners as $banner)
                            <tr class="border-b last:border-b-0 hover:bg-slate-50">
                                <td class="p-4">
                                    <img src="{{ Storage::url($banner->image_path) }}" alt="{{ $banner->title }}" class="w-40 h-20 object-cover rounded-md">
                                </td>
                                <td class="p-4 font-semibold text-gray-800">{{ $banner->title }}</td>
                                <td class="p-4 text-blue-600 hover:underline">
                                    <a href="{{ $banner->link_url }}" target="_blank">{{ Str::limit($banner->link_url, 30) }}</a>
                                </td>
                                <td class="p-4">
                                    <span @class([
                                        'px-2 py-1 text-xs font-semibold rounded-full',
                                        'bg-green-100 text-green-800' => $banner->is_active,
                                        'bg-gray-100 text-gray-800' => !$banner->is_active,
                                    ])>{{ $banner->is_active ? 'Aktif' : 'Tidak Aktif' }}</span>
                                </td>
                                <td class="p-4 text-center">
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('admin.banners.edit', $banner) }}" class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">Edit</a>
                                        <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="p-8 text-center text-gray-500">Belum ada banner.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t bg-slate-50 rounded-b-xl">
                {{ $banners->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>