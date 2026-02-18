<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'ROCKTON')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gradient-to-br from-slate-100 to-slate-200 text-slate-700"> 
    <x-loading />
    <div class="min-h-screen flex">
        <aside class="w-72 bg-white/80 border-r border-slate-200 flex flex-col">
            <div class="h-16 flex items-center px-6 border-b border-slate-200">
                <img src="{{ asset('imagens/rockton-logo-gray.svg') }}" class="h-10" alt="Rockton" title="Rockton">
            </div>
            <nav class="flex-1 px-4 py-6 space-y-1 text-sm font-medium">
                @php
                    $active = 'bg-indigo-50 text-slate-700';
                    $inactive = 'hover:bg-slate-100';
                @endphp
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('dashboard') ? $active : $inactive }}">
                    Dashboard
                </a>
                <a href="{{ route('dashboard.member') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('dashboard.member') ? $active : $inactive }}">
                    Músicos
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ $inactive }}">
                    Músicas
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ $inactive }}">
                    Bandas
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ $inactive }}">
                    Álbuns
                </a>
            </nav>
            <div class="px-6 py-4 border-t border-slate-200 text-xs text-slate-400">© {{ date('Y') }} Rockton</div>
        </aside>
        <!-- CONTENT -->
        <div class="flex-1 flex flex-col">
            <!-- HEADER -->
            <header class="h-16 bg-white/70 backdrop-blur-xl border-b border-slate-200 px-6 flex items-center justify-between">
                <h1 class="text-lg font-semibold text-slate-800">
                    @yield('header', 'Dashboard')
                </h1>
                <!-- USER DROPDOWN (CSS ONLY) -->
                <div class="relative group">
                    <button class="flex items-center gap-3 focus:outline-none">
                        <div class="text-right leading-tight">
                            <p class="text-sm font-semibold text-slate-700">
                                {{ auth()->user()->name }}
                            </p>
                        </div>

                        <div class="h-10 w-10 rounded-full bg-gradient-to-br from-gray-500 to-gray-600
                                    text-white flex items-center justify-center font-bold shadow">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    </button>
                    <div class="absolute right-0 mt-3 w-52 bg-white rounded-2xl shadow-xl border border-slate-200
                            opacity-0 invisible group-focus-within:visible group-focus-within:opacity-100 transition-all duration-200">/
                        <a href="#" class="block px-4 py-3 text-sm hover:bg-slate-100 rounded-t-2xl">Perfil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                class="w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50 rounded-b-2xl">
                                Sair
                            </button>
                        </form>
                    </div>
                </div>
            </header>
            <main class="flex-1 p-8 space-y-8">
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
    <script>
        $(function() {
            $('#loading').hide();
        });
    </script>
</body>
</html>