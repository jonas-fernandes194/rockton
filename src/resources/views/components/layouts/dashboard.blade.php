<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-zinc-950 text-white">

<div class="flex min-h-screen">
    <aside class="w-64 border-r border-zinc-800 bg-zinc-900">

        <div class="p-6">
            <img src="{{ asset('assets/imagens/logos/rockton-branco.svg') }}" class="w-36">
        </div>

        <nav class="px-3 space-y-1 text-sm">
            <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3 text-blue-500 bg-zinc-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 12l9-9 9 9M4 10v10h6v-6h4v6h6V10"/>
                </svg>
                Dashboard
            </a>
            <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3 text-zinc-400 hover:bg-zinc-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zM4 21c0-3.3 3.6-6 8-6s8 2.7 8 6"/>
                </svg>
                Músicos
            </a>
            <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3 text-zinc-400 hover:bg-zinc-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 9l10 10M19 9L9 19"/>
                </svg>
                Músicas
            </a>
            <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3 text-zinc-400 hover:bg-zinc-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                Bandas
            </a>
            <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3 text-zinc-400 hover:bg-zinc-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 7h18M3 12h18M3 17h18"/>
                </svg>
                Álbuns
            </a>
        </nav>
    </aside>

    <div class="flex-1">

        {{-- TOPBAR --}}
        <header class="flex h-16 items-center justify-between border-b border-zinc-800 px-8">

            <h1 class="text-sm text-zinc-400">
                Bem-vindo ao <span class="text-white font-semibold">Dashboard</span>
            </h1>

            <div class="flex items-center gap-6">

                {{-- NOTIFICAÇÃO --}}
                <button class="relative text-zinc-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.2V11a6 6 0 1 0-12 0v3.2c0 .5-.2 1-.6 1.4L4 17h5"/>
                    </svg>
                    <span class="absolute -top-1 -right-1 w-2 h-2 bg-blue-500 rounded-full"></span>
                </button>

                {{-- USER DROPDOWN --}}
                <div class="relative group">

                    <button class="flex items-center gap-3">
                        <div class="h-9 w-9 rounded-full bg-zinc-700"></div>

                        <div class="text-left">
                            <p class="text-sm font-medium">
                                {{ auth()->user()->name ?? 'Usuário' }}
                            </p>
                            <p class="text-xs text-zinc-400">
                                Ver perfil
                            </p>
                        </div>
                    </button>

                    {{-- DROPDOWN --}}
                    <div class="absolute right-0 mt-3 w-44 rounded-xl border border-zinc-800 bg-zinc-900 shadow-lg
                                opacity-0 invisible group-hover:opacity-100 group-hover:visible transition">

                        <a href="#" class="block px-4 py-2 text-sm hover:bg-zinc-800">Perfil</a>
                        <a href="#" class="block px-4 py-2 text-sm hover:bg-zinc-800">Configurações</a>
                        <hr class="border-zinc-800">
                        <a href="#" class="block px-4 py-2 text-sm text-red-400 hover:bg-zinc-800">Sair</a>

                    </div>

                </div>

            </div>

        </header>

        <main class="p-8">
            {{ $slot }}
        </main>

    </div>
</div>

</body>
</html>