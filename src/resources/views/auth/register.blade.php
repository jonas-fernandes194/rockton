<section>
    <form action="{{ route('register.store') }}" method="POST">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" placeholder="Digite seu nome">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Digite seu email">
        <label for="password">Senha:</label>    
        <input type="password" id="password" name="password" placeholder="Digite sua senha">
        <label for="password_confirmation">Confirme a senha:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirme sua senha">
        <button type="submit">Registrar</button>
    </form>
</section>