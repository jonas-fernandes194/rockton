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
            <img src="{{ asset('img/rockton.png') }}" alt="Rockton" class="auth-logo">
            <p class="text-white-50 small mt-2 mb-0">Crie sua conta e venha curtir o melhor do rock 🤘</p>
        </div>
        <div class="auth-card rounded-3">
            <div class="card-body p-3">
                <form method="POST" action="{{ route('register.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome<span class="text-danger"> *</span></label>
                        <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email<span class="text-danger"> *</span></label>
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha<span class="text-danger"> *</span></label>
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" autofocus>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Senha<span class="text-danger"> *</span></label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" autofocus>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Registre-se</button>
                </form>
            </div>
        </div>
        <p class="text-center text-white-50 small mt-3 mb-0">
            Já tem uma conta? <a href="{{ route('login.index') }}" class="link-light">Entrar</a>
        </p>
   </main>
</body>
</html>