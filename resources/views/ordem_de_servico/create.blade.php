<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Ordem de Serviço') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <form action="{{ route('ordem.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="OS_IDENTIFICACAO" class="form-label text-white">Identificação da OS</label>
                <input type="text" name="OS_IDENTIFICACAO" class="form-control" id="OS_IDENTIFICACAO" required>
            </div>
            <div class="mb-3">
                <label for="OS_TIPO" class="form-label text-white">Tipo</label>
                <input type="text" name="OS_TIPO" class="form-control" id="OS_TIPO" required>
            </div>
            <div class="mb-3">
                <label for="cliente_id" class="form-label text-white">Cliente Responsável</label>
                <select name="cliente_id" id="cliente_id" class="form-select" required>
                    <option value="" selected disabled>Selecione um cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="OS_DATA_PREVISAO" class="form-label text-white">Data de Previsão</label>
                <input type="date" name="OS_DATA_PREVISAO" class="form-control" id="OS_DATA_PREVISAO" required>
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
</x-app-layout>
