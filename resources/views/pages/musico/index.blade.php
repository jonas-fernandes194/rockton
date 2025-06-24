<x-app-layout>
    <x-slot name="header">
        {{ $title ?? 'Membros' }}
    </x-slot>

    <div class="p-4 bg-white rounded shadow">

        <div class="text-right">
            <button class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded shadow inline-block">
                 Excluir
            </button>
            <a href="{{ route('musico.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow inline-block">
                + Adicionar
            </a>
        </div>
        
        @if(session('success'))
            <div
                x-data="{ show: true }"
                x-init="setTimeout(() => show = false, 4000)"
                x-show="show"
                x-transition
                class="fixed top-5 right-5 z-50 bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg shadow-lg flex items-center space-x-2"
                role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4-4m-7 6h8a2 2 0 002-2V6a2 2 0 00-2-2H7a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
                <span>{{ session('success') }}</span>
                <button @click="show = false" class="ml-2 text-green-700 hover:text-green-900">&times;</button>
            </div>
        @endif

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200 mt-5">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <input id="checkbox-master" type="checkbox">
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">NOME (PÚBLICO)</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">STATUS</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">FOTO</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">DATA</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">AÇÕES</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @if (!$musicos->isEmpty())
                        @foreach ($musicos as $musico)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <input type="checkbox" class="checkbox-musico-id" value="{{ $musico->id }}">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $musico->public_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">-</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <img src="{{ asset('storage/' . $musico->cover) }}" alt="{{ $musico->public_name }}" class="object-cover rounded-full w-10 h-10">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $musico->created_at->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <a href="{{ route('musico.edit', $musico->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow inline-block">EDITAR</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center text-sm text-gray-500 py-4">
                                Nenhum músico encontrado.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $musicos->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>

<script>
    $('#checkbox-master').on('change', function () {
        $('.checkbox-musico-id').prop('checked', $(this).prop('checked'));
    });

    $('.checkbox-musico-id').on('change', function () {
        const idsSelecionados = $('.checkbox-musico-id:checked').map(function() {
            return $(this).val();
    }).get();
});
</script>