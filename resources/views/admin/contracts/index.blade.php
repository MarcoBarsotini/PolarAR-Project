<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contratos') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5" style="padding: 30px !important;">
        @if(session('success'))
            <div class="text-white font_120 text-center p-4 rounded" style="color: #05ff12 !important; border: 1px solid #05ff12; padding: 10px !Important;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="text-white font_120 text-center p-4 rounded" style="color: #ff0000 !important; border: 1px solid #ff0000; padding: 10px !Important;">
                {{ session('error') }}
            </div>
        @endif

        <table class="min-w-full dark:bg-gray-800 shadow-md rounded-lg container">
            <thead>
                <tr>
                    <th class="text-white px-6 py-3 bg-gray-100 dark:bg-gray-700 text-left font_90 font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider" scope="col" colspan="1">ID</th>
                    <th class="text-white px-6 py-3 bg-gray-100 dark:bg-gray-700 text-left font_90 font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider" scope="col" colspan="1">Contratante</th>
                    <th class="text-white px-6 py-3 bg-gray-100 dark:bg-gray-700 text-left font_90 font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider" scope="col" colspan="1">Contratado</th>
                    <th class="text-white px-6 py-3 bg-gray-100 dark:bg-gray-700 text-left font_90 font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider" scope="col" colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contracts as $contract)
                    <tr>
                        <th class="text-white px-6 py-4 whitespace-nowrap negrito" scope="row" colspan="1">{{ $contract->id }}</th>
                        <td class="text-white px-6 py-4 whitespace-nowrap" colspan="1">{{ $contract->contractor->name }} | {{ $contract->contractor->id }}</td>
                        <td class="text-white px-6 py-4 whitespace-nowrap" colspan="1">{{ $contract->contracted->name }} | {{ $contract->contracted->id }}</td>
                        <td class="text-white px-6 py-4 whitespace-nowrap" colspan="2">
                            <form action="{{ route('admin.contracts.destroy', $contract->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este contrato? Essa ação é irreversível');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-white rounded" style="color: red !impotant;">Excluir</button>
                            </form>
                            <form action="{{ route('contracts.show', $contract) }}" style="display: inline;">
                                <button type="submit" class="btn btn-success text-white rounded">Detalhes</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
