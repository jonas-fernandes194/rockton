<x-app-layout>
    <x-slot name="header">
       Bem vindo a <strong>ARENA</strong>
    </x-slot>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-8 max-w-6xl mx-auto">
        <div class="bg-white rounded-xl shadow-md p-5 flex flex-col items-center justify-center hover:shadow-xl hover:scale-105 transition-all duration-300">
            <div class="text-purple-500 text-3xl mb-2">
                <i class="fa-solid fa-compact-disc"></i>
            </div>
            <div class="text-gray-700 font-semibold text-md">Álbuns</div>
            <p class="text-2xl font-bold text-gray-900 mt-1">{{ $album ?? 0 }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-md p-5 flex flex-col items-center justify-center hover:shadow-xl hover:scale-105 transition-all duration-300">
            <div class="text-blue-500 text-3xl mb-2">
                <i class="fa-solid fa-guitar"></i>
            </div>
            <div class="text-gray-700 font-semibold text-md">Bandas</div>
            <p class="text-2xl font-bold text-gray-900 mt-1">{{ $band ?? 0 }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-md p-5 flex flex-col items-center justify-center hover:shadow-xl hover:scale-105 transition-all duration-300">
            <div class="text-green-500 text-3xl mb-2">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="text-gray-700 font-semibold text-md">Músicos</div>
            <p class="text-2xl font-bold text-gray-900 mt-1">{{ $members ?? 0 }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-md p-5 flex flex-col items-center justify-center hover:shadow-xl hover:scale-105 transition-all duration-300">
            <div class="text-pink-500 text-3xl mb-2">
                <i class="fa-solid fa-music"></i>
            </div>
            <div class="text-gray-700 font-semibold text-md">Músicas</div>
            <p class="text-2xl font-bold text-gray-900 mt-1">{{ $musics ?? 0 }}</p>
        </div>
    </div>
</x-app-layout>
