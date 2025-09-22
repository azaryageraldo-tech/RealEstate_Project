<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-100">
    <div class="flex h-screen overflow-hidden">
        <x-admin.sidebar />

        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
            
            @if (isset($header))
                <header class="sticky top-0 bg-slate-100/80 backdrop-blur-lg z-10 border-b">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main>
                 {{ $slot }}
            </main>

        </div>
    </div>
</body>
</html>