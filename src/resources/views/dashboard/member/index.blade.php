@extends('layouts.dashboard')
@section('title', 'Músicos')

@section('content')
    <div class="bg-white shadow-md p-5 overflow-hidden">
        <div class="flex justify-end gap-3 mb-4">
            <button type="button" disabled class="px-5 py-2.5 bg-red-600 text-white font-semibold rounded-xl shadow-md 
                    hover:bg-red-700 hover:shadow-lg transition duration-200
                    disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-red-600 disabled:hover:shadow-md">Excluir
            </button>
            <a href="{{ route('dashboard.member.create') }}" class="px-5 py-2.5 bg-green-600 text-white font-semibold rounded-xl shadow-md hover:bg-green-700 hover:shadow-lg transition duration-200">+ Adicionar</a>
        </div>
        <div class="py-4 border-b border-gray-200">
            <h1 class="text-lg font-semibold text-gray-700">Lista de Músicos</h1>
        </div>
        <div class="flex items-end gap-4 mt-4 mb-4 w-full">
            <div class="flex flex-col">
                <label for="nome" class="text-sm font-medium text-gray-700 mb-1">Nome</label>
                <input id="nome" type="text" placeholder="Buscar músico..." class="w-64 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div class="flex flex-col">
                <label for="status" class="text-sm font-medium text-gray-700 mb-1">Status</label>
                <select id="status" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                    <option>Todos</option>
                    <option>Ativo</option>
                    <option>Inativo</option>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="ordenacao" class="text-sm font-medium text-gray-700 mb-1">Ordenação</label>
                <select id="ordenacao" class="px-3 py-2 border border-gray-300 rounded-lg text-sm">
                    <option>Antigos</option>
                    <option>Recentes</option>
                </select>
            </div>
            <button class="px-5 py-2.5 ml-auto bg-gray-600 text-white font-semibold shadow-md hover:bg-gray-700 hover:shadow-lg transition duration-200">Buscar</button>
        </div>
        <table class="mt-4 min-w-full text-sm text-left text-gray-600">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-6 py-3 flex items-center"><input type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"></th>
                    <th class="px-6 py-3">Nome</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Criado em</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200"> 
                @if(!$members->isEmpty())
                    @foreach($members as $member)
                        <tr class="hover:bg-gray-50 transition cursor-pointer">
                            <td class="px-6 py-4 align-middle">
                                <div class="flex items-center">
                                    <input type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                </div>
                            </td>
                            <td class="px-6 py-4 align-middle">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset($member->photo) }}" alt="Foto do músico" class="w-10 h-10 rounded-full object-cover">
                                    <div>
                                        <p class="font-medium text-gray-800">{{ $member->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 align-middle">
                                <span class="px-3 py-1 text-xs font-medium rounded-full 
                                    {{ $member->status == 1 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $member->status == 1 ? 'Ativo' : 'Inativo' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 align-middle">{{ ($member->created_at)->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Nenhum músico encontrado.</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="mt-4">
            <span class="bg-white">{{ $members->links() }}</span>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(function() {
        $('#loading').show();
    });
</script>
@endpush
