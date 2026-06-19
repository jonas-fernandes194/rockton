<x-layouts.auth>
    <section class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('{{ asset('assets/login.png') }}')">
        <div class="flex flex-col items-center gap-4">
            <img src="{{ asset('assets/imagens/logos/rockton-branco.svg') }}" alt="ROCKTON">
            <p class="text-md text-zinc-400">Seja bem vindo.</p>
            <form id="login-form" action="{{ route('login.authenticate') }}" method="POST" class="w-96" return false>
                @csrf
                <div class="bg-zinc-700/90 rounded-xl p-6 flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <label for="email" class="text-white">E-mail <span style="color:#ef4444">*</span></label>
                        <input type="email" id="email" name="email" class="px-3 py-2 border border-zinc-500 rounded bg-zinc-800 text-white">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="password" class="text-white">Senha <span style="color:#ef4444">*</span></label>
                        <input type="password" id="password" name="password"class="px-3 py-2 border border-zinc-500 rounded bg-zinc-800 text-white">
                    </div>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 cursor-pointer" onclick="enviaFormulario(event)">
                        Acessar
                    </button>
                </div>
            </form>
        </div>
    </section>
    @push('scripts')
        <script>
           async function enviaFormulario(e) {
                e.preventDefault();
                const formData = new FormData($('#login-form')[0]);
                
                formData.append('email', $('#email').val());
                formData.append('password', $('#password').val());

                await axios.post('{{ route("login.authenticate") }}', formData)
                    .then(response => {
                        window.location.href = '{{ route("dashboard") }}';
                    })
                    .catch(error => {
                        toast(error.response?.data?.message, 'error');
                    });
            }
        </script>
    @endpush
</x-layouts.auth>