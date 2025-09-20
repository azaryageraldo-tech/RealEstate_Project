@php
// Ini akan mengambil nama route yang sedang aktif
$routeName = request()->route()->getName();
@endphp

<aside class="w-64 bg-slate-800 text-white flex flex-col flex-shrink-0">
    <div class="h-20 flex items-center px-6 bg-slate-900">
        <a href="{{ route('agent.dashboard') }}" class="flex items-center gap-3">
            <div class="bg-blue-600 p-2 rounded-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
            <span class="text-xl font-bold text-white tracking-wide">
                Agen<span class="text-blue-400">Panel</span>
            </span>
        </a>
    </div>

    <nav class="mt-8 flex-grow">
        {{-- Link Dashboard --}}
        <a href="{{ route('agent.dashboard') }}" @class([
            'flex items-center gap-4 px-6 py-4 transition',
            'bg-blue-600 text-white' => $routeName == 'agent.dashboard',
            'text-slate-400 hover:bg-slate-700 hover:text-white' => $routeName != 'agent.dashboard'
        ])>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            <span>Dashboard</span>
        </a>
        
        {{-- Link Properti Saya --}}
        <a href="{{ route('agent.properties.index') }}" @class([
            'flex items-center gap-4 px-6 py-4 transition',
            'bg-blue-600 text-white' => str_contains($routeName, 'agent.properties'),
            'text-slate-400 hover:bg-slate-700 hover:text-white' => !str_contains($routeName, 'agent.properties')
        ])>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            <span>Properti Saya</span>
        </a>
        
        {{-- TAMBAHKAN BLOK INI untuk menu Profil Saya --}}
        <a href="{{ route('agent.profile.edit') }}" @class([
            'flex items-center gap-4 px-6 py-4 transition',
            'bg-blue-600 text-white' => $routeName == 'agent.profile.edit',
            'text-slate-400 hover:bg-slate-700 hover:text-white' => $routeName != 'agent.profile.edit'
        ])>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            <span>Profil Saya</span>
        </a>

        {{-- Link "Tambah Properti" telah dihapus dari sini --}}
    </nav>

    <div class="p-6 border-t border-slate-700">
        {{-- Link ini tetap ada sebagai akses cepat --}}
        <a href="{{ route('agent.profile.edit') }}" class="flex items-center gap-4 group">
            <img class="w-10 h-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_path ? Storage::url(Auth::user()->profile_photo_path) : 'https://i.pravatar.cc/150?u='.Auth::id() }}" alt="Avatar">
            <div class="flex-grow">
                <p class="font-semibold text-white group-hover:text-blue-400 transition">{{ Auth::user()->name }}</p>
                <p class="text-sm text-slate-400">Lihat Profil</p>
            </div>
        </a>
        
        <form method="POST" action="{{ route('logout') }}" class="mt-6">
            @csrf
            <button type="submit" class="w-full flex items-center gap-4 px-4 py-3 bg-red-600/20 text-red-400 rounded-lg hover:bg-red-600 hover:text-white transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>