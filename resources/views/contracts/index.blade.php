<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contratos') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5">
        @if ($contracts->isEmpty())
            <div class="bg-red-500 text-white p-4 rounded">
                <p>Nenhum contrato encontrado.</p>
            </div>
        @else
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID do Contrato</th>
                        <th class="py-2 px-4 border-b">Contratante</th>
                        <th class="py-2 px-4 border-b">Contratado</th>
                        <th class="py-2 px-4 border-b">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contracts as $contract)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $contract->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $contract->contractor->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $contract->contracted->name }}</td>
                            <td class="py-2 px-4 border-b">
                                <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este contrato?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
