<style>
    .contratos_container {
        width: 80%;
        margin-left: auto;
        margin-right: auto;
        padding: 20px !important;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contratos Solicitados') }}
        </h2>
    </x-slot>
    <div class="contratos_container mx-auto px-4">
        <div class="mb-4 mt-5">
            <form action="{{ route('contracts.requested') }}" method="GET">
                <input type="text" name="search" placeholder="Pesquisar..." value="{{ request('search') }}" class="border rounded px-2 py-1">
                <button type="submit" class="bg-blue-500 text-white rounded px-4 py-1">Pesquisar</button>
            </form>
        </div>

        @if($requestedContracts->isEmpty())
            <p class="text-white font_110">Nenhum contrato encontrado.</p>
        @else
            <table class="min-w-full bg-darkgrey border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-white">ID</th>
                        <th class="py-2 px-4 border-b text-white">Descrição do Serviço</th>
                        <th class="py-2 px-4 border-b text-white">Status</th>
                        <th class="py-2 px-4 border-b text-white">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requestedContracts as $contract)
                        <tr>
                            <td class="py-2 px-4 border-b text-white">{{ $contract->id }}</td>
                            <td class="py-2 px-4 border-b text-white">{{ $contract->descricao_servico }}</td>
                            <td class="py-2 px-4 border-b uppercase 
                                {{ $contract->status === 'rejeitado' ? 'text-red' : 
                                ($contract->status === 'aceito' ? 'text-green' : 
                                ($contract->status === 'finalizado' ? 'text-lightblue' : 'text-white')) }}">
                                {{ $contract->status }}
                            </td>
                            <td class="py-2 px-4 border-b text-white">
                                <a href="{{ route('contracts.show', $contract) }}" class="text-blue-500">
                                    <form action="{{ route('contracts.show', $contract) }}" style="margin-top: 5px !important;">
                                        <button type="submit" class="btn btn-success text-white rounded">Detalhes</button>
                                    </form>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $requestedContracts->links() }} <!-- Adiciona a paginação -->
        @endif
    </div>
</x-app-layout>