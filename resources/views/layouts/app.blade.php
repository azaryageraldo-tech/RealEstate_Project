<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'PropertiKita' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 text-slate-800">

    <x-navbar />

    <main>
        @yield('content')
    </main>

      <x-footer />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/js/app.js') {{-- <-- TAMBAHKAN BARIS INI --}}

</body>
</html>