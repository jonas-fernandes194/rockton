<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'ROCKTON')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-slate-900 text-slate-100">
    @include('partials.header')
    <main class="min-h-screen">
        @yield('content')
    </main>
    @include('partials.footer')
</body>
</html>