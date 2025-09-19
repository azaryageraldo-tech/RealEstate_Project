<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">
        <!-- Kolom Kiri: Form Login -->
        <div class="bg-white flex flex-col justify-center items-center px-4 sm:px-6 lg:px-16 py-12">
            <div class="w-full max-w-md">
                <!-- Logo -->
                <a href="{{ route('landing') }}" class="mb-8 inline-block">
                    <span class="text-3xl font-bold text-gray-800">Properti<span class="text-blue-600">Kita</span></span>
                </a>
                
                <h2 class="text-3xl font-extrabold text-gray-900">Selamat Datang Kembali</h2>
                <p class="mt-2 text-gray-600">
                    Belum punya akun? <a href="{{ route('register') }}" class="font-semibold text-blue-600 hover:text-blue-500">Daftar di sini</a>
                </p>

                <div class="mt-8">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf
                        <!-- Email Address -->
                        <div>
                            <label for="email" class="font-semibold text-gray-700">Alamat Email</label>
                            <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                                   class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <!-- Password -->
                        <div>
                            <div class="flex justify-between items-center">
                                <label for="password" class="font-semibold text-gray-700">Password</label>
                                @if (Route::has('password.request'))
                                    <a class="text-sm text-blue-600 hover:text-blue-500" href="{{ route('password.request') }}">
                                        Lupa password?
                                    </a>
                                @endif
                            </div>
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                   class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <!-- Tombol Login -->
                        <div>
                            <button type="submit" class="w-full mt-4 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg transform hover:scale-105 hover:from-blue-700 hover:to-blue-900 transition-all duration-300">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Animasi Lottie -->
        <div class="hidden lg:flex bg-slate-100 justify-center items-center p-12">
            <div id="lottie-login-container" class="w-full max-w-lg h-auto"></div>
        </div>
    </div>
</body>
</html>