<x-app-layout>
    <x-slot name="header">
        {{ $title ?? 'Membros' }}
    </x-slot>
    <div class="p-4 bg-white rounded shadow">
        {{-- <form action="{{ route('musico.update', $musico->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
        </form> --}}
    </div>
</x-app-layout>