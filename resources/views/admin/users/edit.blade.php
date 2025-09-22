<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Pengguna: <span class="text-blue-600">{{ $user->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-8 rounded-xl shadow-md" data-aos="fade-up">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Update Data Pengguna</h3>
            
            <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <!-- Nama, Email, Peran -->
                <div>
                    <label for="name" class="font-semibold text-gray-700">Nama Lengkap</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg">
                </div>
                <div>
                    <label for="email" class="font-semibold text-gray-700">Alamat Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg">
                </div>
                <div>
                    <label for="role" class="font-semibold text-gray-700">Peran</label>
                    <select name="role" id="role" required class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg">
                        <option value="user" @selected(old('role', $user->role) == 'user')>User</option>
                        <option value="agent" @selected(old('role', $user->role) == 'agent')>Agent</option>
                    </select>
                </div>

                <!-- Password (Opsional) -->
                <div class="border-t pt-6">
                    <p class="font-semibold text-gray-700">Ganti Password (Opsional)</p>
                    <div class="mt-4">
                        <label for="password" class="text-sm text-gray-600">Password Baru</label>
                        <input type="password" name="password" id="password" class="mt-1 w-full px-4 py-3 bg-slate-100 border-none rounded-lg">
                    </div>
                    <div class="mt-4">
                        <label for="password_confirmation" class="text-sm text-gray-600">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 w-full px-4 py-3 bg-slate-100 border-none rounded-lg">
                    </div>
                </div>

                <!-- Tombol Update -->
                <div>
                    <button type="submit" class="w-full mt-4 bg-gradient-to-r from-green-500 to-green-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg">
                        Update Pengguna
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
