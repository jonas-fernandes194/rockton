<x-app-layout>
    <x-slot name="header">
        {{ $title ?? 'Membros' }}
    </x-slot>
    <div class="p-4 bg-white rounded shadow">

        <form action="{{ route('banda.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Selecione o músico</label>
                <select name="musico_id[]" multiple="multiple" class="select-musicos w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                    @foreach ($musicos as $musico)
                        <option value={{ $musico->id }}>{{ $musico->public_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nome da banda</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                    focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="mb-4">
                <label class="cursor-pointer inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12v9m0 0l-3-3m3 3l3-3M4 8h16M4 8V6a2 2 0 012-2h3.5a1.5 1.5 0 001.5-1.5V2M4 8h16" />
                    </svg>
                    Carregar Foto
                    <input type="file" name="cover" class="hidden" accept="image/*">
                </label>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    CRIAR
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

<script>
  $(document).ready(function () {
    $('.select-musicos').select2({
        placeholder: "Digite o nome do músico",
        width: '100%',
        language: {
        noResults: function() {
            return "Nenhum músico encontrado";
            }
        }
    });
  });
</script>