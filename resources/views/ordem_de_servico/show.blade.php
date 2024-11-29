<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes da Ordem de Serviço') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                Ordem #{{ $ordem->id }}
            </div>
            <div class="card-body">
                <p><strong>Identificação:</strong> {{ $ordem->OS_IDENTIFICACAO }}</p>
                <p><strong>Tipo:</strong> {{ $ordem->OS_TIPO }}</p>
                <p><strong>Cliente:</strong> {{ $ordem->OS_CLITENTE_RESPONSAVEL }}</p>
                <p><strong>Funcionário:</strong> {{ $ordem->OS_FUNCIONARIO_RESPONSAVEL }}</p>
                <p><strong>Data de Entrada:</strong> {{ \Carbon\Carbon::parse($ordem->OS_DATA_ENTRADA)->format('d/m/Y') }}</p>
                <p><strong>Data de Previsão:</strong> {{ \Carbon\Carbon::parse($ordem->OS_DATA_PREVISAO)->format('d/m/Y') }}</p>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('ordem.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
</x-app-layout>