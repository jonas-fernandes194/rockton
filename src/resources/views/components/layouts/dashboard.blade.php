<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="flex">
        <aside class="bg-white w-64 min-h-screen p-4 border-b-2 border-gray-200">
            <img src="{{ asset('assets/imagens/logos/rockton-gray.svg') }}" alt="Logo" class="w-40 mb-8">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded-lg font-medium text-sm
                        {{ request()->routeIs('dashboard*') 
                            ? 'bg-gray-100 text-gray-900' 
                            : 'text-gray-700 hover:bg-gray-100' }}">
                            Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('members.index') }}" class="block px-4 py-2 rounded-lg hover:bg-gray-100 font-medium text-sm
                        {{ request()->routeIs('members*') 
                            ? 'bg-gray-100 text-gray-900' 
                            : 'text-gray-700 hover:bg-gray-100' }}">
                        Músicos
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="block px-4 py-2 rounded-lg hover:bg-gray-100 font-medium text-sm text-gray-700">
                        Músicas
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="block px-4 py-2 rounded-lg hover:bg-gray-100 font-medium text-sm text-gray-700">
                        Bandas
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="block px-4 py-2 rounded-lg hover:bg-gray-100 font-medium text-sm text-gray-700">
                        Álbuns
                    </a>
                </li>
            </ul>
        </aside>
        <div class="flex-1 flex flex-col">
            <nav class="bg-white p-4">
                <ul class="flex justify-end">
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block px-4 py-2 rounded-lg hover:bg-gray-100 font-medium text-sm text-gray-700">Sair</button>
                        </form>
                    </li>
                </ul>
            </nav>
            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>