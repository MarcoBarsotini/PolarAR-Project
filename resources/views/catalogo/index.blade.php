<style>
    .profile-pic {
        width: 150px !important;
        height: 150px !important;
        border-radius: 50%;
        object-fit: cover;
        margin-top: 20px !important;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Catálogo de Funcionários') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5">
        <!-- Formulário de Busca e Filtro -->
        <div class="bg-gray-800 p-4 rounded-lg shadow-lg mb-6">
            <form method="GET" action="{{ route('catalogo.index') }}">
                <table class="table-auto w-full text-white">
                    <tr>
                        <!-- Campo de busca por texto -->
                        <td class="p-2">
                            <input type="text" name="search" placeholder="Buscar por nome ou e-mail" value="{{ request('search') }}"
                                   class="w-full border border-gray-300 rounded px-4 py-2 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200 ease-in-out"
                                   aria-label="Campo de busca">
                        </td>
                        
                        <!-- Filtro por categoria -->
                        <td class="p-2">
                            <select name="filter" onchange="this.form.submit()"
                                    class="w-full border border-gray-300 rounded px-4 py-2 text-gray-700 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200 ease-in-out"
                                    aria-label="Filtro de categoria">
                                <option value="">Todos</option>
                                <option value="vendedor" {{ request('filter') == 'vendedor' ? 'selected' : '' }}>Vendedor</option>
                                <option value="manutencao" {{ request('filter') == 'manutencao' ? 'selected' : '' }}>Manutenção</option>
                            </select>
                        </td>

                        <!-- Botão de busca -->
                        <td class="p-2">
                            <button type="submit"
                                    class="bg-blue-500 text-white font-semibold px-4 py-2 rounded hover:bg-blue-600 transition duration-200 ease-in-out shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-full">
                                Buscar
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <!-- Lista de funcionários exibida em cards logo abaixo -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @if($funcionarios->count())
                @foreach($funcionarios as $funcionario)
                    <div class="bg-gray-800 shadow-md rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                        <img src="{{ $funcionario->profile_photo ? Storage::url($funcionario->profile_photo) : asset('images/default_profile.png') }}" alt="{{ $funcionario->name }}" class="w-48 h-48 object-cover mx-auto profile-pic">
                        <div class="flex justify-center mt-2">
                            <span class="badge text-bg-danger">{{ $funcionario->user_class }}</span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-lg text-white text-center">{{ $funcionario->name }}</h3>
                            <p class="text-white text-center">{{ $funcionario->email }}</p>
                            <a class="font_100 text-center flex justify-center" style="color: #2a23fa;" href="{{ route('clientes.show', $funcionario->id) }}">Informações</a>
                            <div class="mt-4 flex justify-center">
                                <button onclick="openContractForm({{ $funcionario->id }})" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">
                                    Contratar
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h1 class="text-center text-white font_110">Nenhum funcionário encontrado.</h1>
            @endif
        </div>

        <!-- Paginação -->
        <div class="mt-6">
            {{ $funcionarios->links() }}
        </div>

        <!-- Modal de Contratação -->
        <div id="contractModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-dark p-6 rounded-lg w-1/2">
                <h2 class="text-xl text-white font-semibold mb-4">Confirmar Contratação!</h2>
                <form action="{{ route('contracts.store') }}" method="POST" 
                    onsubmit="return confirm('Tem certeza que deseja solicitar esse serviço? Não será possível cancelar após o envio.');">
                    @csrf
                    
                    <input type="hidden" name="funcionario_id" id="funcionario_id" value="">
                    
                    <div class="mb-4">
                        <label for="descricao_servico" class="mb-2 block text-sm font-medium text-white">Detalhe o que deve ser feito.</label>
                        <textarea name="descricao_servico" id="descricao_servico" rows="4" class="w-full p-2 border rounded"></textarea>
                    </div>

                    <div class="flex justify-end space-x-4">
                        <button type="button" onclick="closeContractForm()" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script>
        function openContractForm(funcionarioId) {
            document.getElementById('funcionario_id').value = funcionarioId;
            document.getElementById('contractModal').classList.remove('hidden');
        }

        function closeContractForm() {
            document.getElementById('contractModal').classList.add('hidden');
        }
    </script>
</x-app-layout>