<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-light text-dark">
        <header class="container py-4">
            @if (Route::has('login'))
                <nav class="d-flex justify-content-end gap-2">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-dark btn-sm">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-link btn-sm">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-dark btn-sm">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <main class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4 p-lg-5">
                            <h1 class="h3 mb-2">Let's get started</h1>
                            <p class="text-secondary mb-4">
                                Laravel has an incredibly rich ecosystem. We suggest starting with the following.
                            </p>

                            <div class="list-group list-group-flush mb-4">
                                <a href="https://laravel.com/docs" target="_blank" rel="noopener" class="list-group-item list-group-item-action px-0">
                                    Read the <span class="fw-medium text-danger">Documentation</span>
                                </a>
                                <a href="https://laracasts.com" target="_blank" rel="noopener" class="list-group-item list-group-item-action px-0">
                                    Watch video tutorials at <span class="fw-medium text-danger">Laracasts</span>
                                </a>
                            </div>

                            <a href="https://cloud.laravel.com" target="_blank" rel="noopener" class="btn btn-dark">
                                Deploy now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
