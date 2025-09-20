<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">
        <div class="bg-white flex flex-col justify-center items-center px-4 sm:px-6 lg:px-16 py-12">
            <div class="w-full max-w-md">
                <a href="{{ route('landing') }}" class="mb-8 inline-block">
                    <span class="text-3xl font-bold text-gray-800">Properti<span class="text-blue-600">Kita</span></span>
                </a>
                
                <h2 class="text-3xl font-extrabold text-gray-900">Buat Akun Baru</h2>
                <p class="mt-2 text-gray-600">
                    Sudah punya akun? <a href="{{ route('login') }}" class="font-semibold text-blue-600 hover:text-blue-500">Login di sini</a>
                </p>

                <div class="mt-8">
                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="font-semibold text-gray-700">Nama Lengkap</label>
                            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                                   class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div>
                            <label for="email" class="font-semibold text-gray-700">Alamat Email</label>
                            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                                   class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div>
                            <label for="password" class="font-semibold text-gray-700">Password</label>
                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                   class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div>
                            <label for="password_confirmation" class="font-semibold text-gray-700">Konfirmasi Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                                   class="mt-2 w-full px-4 py-3 bg-slate-100 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div>
                            <button type="submit" class="w-full mt-4 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg transform hover:scale-105 hover:from-blue-700 hover:to-blue-900 transition-all duration-300">
                                Daftar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="hidden lg:flex bg-slate-100 justify-center items-center p-12">
            <div id="lottie-register-container" class="w-full max-w-lg h-auto"></div>
        </div>
    </div>
</body>
</html>