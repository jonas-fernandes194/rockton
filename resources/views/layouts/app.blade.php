<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen">
        {{-- Menu Lateral --}}
        <aside class="w-64 bg-white border-r shadow-sm flex flex-col">
            <div class="p-4 text-lg font-bold border-b">
              🎸 Rockton 
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-100 {{ request()->routeIs('dashboard') ? 'bg-gray-200' : '' }}">Arena</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Bandas</a>
                <a href="{{ route('musico.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 {{ request()->routeIs('musico.index') ? 'bg-gray-200' : '' }}">Músicos</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Músicas</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Álbuns</a>
            </nav>
            <div class="p-4 border-t text-sm text-gray-600">
                {{ Auth::user()->name }}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="mt-2 text-red-600 hover:underline">Sair</button>
                </form>
            </div>
        </aside>

        {{-- Conteúdo principal --}}
        <main class="flex-1 p-6 overflow-y-auto">
            @if (isset($header))
                <header class="mb-6">
                    <h1 class="text-2xl font-semibold text-gray-800">{{ $header }}</h1>
                </header>
            @endif

            <div>
                {{ $slot }}
            </div>
        </main>

    </div>
</body>
</html>
