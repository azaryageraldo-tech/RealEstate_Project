<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'PropertiKita' }}</title>

    {{-- Memuat CSS dan JS sekaligus --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Script Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-white text-slate-800 antialiased">

    <x-navbar />

    <main>
        @yield('content')
    </main>

    <x-footer />

</body>
</html>