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
    <div class="contratos_container px-4">
        <h1 class="font_130 text-white mb-4">Contratos Aceitos</h1>

        <div class="mb-4">
            <form action="{{ route('contracts.accepted') }}" method="GET">
                <input type="text" name="search" placeholder="Pesquisar Nome..." value="{{ request('search') }}" class="bg-darkblue text-white border rounded px-2 py-2">
                
                <select name="status" class="bg-darkblue border text-white rounded py-2">
                    <option value="">Todos os Status</option>
                    <option value="aceito" {{ request('status') == 'aceito' ? 'selected' : '' }}>Aceito</option>
                    <option value="rejeitado" {{ request('status') == 'rejeitado' ? 'selected' : '' }}>Rejeitado</option>
                    <option value="finalizado" {{ request('status') == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                </select>

                <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2 ml-2">Filtrar</button>
            </form>
        </div>

        @if($acceptedContracts->isEmpty())
            <p class="text-white font_110">Nenhum contrato encontrado.</p>
        @else
            <table class="min-w-full bg-darkgrey border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-white">ID</th>
                        <th class="py-2 px-4 border-b text-white">Contratante</th>
                        <th class="py-2 px-4 border-b text-white">Descrição do Serviço</th>
                        <th class="py-2 px-4 border-b text-white">Status</th>
                        <th class="py-2 px-4 border-b text-white">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($acceptedContracts as $contract)
                        <tr>
                            <td class="py-2 px-4 border-b text-white">{{ $contract->id }}</td>
                            <td class="py-2 px-4 border-b text-white">
                                <a href="{{ route('clientes.show', $contract->contractor->id) }}" class="font_110">{{ $contract->contractor->name }}</a>
                            </td>
                            <td class="py-2 px-4 border-b text-white">{{ $contract->descricao_servico }}</td>
                            <td class="py-2 px-4 border-b uppercase {{ $contract->status === 'rejeitado' ? 'text-red' : ($contract->status === 'aceito' ? 'text-green' : ($contract->status === 'finalizado' ? 'text-blue' : 'text-white')) }}">
                                {{ $contract->status }}
                            </td>
                            <td class="py-2 px-4 border-b text-white">
                                <form action="{{ route('contracts.show', $contract) }}" style="display: inline;">
                                    <button type="submit" class="btn btn-success text-white rounded">Detalhes</button>
                                </form>

                                @if (!in_array($contract->status, ['finalizado', 'rejeitado']))
                                    <form action="{{ route('contracts.finalizar', $contract->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja finalizar este contrato?')">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger text-white rounded">Finalizar Contrato</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $acceptedContracts->links() }}
        @endif
    </div>
    @include('layouts.footer')
</x-app-layout>