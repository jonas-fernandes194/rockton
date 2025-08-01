<x-app-layout>
    <x-slot name="header">
        {{ $title ?? 'Music' }}
    </x-slot>
    <div class="p-4 bg-white rounded shadow">
        <form action="{{ route('musica.update', $musica->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" id="title" name="title" value="{{ old('title', $musica->title) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                    focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" oninput="this.value = this.value.toUpperCase()">
                    @error('title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
            </div>
            <label for="name" class="block text-sm font-medium text-gray-700">Selecione a banda</label>
            <select class="select-music block w-full" name="band_id">
                <option>Selecione</option>
                @foreach ($bandas as $banda)
                    <option value="{{ $banda->id }}" {{ old('band_id') == $banda->id ? 'selected' : '' }}>
                        {{ $banda->name }}
                    </option>
                @endforeach
            </select>
            <div class="flex justify-end space-x-2 mt-2">
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    ATUALIZAR
                </button>
            </div>
        </form>
    </div>
</x-app-layout>