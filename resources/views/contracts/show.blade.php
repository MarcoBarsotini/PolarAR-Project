<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes do Contrato') }}
        </h2>
    </x-slot>

    <div class="container bg-darkblue mx-auto mt-5">
        <div class="p-5 rounded-lg shadow-md">
            <h3 class="text-white mb-3 font_110"><strong>ID do Contrato:</strong> {{ $contract->id }}</h3>
            <p class="text-white m-2 font_110"><strong>Quem Contratou:</strong> <a href="{{ route('clientes.show', $contract->contractor->id) }}" class="text-lightblue">{{ $contract->contractor->name }}</a></p>
            <p class="text-white m-2 font_110"><strong>Contratado:</strong> {{ $contract->contracted->name }}</p>
            <p class="text-white m-2 font_110"><strong>Data do Contrato:</strong> {{ $contract->created_at->format('d/m/Y H:i') }}</p>
            <p class="text-white m-2 font_110 uppercase"><strong>Status:</strong> {{ $contract->status ?? 'Ativo' }}</p>
            <p class="text-white m-2 font_110"><strong>Descrição do Contrato:</strong> {{ $contract->descricao_servico }}</p>
            <div class="mt-5">
                <a href="{{ url()->previous() }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded">Voltar</a>
            </div>
        </div>
    </div>
</x-app-layout>
