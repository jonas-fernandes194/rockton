<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        body{
            background:#09090b;
            color:#fff;
        }

        .sidebar{
            width:260px;
            min-height:100vh;
            background:#18181b;
            border-right:1px solid #27272a;
        }

        .sidebar-link{
            color:#a1a1aa;
            border-radius:16px;
            padding:12px 16px;
            text-decoration:none;
            display:flex;
            align-items:center;
            gap:12px;
            transition:.2s;
        }

        .sidebar-link:hover{
            background:#27272a;
            color:#fff;
        }

        .sidebar-link.active{
            background:#27272a;
            color:#3b82f6;
        }

        .topbar{
            height:64px;
            border-bottom:1px solid #27272a;
        }

        .dropdown-menu{
            background:#18181b;
            border-color:#27272a;
            border-radius:16px;
        }

        .dropdown-item{
            color:#fff;
        }

        .dropdown-item:hover{
            background:#27272a;
            color:#fff;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <aside class="sidebar">

            <div class="p-4">
                <img src="{{ asset('assets/imagens/logos/rockton-branco.svg') }}"
                    class="img-fluid"
                    style="max-width:140px">
            </div>

            <nav class="px-3 small d-flex flex-column gap-1">

                <a href="#" class="sidebar-link active">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 12l9-9 9 9M4 10v10h6v-6h4v6h6V10"/>
                    </svg>
                    Dashboard
                </a>

                <a href="#" class="sidebar-link">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zM4 21c0-3.3 3.6-6 8-6s8 2.7 8 6"/>
                    </svg>
                    Músicos
                </a>

                <a href="#" class="sidebar-link">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 9l10 10M19 9L9 19"/>
                    </svg>
                    Músicas
                </a>

                <a href="#" class="sidebar-link">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    Bandas
                </a>

                <a href="#" class="sidebar-link">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 7h18M3 12h18M3 17h18"/>
                    </svg>
                    Álbuns
                </a>

            </nav>

        </aside>
        <div class="flex-grow-1">
            <header class="topbar px-4 d-flex align-items-center justify-content-between">

                <h1 class="small text-secondary mb-0">
                    <span class="fw-semibold text-white">Dashboard</span>
                </h1>

                <div class="d-flex align-items-center gap-4">
                    <div class="dropdown">
                        <button class="btn border-0 p-0 text-white d-flex align-items-center gap-3" data-bs-toggle="dropdown">
                            <div style="width:36px;height:36px" class="rounded-circle bg-secondary">
                            </div>
                            <div class="text-start">
                                <div class="small fw-medium">
                                    {{ auth()->user()->name ?? 'Usuário' }}
                                </div>
                            </div>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li>
                                <a class="dropdown-item" href="#">
                                    Perfil
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">
                                    Configurações
                                </a>
                            </li>

                            <li><hr class="dropdown-divider border-secondary"></li>

                            <li>
                                <a class="dropdown-item text-danger" href="#">
                                    Sair
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </header>
            <main class="p-4">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>