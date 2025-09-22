<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manajemen Pengguna') }}
            </h2>
            <a href="{{ route('admin.users.create') }}" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold rounded-lg shadow-lg transform hover:scale-105 transition-all">
                + Tambah Pengguna Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{-- Pesan Sukses --}}
        @if (session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        
        <div class="bg-white rounded-xl shadow-md" data-aos="fade-up">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 text-sm text-gray-600 uppercase">
                        <tr>
                            <th class="p-4 font-semibold">Nama</th>
                            <th class="p-4 font-semibold">Email</th>
                            <th class="p-4 font-semibold">Peran</th>
                            <th class="p-4 font-semibold">Tanggal Bergabung</th>
                            <th class="p-4 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr class="border-b last:border-b-0 hover:bg-slate-50">
                                <td class="p-4">
                                    <div class="flex items-center gap-4">
                                        <img src="https://i.pravatar.cc/150?u={{ $user->id }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full object-cover">
                                        <p class="font-semibold text-gray-800">{{ $user->name }}</p>
                                    </div>
                                </td>
                                <td class="p-4 text-gray-700">{{ $user->email }}</td>
                                <td class="p-4">
                                    <span @class([
                                        'px-2 py-1 text-xs font-semibold rounded-full uppercase',
                                        'bg-blue-100 text-blue-800' => $user->role == 'agent',
                                        'bg-gray-100 text-gray-800' => $user->role == 'user',
                                    ])>{{ $user->role }}</span>
                                </td>
                                <td class="p-4 text-gray-500">{{ $user->created_at->format('d M Y') }}</td>
                                <td class="p-4">
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('admin.users.edit', $user) }}" class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold flex items-center gap-1 hover:bg-blue-200 transition">
                                            <span>Edit</span>
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold flex items-center gap-1 hover:bg-red-200 transition">
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="p-8 text-center text-gray-500">Tidak ada pengguna yang ditemukan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t bg-slate-50 rounded-b-xl">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>

