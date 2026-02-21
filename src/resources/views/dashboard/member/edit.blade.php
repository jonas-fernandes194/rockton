@extends('layouts.dashboard')
@section('title', 'Edição de músicos')
@section('content')
    <div class="bg-white shadow-md p-5 overflow-hidden">
        <x-alert type="success" :message="session('success')" />
        <x-alert type="error" :message="session('error')" />

        <form action="{{ route('dashboard.member.update', $member->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
               <div class="flex-1">
                    <input type="hidden" name="id" value="{{ $member->id }}">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nome</label>
                    <input type="text" id="name" name="name" value="{{ $member->name }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Digite o nome do músico" readonly>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-64">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select id="select-status" name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Selecione</option>
                        <option value="1" {{ $member->status == 1 ? 'selected' : '' }}>Ativo</option>
                        <option value="0" {{ $member->status == 0 ? 'selected' : '' }}>Inativo</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Foto</label>
                    <div class="flex items-center gap-6">
                        <div class="relative">
                            <img id="photo" src="{{ asset($member->photo) }}" class="h-50 object-cover rounded-xl border border-gray-300 cursor-pointer hover:opacity-80 transition"  onclick="document.getElementById('photoInput').click()">
                            <input type="file" id="photoInput" name="photo" accept="image/*" class="hidden">
                            @error('photo')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Capa</label>
                    <div class="flex items-center gap-6">
                        <div class="relative">
                            <img id="cover" src="{{ asset($member->cover) }}" class="h-50 object-cover rounded-xl border border-gray-300 cursor-pointer hover:opacity-80 transition"  onclick="document.getElementById('coverInput').click()">
                            <input type="file" id="coverInput" name="cover" accept="image/*" class="hidden">
                            @error('cover')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Descrição</label>
                    <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Digite uma descrição sobre o músico">{{ $member->description }}</textarea>
                </div>
            </div>
            <div class="mt-8 flex justify-end gap-4">
                <a href="{{ route('dashboard.member') }}" class="cursor-pointer px-6 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium transition">
                    Cancelar
                </a>
                <button type="submit" onclick="atualizarMusico();" class="cursor-pointer px-6 py-2 rounded-lg bg-green-600 hover:bg-green-700 text-white font-medium transition">
                    Atualizar
                </button>
            </div>
        </form>
    </div>  
@endsection
@push('scripts')
<script>
    $(function() {
        $('#loading').show();
    });

    async function atualizarMusico(){
        $('#loading').show();
        e.preventDefault();
        const formData = new FormData();

        const filePhoto = $('#photoInput')[0].files[0];
        const fileCover = $('#coverInput')[0].files[0];

        formData.append('name', $('#name').val());
        formData.append('status', $('#select-status').val());
        formData.append('description', $('#description').val());

        if(filePhoto){
            formData.append('photo', filePhoto);
        }

        if(fileCover){
            formData.append('cover', fileCover);
        }

        await axios.post('{{ route("dashboard.member.update", $member->id) }}', formData)
            .then(response => {
                window.location.reload();
            })
            .catch(error => {
                console.error(error.response.data);
            });
    }

    $('#photoInput').on('change', function(e){
        const file = e.target.files[0];
        
        if(file){
            $('#photo').attr('src', URL.createObjectURL(file));
        }
    });
    
    $('#coverInput').on('change', function(e){
        const file = e.target.files[0];
        
        if(file){
            $('#cover').attr('src', URL.createObjectURL(file));
        }
    });
</script>
@endpush