<x-layouts.auth>
    <section class="min-vh-100 bg-hero d-flex align-items-center justify-content-center" style="background-image: url('{{ asset('assets/login.png') }}')">
        <div class="d-flex flex-column align-items-center gap-4 w-100" style="max-width: 28rem;">
            <img src="{{ asset('assets/imagens/logos/rockton-branco.svg') }}" alt="ROCKTON" class="img-fluid" style="max-width: 12rem;">
            <p class="fs-6 text-secondary">Seja bem vindo.</p>
            <form id="login-form" action="{{ route('login.authenticate') }}" method="POST" class="w-100" return false>
                @csrf
                <div style="background-color: currentColor;" class="card rounded-4 p-4">
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">E-mail <span style="color:#ef4444">*</span></label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-white">Senha <span style="color:#ef4444">*</span></label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary w-100" onclick="enviaFormulario(event)">
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