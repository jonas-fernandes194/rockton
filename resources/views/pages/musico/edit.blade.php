<x-app-layout>
    <x-slot name="header">
        {{ $title ?? 'Membros' }}
    </x-slot>
    <div class="p-4 bg-white rounded shadow">
        <form action="{{ route('musico.update', $musico->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" id="name" name="name" value="{{ old('name', $musico->name) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                    focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" oninput="this.value = this.value.toUpperCase()">
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
            </div>
            <div class="flex gap-6">
                <div class="w-1/2">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Foto de perfil</label>
                    <label class="cursor-pointer inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cloud-upload-icon lucide-cloud-upload">
                            <path d="M12 13v8"/><path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"/><path d="m8 17 4-4 4 4"/>
                        </svg>
                        <span class="ml-2">Selecionar imagem</span>
                        <input type="file" name="photo" class="hidden" accept="image/*" onchange="showFileName(event, 'photo-file-name')">
                    </label>
                    <p id="photo-file-name" class="text-sm text-gray-600 mt-2"></p>
                    
                    <div class="w-[200]"> 
                        <img src="{{ old('cover', asset('storage/' . $musico->photo)) }}"
                        alt="{{ $musico->name }}" title="{{ $musico->name }}">
                    </div>

                    @error('photo')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Foto de capa</label>
                    <label class="cursor-pointer inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cloud-upload-icon lucide-cloud-upload">
                            <path d="M12 13v8"/><path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"/><path d="m8 17 4-4 4 4"/>
                        </svg>
                        <span class="ml-2">Selecionar imagem</span>
                        <input type="file" name="cover" class="hidden" accept="image/*" onchange="showFileName(event, 'cover-file-name')">
                    </label>
                    <p id="cover-file-name" class="text-sm text-gray-600 mt-2"></p>
                     <div class="w-[200]"> 
                        <img src="{{ old('cover', asset('storage/' . $musico->cover)) }}"
                        alt="{{ $musico->name }}" title="{{ $musico->name }}">
                    </div>
                    @error('cover')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-12 mt-2">
                <label for="bio" class="block text-sm font-medium text-gray-700">BIO</label>
                <textarea id="description" name="description"
                    class="w-full rounded-md border border-gray-300 p-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                    rows="4">
                    {{ old('description', $musico->description) }}
                </textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-12 mt-2">
                <label for="bio" class="block text-sm font-medium text-gray-700">STATUS</label>
                <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                    focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                    <option value="">SELECIONE</option>
                    @foreach ($status as $option)
                        <option value="{{ $option->value }}"
                            @if (old('status', $musico->status->value ?? '') === $option->value) selected @endif>
                            {{ $option->name }}
                        </option>
                    @endforeach
                </select>
                 @error('status')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end space-x-2 mt-4">
                <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    ATUALIZAR
                </button>
            </div>
        </form>
    </div>
</x-app-layout>