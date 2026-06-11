<x-layouts.auth>
    <section class="h-full w-full bg-zinc-800 flex flex-col items-center justify-center gap-4">
        <img src="{{ asset('assets/imagens/logos/rockton-branco.svg') }}" alt="ROCKTON" class="">
        <p class="text-md text-zinc-400">Seja bem vindo.</p>
        <form action="{{ route('login.authenticate') }}" method="POST" class="flex flex-col gap-4 w-96">
            @csrf
            <div class="h-full w-full bg-zinc-700 rounded p-6 flex flex-col gap-4">
                <div class="flex flex-col gap-2">
                    <label for="email" class="text-white">E-mail</label>
                    <input type="email" name="email" class="px-3 py-2 border rounded">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="password" class="text-white">Senha</label>
                    <input type="password" name="password" class="px-3 py-2 border rounded">
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Acessar</button>
            </div>
        </form>
    </section>
</x-layouts.auth>