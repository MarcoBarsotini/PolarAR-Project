<style>
    .container{
        padding: 30px !important;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gerenciamento de Usuários') }}
        </h2>
    </x-slot>

    <p class="text-red text-center font_130 mt-3">Extremo cuidado ao mexer aqui, qualquer ação acidental pode causar danos.</p>

    <div class="container mx-auto mt-5" colspan="5">
        <form action="{{ route('admin.users.index') }}" method="GET" class="mb-4">
            <div class="flex space-x-4">
                <input type="text" name="search_name" value="{{ request('search_name') }}" placeholder="Buscar por nome" class="px-4 py-2 border rounded-md w-1/3 bg-gray-800 text-white placeholder-gray-400">
                <input type="text" name="search_id" value="{{ request('search_id') }}" placeholder="Buscar por ID" class="px-4 py-2 border rounded-md w-1/3 bg-gray-800 text-white placeholder-gray-400">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Pesquisar</button>
            </div>
        </form>

        <table class="min-w-full dark:bg-gray-800 shadow-md rounded-lg container" colspan="6">
            <thead>
                <tr>
                    <th class="text-white px-6 py-3 bg-gray-100 dark:bg-gray-700 text-left text-xs font-medium dark:text-gray-300 uppercase tracking-wider" colspan="1">ID</th>
                    <th class="text-white px-6 py-3 bg-gray-100 dark:bg-gray-700 text-left text-xs font-medium dark:text-gray-300 uppercase tracking-wider" colspan="1">Nome</th>
                    <th class="text-white px-6 py-3 bg-gray-100 dark:bg-gray-700 text-left text-xs font-medium dark:text-gray-300 uppercase tracking-wider" colspan="1">Email</th>
                    <th class="text-white px-6 py-3 bg-gray-100 dark:bg-gray-700 text-left text-xs font-medium dark:text-gray-300 uppercase tracking-wider" colspan="1">Tipo</th>
                    <th class="text-white px-6 py-3 bg-gray-100 dark:bg-gray-700 text-left text-xs font-medium dark:text-gray-300 uppercase tracking-wider" colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="text-white px-6 py-4 whitespace-nowrap" colspan="1">{{ $user->id }}</td>
                        <td class="text-white px-6 py-4 whitespace-nowrap" colspan="1">{{ $user->name }}</td>
                        <td class="text-white px-6 py-4 whitespace-nowrap" colspan="1">{{ $user->email }}</td>
                        <td class="text-white px-6 py-4 whitespace-nowrap" colspan="1">{{ $user->user_type }}</td>
                        <td class="text-white px-6 py-4 whitespace-nowrap flex space-x-2" colspan="2">
                            <form action="{{ route('admin.users.edit', $user->id) }}" style="padding-right: 15px !important;">
                                <button type="submit" class="btn btn-success px-4 py-2 text-white rounded">Editar</button>
                            </form>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger px-4 py-2 text-white rounded">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>