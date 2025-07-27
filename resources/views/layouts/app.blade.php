<style>
     #loading-screen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.6);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .spinner {
        width: 50px;
        height: 50px;
        border: 6px solid #ffffff33;        
        border-top: 6px solid #ffffff;  
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    .loading-text {
        margin-top: 16px;
        font-size: 1.25rem;
        font-weight: 600;  
        color: #fff;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }
</style>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ 'ROCKTON' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen">
        
        <aside class="w-64 bg-[#201E1E] text-white border-r shadow-sm flex flex-col">
            <div class="p-6 text-lg font-bold border-b">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('assets/imagens/rockton-logo-dash.svg') }}" alt="ROCKTON" title="ROCKTON" class="w-40 h-auto">
                </a>
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-2 px-3 py-2 rounded border-l-4 border-transparent hover:border-[#201E1E] {{ request()->routeIs('dashboard') ? 'bg-white text-[#201E1E] border-[#201E1E]' : 'text-white' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house-icon lucide-house"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                    Dashboard
                </a>

                <a href="{{ route('banda.index') }}"
                    class="flex items-center gap-2 px-3 py-2 rounded border-l-4 border-transparent hover:border-[#201E1E] {{ request()->routeIs('banda.*') ? 'bg-white text-[#201E1E] border-[#201E1E]' : 'text-white' }}">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-drum-icon lucide-drum"><path d="m2 2 8 8"/><path d="m22 2-8 8"/><ellipse cx="12" cy="9" rx="10" ry="5"/><path d="M7 13.4v7.9"/><path d="M12 14v8"/><path d="M17 13.4v7.9"/><path d="M2 9v8a10 5 0 0 0 20 0V9"/></svg>
                    Bandas
                </a>

                <a href="{{ route('musico.index') }}"
                    class="flex items-center gap-2 px-3 py-2 rounded border-l-4 border-transparent hover:border-[#201E1E] {{ request()->routeIs('musico.*') ? 'bg-white text-[#201E1E] border-[#201E1E]' : 'text-white' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mic-vocal-icon lucide-mic-vocal"><path d="m11 7.601-5.994 8.19a1 1 0 0 0 .1 1.298l.817.818a1 1 0 0 0 1.314.087L15.09 12"/><path d="M16.5 21.174C15.5 20.5 14.372 20 13 20c-2.058 0-3.928 2.356-6 2-2.072-.356-2.775-3.369-1.5-4.5"/><circle cx="16" cy="7" r="5"/></svg>
                    Músicos
                </a>

                <a href="#"
                    class="flex items-center gap-2 px-3 py-2 rounded border-l-4 border-transparent hover:border-[#201E1E] text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-music4-icon lucide-music-4"><path d="M9 18V5l12-2v13"/><path d="m9 9 12-2"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
                    Músicas
                </a>

                <a href="#"
                    class="flex items-center gap-2 px-3 py-2 rounded border-l-4 border-transparent hover:border-[#201E1E] text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-disc3-icon lucide-disc-3"><circle cx="12" cy="12" r="10"/><path d="M6 12c0-1.7.7-3.2 1.8-4.2"/><circle cx="12" cy="12" r="2"/><path d="M18 12c0 1.7-.7 3.2-1.8 4.2"/></svg>
                    Álbuns
                </a>

                <a href="{{ url('/') }}" target="_blank"
                    class="flex items-center gap-2 px-3 py-2 rounded border-l-4 border-transparent hover:border-[#201E1E] text-white">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cloudy-icon lucide-cloudy"><path d="M17.5 21H9a7 7 0 1 1 6.71-9h1.79a4.5 4.5 0 1 1 0 9Z"/><path d="M22 10a3 3 0 0 0-3-3h-2.207a5.502 5.502 0 0 0-10.702.5"/></svg>
                    Ver site
                </a>
            </nav>
            <div class="p-4 border-t text-sm text-gray-600">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 mt-2 text-red-600 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m16 17 5-5-5-5"/>
                        <path d="M21 12H9"/>
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        </svg>
                    Sair
                    </button>
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
        <div id="loading-screen">
            <div class="spinner"></div>
            <p class="loading-text">Carregando...</p>
        </div>
    </div>
</body>
</html>