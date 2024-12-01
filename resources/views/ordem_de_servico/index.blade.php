<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ordens de Serviço') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <div class="text-center mb-4">
            <a href="{{route('ordem.create')}}" class="btn btn-success">Nova Ordem</a>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Identificação</th>
                            <th>Tipo</th>
                            <th>Cliente</th>
                            <th>Funcionário</th>
                            <th>Data de Entrada</th>
                            <th>Previsão</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ordens as $ordem)
                            <tr>
                                <td>{{ $ordem->id }}</td>
                                <td>{{ $ordem->OS_IDENTIFICACAO }}</td>
                                <td>{{ $ordem->OS_TIPO }}</td>
                                <td>{{ $ordem->OS_CLITENTE_RESPONSAVEL }}</td>
                                <td>{{ $ordem->OS_FUNCIONARIO_RESPONSAVEL }}</td>
                                <td>{{ \Carbon\Carbon::parse($ordem->OS_DATA_ENTRADA)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($ordem->OS_DATA_PREVISAO)->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('ordem.show', $ordem->id) }}" class="btn btn-info btn-sm">Ver</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Nenhuma ordem de serviço encontrada.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
