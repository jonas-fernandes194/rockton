<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>{{ $title ?? 'ROCKTON' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="min-h-screen flex flex-col">
    <x-header />
    <main class="flex-grow container mx-auto px-4 py-8">
        @yield('content')
    </main>
    <x-footer />
  </body>
</html>

<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
