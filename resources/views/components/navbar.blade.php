@if (request()->routeIs('landing'))
    {{-- NAVIGASI UNTUK HALAMAN UTAMA (Dinamis) --}}
    <nav x-data="{ scrolled: false, mobileMenuOpen: false }" @keydown.escape.window="mobileMenuOpen = false"
        @scroll.window="scrolled = (window.scrollY > 50)"
        class="fixed top-0 left-0 w-full z-50 transition-all duration-300"
        :class="{ 'text-gray-800': scrolled, 'text-white': !scrolled }">
        
        <div class="absolute inset-0 w-full h-full transition-all duration-300" 
             :class="{ 'bg-white/80 backdrop-blur-lg shadow-lg border-b border-white/20': scrolled, 'bg-transparent': !scrolled }">
        </div>

        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-24">
                <a href="{{ route('landing') }}" class="flex-shrink-0">
                    <span class="text-3xl font-bold">Properti<span :class="scrolled ? 'text-blue-600' : 'text-white'">Kita</span></span>
                </a>
                <div class="flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" 
                            :class="scrolled ? 'border-gray-800/20' : 'border-white/20'"
                            class="flex items-center gap-3 font-semibold tracking-wider uppercase text-sm px-4 py-2 border rounded-full hover:bg-black/10 transition">
                        <span>Menu</span>
                        <div class="space-y-1.5">
                            <span class="block w-5 h-0.5 transition-all duration-300" :class="{ 'rotate-45 translate-y-2': mobileMenuOpen, 'bg-gray-800': scrolled, 'bg-white': !scrolled }"></span>
                            <span class="block w-5 h-0.5 transition-all duration-300" :class="{ 'opacity-0': mobileMenuOpen, 'bg-gray-800': scrolled, 'bg-white': !scrolled }"></span>
                            <span class="block w-5 h-0.5 transition-all duration-300" :class="{ '-rotate-45 -translate-y-2': mobileMenuOpen, 'bg-gray-800': scrolled, 'bg-white': !scrolled }"></span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
        {{-- ... (Panel Menu Mobile Sama Persis) ... --}}
        <div x-show="mobileMenuOpen" x-transition @click.away="mobileMenuOpen = false" class="fixed inset-0 bg-slate-900/90 backdrop-blur-xl z-10"><div class="max-w-4xl mx-auto h-full flex flex-col items-center justify-center text-center"><ul class="space-y-6"><li><a @click="mobileMenuOpen = false" href="{{ route('landing') }}" class="text-4xl md:text-6xl text-slate-300 hover:text-white font-bold transition-all duration-300 inline-block relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-1 after:bottom-0 after:left-0 after:bg-blue-500 after:origin-bottom-right after:transition-transform after:duration-300 hover:after:scale-x-100 hover:after:origin-bottom-left">Beranda</a></li><li><a @click="mobileMenuOpen = false" href="{{ route('properti.index') }}" class="text-4xl md:text-6xl text-slate-300 hover:text-white font-bold transition-all duration-300 inline-block relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-1 after:bottom-0 after:left-0 after:bg-blue-500 after:origin-bottom-right after:transition-transform after:duration-300 hover:after:scale-x-100 hover:after:origin-bottom-left">Properti</a></li><li><a @click="mobileMenuOpen = false" href="{{ route('about') }}" class="text-4xl md:text-6xl text-slate-300 hover:text-white font-bold transition-all duration-300 inline-block relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-1 after:bottom-0 after:left-0 after:bg-blue-500 after:origin-bottom-right after:transition-transform after:duration-300 hover:after:scale-x-100 hover:after:origin-bottom-left">Tentang</a></li><li><a @click="mobileMenuOpen = false" href="{{ route('blog.index') }}" class="text-4xl md:text-6xl text-slate-300 hover:text-white font-bold transition-all duration-300 inline-block relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-1 after:bottom-0 after:left-0 after:bg-blue-500 after:origin-bottom-right after:transition-transform after:duration-300 hover:after:scale-x-100 hover:after:origin-bottom-left">Blog</a></li><li><a @click="mobileMenuOpen = false" href="{{ route('contact') }}" class="text-4xl md:text-6xl text-slate-300 hover:text-white font-bold transition-all duration-300 inline-block relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-1 after:bottom-0 after:left-0 after:bg-blue-500 after:origin-bottom-right after:transition-transform after:duration-300 hover:after:scale-x-100 hover:after:origin-bottom-left">Kontak</a></li></ul><div class="mt-16 flex items-center gap-6">@guest<a href="{{ route('login') }}" class="text-lg font-semibold text-slate-300 hover:text-white">Login</a><a href="{{ route('register') }}" class="px-8 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">Daftar</a>@endguest @auth<form method="POST" action="{{ route('logout') }}"><button type="submit" class="text-lg font-semibold text-red-500 hover:text-red-400">Logout</button></form>@endauth</div></div></div>
    </nav>

