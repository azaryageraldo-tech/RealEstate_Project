<x-agent-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil Saya') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-8 rounded-xl shadow-md">
            @if (session('status') === 'profile-updated')
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
                    <span class="block sm:inline">Profil berhasil diperbarui.</span>
                </div>
            @endif

            <form method="post" action="{{ route('agent.profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('patch')

                <div>
                    <label for="profile_photo_path" class="font-semibold text-gray-700">Foto Profil</label>
                    <div class="mt-2 flex items-center gap-4">
                        <img src="{{ Auth::user()->profile_photo_path ? Storage::url(Auth::user()->profile_photo_path) : 'https://i.pravatar.cc/150?u='.Auth::id() }}" alt="Current Profile Photo" class="w-20 h-20 rounded-full object-cover">
                        <input type="file" name="profile_photo_path" id="profile_photo_path" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200">
                    </div>
                </div>

                <div>
                    <label for="name" class="font-semibold text-gray-700">Nama</label>
                    <input id="name" name="name" type="text" class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg" value="{{ old('name', $user->name) }}" required>
                </div>

                <div>
                    <label for="email" class="font-semibold text-gray-700">Email</label>
                    <input id="email" name="email" type="email" class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg" value="{{ old('email', $user->email) }}" required>
                </div>

                <div>
                    <label for="phone" class="font-semibold text-gray-700">Nomor Telepon (WhatsApp)</label>
                    <input id="phone" name="phone" type="text" class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg" value="{{ old('phone', $user->phone) }}">
                </div>

                <div>
                    <label for="experience" class="font-semibold text-gray-700">Pengalaman / Bio Singkat</label>
                    <textarea id="experience" name="experience" rows="5" class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg">{{ old('experience', $user->experience) }}</textarea>
                </div>

                <div>
                    <button type="submit" class="w-full mt-4 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-agent-layout>