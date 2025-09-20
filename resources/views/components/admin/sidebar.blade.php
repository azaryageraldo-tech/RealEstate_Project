<aside class="w-64 bg-slate-800 text-white flex-shrink-0">
    <div class="p-6">
        <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold">
            Admin<span class="text-blue-500">Panel</span>
        </a>
    </div>

    <nav class="mt-8">
        <a href="{{ route('admin.dashboard') }}" class="block px-6 py-3 hover:bg-slate-700 transition">Dashboard</a>
        <a href="#" class="block px-6 py-3 hover:bg-slate-700 transition">Kelola Pengguna</a>
        <a href="#" class="block px-6 py-3 hover:bg-slate-700 transition">Kelola Properti</a>
        <a href="#" class="block px-6 py-3 hover:bg-slate-700 transition">Kelola Artikel</a>
    </nav>

    <div class="absolute bottom-0 w-64 p-6">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-6 py-3 bg-red-600/20 text-red-400 rounded-lg hover:bg-red-600 hover:text-white transition">
                Logout
            </button>
        </form>
    </div>
</aside>