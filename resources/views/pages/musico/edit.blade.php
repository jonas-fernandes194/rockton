<x-app-layout>
    <x-slot name="header">
        {{ $title ?? 'Membros' }}
    </x-slot>
    <div class="p-4 bg-white rounded shadow">
    
        <form action="{{ route('musico.update', $musico->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nome completo</label>
                <input type="text" id="name" name="name" value="{{ old('name', $musico->name) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                            focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" oninput="this.value = this.value.toUpperCase()">
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-4">
                <div class="flex justify-around items-center">
                    <img src="{{ old('cover', asset('storage/' . $musico->cover)) }}" width="100px" height="100px"
                        alt="{{ $musico->public_name }}" title="{{ $musico->public_name }}">

                    <div class="flex flex-col items-start">
                        <label class="cursor-pointer inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12v9m0 0l-3-3m3 3l3-3M4 8h16M4 8V6a2 2 0 012-2h3.5a1.5 1.5 0 001.5-1.5V2M4 8h16" />
                            </svg>
                            Carregar Foto
                            <input type="file" name="cover" class="hidden" accept="image/*">
                        </label>

                        @error('cover')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label for="public_name" class="block text-sm font-medium text-gray-700">Nome (público)</label>
                <input type="text" id="public_name" name="public_name" value="{{ old('public_name', $musico->public_name) }}" placeholder="nome que será chamado"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                            focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" oninput="this.value = this.value.toUpperCase()">
                @error('public_name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-2">
                <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    ATUALIZAR
                </button>
            </div>
        </form>
    </div>
</x-app-layout>