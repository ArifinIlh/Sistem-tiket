<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Aplikasi Tiket') }}</title>

    @vite('resources/css/app.css') {{-- Pastikan Tailwind dikompilasi --}}
</head>
<body class="bg-gray-100 text-gray-900 antialiased">

    {{-- Navigation Bar --}}
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-xl font-bold text-gray-800">
                Dashboard Admin
            </div>
            <div>
                <a href="{{ route('tickets.index') }}" class="text-gray-600 hover:text-gray-900 mx-2">Tiket</a>
                <a href="{{ route('tickets.create') }}" class="text-gray-600 hover:text-gray-900 mx-2">Tambah Tiket</a>
            </div>
        </div>
    </nav>

    {{-- Page Content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white shadow mt-12">
        <div class="max-w-7xl mx-auto px-4 py-6 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Aplikasi Tiket. Semua Hak Dilindungi.
        </div>
    </footer>

</body>
</html>
