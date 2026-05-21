<h1>{{ $title }}</h1>
<section>
    <form action="{{ route('login.authenticate') }}" method="POST">
        @csrf

        @if ($errors->any())
            <div>
                {{ $errors->first() }}
            </div>
        @endif
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>
    <p>Ainda não tem uma conta? <a href="{{ route('register') }}">Registre-se aqui</a>.</p>
</section>