@else

    {{-- NAVIGASI UNTUK HALAMAN LAIN (Statis & Terlihat) --}}
    <nav x-data="{ mobileMenuOpen: false }" @keydown.escape.window="mobileMenuOpen = false" class="fixed top-0 left-0 w-full z-50 text-gray-800">
        
        <div class="absolute inset-0 w-full h-full bg-white/80 backdrop-blur-lg shadow-lg border-b border-white/20"></div>

        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-24">
                <a href="{{ route('landing') }}" class="flex-shrink-0">
                    <span class="text-3xl font-bold">Properti<span class="text-blue-600">Kita</span></span>
                </a>
                <div class="flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="flex items-center gap-3 font-semibold tracking-wider uppercase text-sm px-4 py-2 border border-gray-800/20 rounded-full hover:bg-black/10 transition">
                        <span>Menu</span>
                        <div class="space-y-1.5">
                            <span class="block w-5 h-0.5 bg-gray-800 transition-transform duration-300" :class="{ 'rotate-45 translate-y-2': mobileMenuOpen }"></span>
                            <span class="block w-5 h-0.5 bg-gray-800 transition-opacity duration-300" :class="{ 'opacity-0': mobileMenuOpen }"></span>
                            <span class="block w-5 h-0.5 bg-gray-800 transition-transform duration-300" :class="{ '-rotate-45 -translate-y-2': mobileMenuOpen }"></span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
        {{-- ... (Panel Menu Mobile Sama Persis) ... --}}
        <div x-show="mobileMenuOpen" x-transition @click.away="mobileMenuOpen = false" class="fixed inset-0 bg-slate-900/90 backdrop-blur-xl z-10"><div class="max-w-4xl mx-auto h-full flex flex-col items-center justify-center text-center"><ul class="space-y-6"><li><a @click="mobileMenuOpen = false" href="{{ route('landing') }}" class="text-4xl md:text-6xl text-slate-300 hover:text-white font-bold transition-all duration-300 inline-block relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-1 after:bottom-0 after:left-0 after:bg-blue-500 after:origin-bottom-right after:transition-transform after:duration-300 hover:after:scale-x-100 hover:after:origin-bottom-left">Beranda</a></li><li><a @click="mobileMenuOpen = false" href="{{ route('properti.index') }}" class="text-4xl md:text-6xl text-slate-300 hover:text-white font-bold transition-all duration-300 inline-block relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-1 after:bottom-0 after:left-0 after:bg-blue-500 after:origin-bottom-right after:transition-transform after:duration-300 hover:after:scale-x-100 hover:after:origin-bottom-left">Properti</a></li><li><a @click="mobileMenuOpen = false" href="{{ route('about') }}" class="text-4xl md:text-6xl text-slate-300 hover:text-white font-bold transition-all duration-300 inline-block relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-1 after:bottom-0 after:left-0 after:bg-blue-500 after:origin-bottom-right after:transition-transform after:duration-300 hover:after:scale-x-100 hover:after:origin-bottom-left">Tentang</a></li><li><a @click="mobileMenuOpen = false" href="{{ route('blog.index') }}" class="text-4xl md:text-6xl text-slate-300 hover:text-white font-bold transition-all duration-300 inline-block relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-1 after:bottom-0 after:left-0 after:bg-blue-500 after:origin-bottom-right after:transition-transform after:duration-300 hover:after:scale-x-100 hover:after:origin-bottom-left">Blog</a></li><li><a @click="mobileMenuOpen = false" href="{{ route('contact') }}" class="text-4xl md:text-6xl text-slate-300 hover:text-white font-bold transition-all duration-300 inline-block relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-1 after:bottom-0 after:left-0 after:bg-blue-500 after:origin-bottom-right after:transition-transform after:duration-300 hover:after:scale-x-100 hover:after:origin-bottom-left">Kontak</a></li></ul><div class="mt-16 flex items-center gap-6">@guest<a href="{{ route('login') }}" class="text-lg font-semibold text-slate-300 hover:text-white">Login</a><a href="{{ route('register') }}" class="px-8 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">Daftar</a>@endguest @auth<form method="POST" action="{{ route('logout') }}"><button type="submit" class="text-lg font-semibold text-red-500 hover:text-red-400">Logout</button></form>@endauth</div></div></div>
    </nav>
@endif