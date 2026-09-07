<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="auth-page" style="background-image: url('{{ asset('img/login.png') }}');">
    <x-notifications />
    <main class="auth-content">
        <div class="text-center mb-3">
            <img src="{{ asset('img/rockton.png') }}" alt="Rockton">
            <p class="text-white-50 small mt-2 mb-0">Por trás de cada som, existe uma história para descobrir.</p>
        </div>
        <div class="auth-card">
            <div class="card-body p-3">
                <form method="POST" action="{{ route('login.index') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email<span class="text-danger"> *</span></label>
                        <input id="email" type="email" name="email" class="form-control" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha<span class="text-danger"> *</span></label>
                        <input id="password" type="password" name="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>
            </div>
        </div>
        <p class="text-center text-white-50 small mt-3 mb-0">
            Não tem uma conta? <a href="{{ route('register.index') }}" class="link-light">Registre-se</a>
        </p>
   </main>
</body>
</html>