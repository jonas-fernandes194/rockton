<style>
    @keyframes dots {
        0% { content: "."; }
        33% { content: ".."; }
        66% { content: "..."; }
        100% { content: ""; }
    }

    #loading-screen {
        display: flex; 
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.6);
        justify-content: center;
        align-items: center;
        z-index: 9999;
        color: white;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .guitar-loader img {
        width: 240px;
        height: auto;
        margin-top: 0.5rem;
    }

    .loading-text::after {
        content: "";
        display: inline-block;
        animation: dots 1.2s steps(3, end) infinite;
    }
</style>

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
    <div id="loading-screen" style="display:none;">
        <div class="guitar-loader flex flex-col items-center space-y-2">
            <img src="{{ asset('assets/imagens/guitar-loading.png') }}" alt="Guitarra carregando" style="transform: rotate(20deg);">
            <p class="loading-text text-xl font-semibold">Carregando</p>
        </div>
    </div>
</body>
</html>

<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>