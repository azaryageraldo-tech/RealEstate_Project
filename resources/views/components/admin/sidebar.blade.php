@php
// Ini akan mengambil nama route yang sedang aktif
$routeName = request()->route()->getName();
@endphp

<aside class="w-64 bg-slate-800 text-white flex flex-col flex-shrink-0">
    <div class="h-20 flex items-center px-6 bg-slate-900">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
            <div class="bg-blue-600 p-2 rounded-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.096 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <span class="text-xl font-bold text-white tracking-wide">
                Admin<span class="text-blue-400">Panel</span>
            </span>
        </a>
    </div>

    <nav class="mt-8 flex-grow">
        {{-- Link Dashboard --}}
        <a href="{{ route('admin.dashboard') }}" @class([
            'flex items-center gap-4 px-6 py-4 transition',
            'bg-blue-600 text-white' => $routeName == 'admin.dashboard',
            'text-slate-400 hover:bg-slate-700 hover:text-white' => $routeName != 'admin.dashboard'
        ])>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            <span>Dashboard</span>
        </a>
        
        {{-- Link Kelola Pengguna --}}
        <a href="{{ route('admin.users.index') }}" @class([
            'flex items-center gap-4 px-6 py-4 transition',
            'bg-blue-600 text-white' => str_contains($routeName, 'admin.users'),
            'text-slate-400 hover:bg-slate-700 hover:text-white' => !str_contains($routeName, 'admin.users')
        ])>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            <span>Kelola Pengguna</span>
        </a>

        {{-- Link Kelola Properti --}}
         <a href="{{ route('admin.properties.index') }}" @class([
            'flex items-center gap-4 px-6 py-4 transition',
            'bg-blue-600 text-white' => str_contains($routeName, 'admin.properties'),
            'text-slate-400 hover:bg-slate-700 hover:text-white' => !str_contains($routeName, 'admin.properties')
        ])>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            <span>Manajemen Properti</span>
        </a>

        {{-- Link Kelola Artikel --}}
        <a href="{{ route('admin.posts.index') }}" @class([
            'flex items-center gap-4 px-6 py-4 transition',
            'bg-blue-600 text-white' => str_contains($routeName, 'admin.posts'),
            'text-slate-400 hover:bg-slate-700 hover:text-white' => !str_contains($routeName, 'admin.posts')
        ])>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 11a2 2 0 01-2-2V7a2 2 0 00-2-2H9a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2z"></path></svg>
            <span>Kelola Artikel</span>
        </a>

        {{-- TAMBAHKAN MENU KELOLA HALAMAN --}}
        <a href="{{ route('admin.pages.index') }}" @class([
            'flex items-center gap-4 px-6 py-4 transition',
            'bg-blue-600 text-white' => str_contains($routeName, 'admin.pages'),
            'text-slate-400 hover:bg-slate-700 hover:text-white' => !str_contains($routeName, 'admin.pages')
        ])>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            <span>Kelola Halaman</span>
        </a>
    </nav>

    <div class="p-6 border-t border-slate-700">
        <a href="{{ route('profile.edit') }}" class="flex items-center gap-4 group">
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